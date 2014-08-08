<?php

namespace Trotch;

class Map
{
    /**
     * @var array [city name, [latitude, longitude]]
     */
    protected $supportedCities = array(
        'montreal' => [45.5000, -73.5667],
    );

    /**
     * @var \selective\ORM\Database
     */
    protected $dbService;

    /**
     * @param \selective\ORM\Database $dbService
     */
    function __construct($dbService)
    {
        $this->dbService = $dbService;
    }

    /**
     * @return array
     */
    function getSupportedCities()
    {
        return array_keys($this->supportedCities);
    }

    /**
     * @param string $city
     * @return array [latitude, longitude]
     * @throws \DomainException
     */
    function getCityPosition($city)
    {
        $city = strtolower(Lang::anglo($city));
        if (false === array_key_exists($city, $this->supportedCities)) {
            throw new \DomainException("Unknown city: $city");
        }
        return $this->supportedCities[$city];
    }

    /**
     * @param string $ip
     * @return array [latitude, longitude]
     * @throws \UnexpectedValueException
     */
    function getIpPosition($ip)
    {
        $geo = geoip_record_by_name($ip);
        if (false === $geo) {
            throw new \UnexpectedValueException("Cannot find position for IP: $ip");
        }
        return array((float) $geo['latitude'], (float) $geo['longitude']);
    }

    /**
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @param string $unit (optional) 'km', 'miles'
     * @return float
     */
    function distance($lat1, $lon1, $lat2, $lon2, $unit = 'km')
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        if ('km' == strtolower($unit)) {
            return ($miles * 1.609344);
        } else {
            return $miles;
        }
    }

    /**
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @return array [latitude, longitude]
     */
    function midpoint($lat1, $lon1, $lat2, $lon2)
    {
        // TODO: This function sucks, improve it
        // @see: http://www.movable-type.co.uk/scripts/latlong.html

        $lat3 = ($lat1 + $lat2) / 2;
        $lon3 = ($lon1 + $lon2) / 2;

        return array($lat3, $lon3);
    }


    /**
     * Haversine formula
     *
     * @param $lat
     * @param $lon
     * @param int $limit
     * @param int $distance
     * @param string $unit
     * @return array (of objects)
     */
    function getClosestBars($lat, $lon, $limit = 500, $distance = 0, $unit = 'km')
    {
        if ('km' == strtolower($unit)) {
            $x = 6371;
        } else {
            $x = 3959; // Miles
        }

        //
        $sql = "SELECT *, ";
        $sql .= "({$x} * acos (
            cos ( radians({$lat}) )
            * cos( radians( latitude ) )
            * cos( radians( longitude ) - radians({$lon}) )
            + sin ( radians({$lat}) )
            * sin( radians( latitude ) )
        )) AS distance ";
        $sql .= "FROM bars ";
        if ($distance) {
            $sql .= "HAVING distance < {$distance} ";
        }
        $sql .= "ORDER BY distance ";
        $sql .= "LIMIT {$limit} ";

        $records = $this->dbService->bars->sql($sql);

        $results = [];
        foreach ($records as $r) {
            $results[$r->id] = (object) [
                'name' => $r->name,
                'latitude'  => $r->latitude,
                'longitude' => $r->longitude,
                'distance' => $r->distance,
            ];
        }

        return $results;
    }


}