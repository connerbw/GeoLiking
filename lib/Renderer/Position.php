<?php

namespace Trotch\Renderer;

use Trotch\Container;
use Trotch\Renderer;

class Position extends Renderer
{

    /**
     * @var string
     */
    protected $template = 'position.php';


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
            throw new \LogicException('Invalid latitude and/or longitude');
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