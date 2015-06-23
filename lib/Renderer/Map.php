<?php

namespace Trotch\Renderer;

use Trotch\Container;
use Trotch\Renderer;

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
        list($lat, $lng) = Container::get('GeoLocation')->getPosition();

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
