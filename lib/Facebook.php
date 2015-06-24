<?php

namespace Trotch;

class Facebook
{

    /**
     * @var \Trotch\GeoLocation
     */
    protected $geo;


    /**
     * @param \Trotch\GeoLocation $geo
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
                'message' => "I liked {$lat}, {$lng}",
                'link' => $GLOBALS['CONFIG']['DOMAIN'] . $GLOBALS['CONFIG']['URL'] . "position?lat={$lat}&lng={$lng}",
                'description' => "I liked {$lat}, {$lng}",
                // 'og:type' => 'place',
                // 'place:location:latitude' => $lat,
                // 'place:location:longitude' => $lng,
            )
        );
    }


}
