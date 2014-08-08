<?php

namespace Trotch\Renderer;

use Trotch\Renderer;

class Home extends Renderer
{

    /**
     * @var string
     */
    protected $template = 'home.php';


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

        return [
            'lastKnownUserPos' => $c::get('User')->getPosition(),
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