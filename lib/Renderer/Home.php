<?php

namespace Trotch\Renderer;

use Trotch\Container;
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
        return [
            'lastKnownUserPos' => Container::get('User')->getPosition(),
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