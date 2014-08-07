<?php

namespace Trotch\Renderer;

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
        $c = $this->container;

        $locations = array();
        foreach ($c::get('Db')->getTable('bars') as $bar) {
            $locations[] = [$bar->name, $bar->latitude, $bar->longitude];
        }

        $lastKnownUserPos = $c::get('User')->getPosition();

        return [
            'locations' => $locations,
            'lastKnownUserPos' => $lastKnownUserPos,
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
