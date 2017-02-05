<?php

namespace GeoLiking\Renderer;

use GeoLiking\Container;
use GeoLiking\Renderer;

class Map extends Renderer
{

    /**
     * @var string
     */
    protected $template = 'map.php';


    /**
     *
     */
    protected function pre()
    {
        // TODO: Implement pre() method.
    }


    /**
     * @return array
     */
    protected function data()
    {
        if (
            isset($_GET['lat']) &&
            isset($_GET['lng']) &&
            Container::get('GeoLocation')->isValidLatitude($_GET['lat']) &&
            Container::get('GeoLocation')->isValidLongitude($_GET['lng'])
        ) {
            $lat = $_GET['lat'];
            $lng = $_GET['lng'];
        } else {
            list($lat, $lng) = Container::get('GeoLocation')->getPosition();
        }

        return [
            'lat' => $lat,
            'lng' => $lng,
        ];
    }


    /**
     *
     */
    protected function post()
    {
        // TODO: Implement post() method.
    }
}
