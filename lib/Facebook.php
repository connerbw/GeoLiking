<?php

namespace GeoLiking;

class Facebook
{

    /**
     * @var \GeoLiking\GeoLocation
     */
    protected $geo;


    /**
     * @param \GeoLiking\GeoLocation $geo
     */
    function __construct($geo)
    {
        $this->geo = $geo;
    }


    /**
     * Authenticate Facebook User
     *
     * @return \Hybrid_Providers_Facebook
     */
    function authenticate()
    {
        global $CONFIG;
        $hybridauth = new \Hybrid_Auth($CONFIG['HYBRIDAUTH']);
        $adapter = $hybridauth->authenticate('Facebook');

        return $adapter;
    }


    /**
     * Writes "I liked LAT, LNG" to user's Facebook time line
     */
    function postGeoLikeToWall()
    {
        list($lat, $lng) = $this->geo->getPosition();
        $adapter = $this->authenticate();
        $adapter->setUserStatus(
            array(
                'link' => $GLOBALS['CONFIG']['DOMAIN'] . $GLOBALS['CONFIG']['URL'] . "position?lat={$lat}&lng={$lng}",
                'description' => "I liked {$lat}, {$lng}",
            )
        );
    }


}
