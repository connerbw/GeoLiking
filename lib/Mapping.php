<?php

namespace Trotch;

class Mapping
{
    /**
     * @var array [city name, [latitude, longitude]]
     */
    protected $supportedCities = array(
        'montreal' => [45.5000, 73.5667],
    );

    /**
     * @return array
     */
    function getSupportedCities()
    {
        return array_keys($this->supportedCities);
    }

    /**
     * @param string $city
     * @return array
     * @throws \Exception
     */
    function getCityPosition($city)
    {
        $city = strtolower($this->anglo($city));
        if (false === array_key_exists($city, $this->$supportedCities)) {
            throw new \DomainException("Unknown city: $city");
        }
        return $supportedCities[$city];
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
     * Convert a string with accents to equivalent english characters
     *
     * @param $str
     * @return string
     */
    private function anglo($str)
    {
        $unwanted_array = array(
            'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y'
        );
        return strtr($str, $unwanted_array);
    }


}