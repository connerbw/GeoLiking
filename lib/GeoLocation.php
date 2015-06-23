<?php

namespace Trotch;

class GeoLocation
{

    /**
     * Default position (Montreal)
     *
     * @var array
     */
    public $defaultPosition = [45.5000, -73.5667];


    /**
     *
     */
    function __construct()
    {

    }


    /**
     * @return array [latitude, longitude]
     */
    function getPosition()
    {
        if (isset($_COOKIE['geoLikePos'])) {
            $geo = json_decode($_COOKIE['geoLikePos'], true);
            if (is_array($geo) && isset($geo['latitude']) && isset($geo['longitude'])) {
                return array((float)$geo['latitude'], (float)$geo['longitude']);
            }
        }

        try {
            return $this->getIpPosition($this->getIP());
        }
        catch (\UnexpectedValueException $e) {
            return $this->defaultPosition;
        }
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

        return array((float)$geo['latitude'], (float)$geo['longitude']);
    }


    /**
     * @return string
     */
    function getIP()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }

        return '127.0.0.1';
    }


    /**
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @param string $unit (optional) 'km', 'miles'
     * @return float
     */
    function distanceBetweenTwoPoints($lat1, $lon1, $lat2, $lon2, $unit = 'km')
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        if ('km' == strtolower($unit)) {
            return ($miles * 1.609344);
        }
        else {
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
    function midBetweenTwoPoints($lat1, $lon1, $lat2, $lon2)
    {
        // TODO: This function sucks, improve it
        // @see: http://www.movable-type.co.uk/scripts/latlong.html

        $lat3 = ($lat1 + $lat2) / 2;
        $lon3 = ($lon1 + $lon2) / 2;

        return array($lat3, $lon3);
    }

}