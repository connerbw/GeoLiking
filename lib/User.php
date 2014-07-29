<?php

namespace Trotch;

class User
{

    /**
     * @var Mapping
     */
    public $mappingService;

    /**
     * @param Mapping $mappingService
     */
    function __construct($mappingService)
    {
        $this->mappingService = $mappingService;
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
     * @return array [latitude, longitude]
     */
    function getPosition()
    {
        if (isset($_COOKIE['userPos'])) {
            $geo = json_decode($_COOKIE['userPos'], true);
            if (is_array($geo) && isset($geo['latitude']) && isset($geo['longitude'])) {
                return array((float) $geo['latitude'], (float) $geo['longitude']);
            }
        }

        $geo = geoip_record_by_name($this->getIP());
        if (false !== $geo) {
            return array((float) $geo['latitude'], (float) $geo['longitude']);
        }

        $defaultCity = 'Montreal';
        return $this->mappingService->getCityPosition($defaultCity);
    }


}