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
        // Geo Location
        list($lat, $lng) = Container::get('GeoLocation')->getPosition();

        // Warnings
        $warning = isset($_SESSION['geoLikingWarning']) ? $_SESSION['geoLikingWarning'] : null;
        unset($_SESSION['geoLikingWarning']);

        // Accurate
        $accurate = isset($_COOKIE['lastKnownUserPos']) ? true : false;

        // Token
        $_SESSION['token'] = md5(uniqid(rand(), true));

        return [
            'lat' => $lat,
            'lng' => $lng,
            'warning' => $warning,
            'accurate' => $accurate,
            'token' => $_SESSION['token'],
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