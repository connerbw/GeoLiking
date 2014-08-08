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
        list($userLat, $userLon) = Container::get('User')->getPosition();

        $locations = array();
        foreach (Container::get('Map')->getClosestBars($userLat, $userLon) as $bar) {
            $locations[] = [$bar->name, $bar->latitude, $bar->longitude];
        }

        return [
            'locations' => $locations,
            'userLat' => $userLat,
            'userLon' => $userLon,
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
