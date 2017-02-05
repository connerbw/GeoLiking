<?php

namespace GeoLiking\Renderer;

use GeoLiking\Container;
use GeoLiking\Renderer;

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

        // Warning
        $warning = isset($_SESSION['geoLikingWarning']) ? $_SESSION['geoLikingWarning'] : null;
        unset($_SESSION['geoLikingWarning']);

        // Success
        $success = isset($_SESSION['geoLikingSuccess']) ? true : false;
        unset($_SESSION['geoLikingSuccess']);

        // Accurate
        $accurate = isset($_COOKIE['geoLikePos']) ? true : false;

        // Token
        $_SESSION['geoLikingToken'] = md5(uniqid(rand(), true));

        return [
            'lat' => $lat,
            'lng' => $lng,
            'warning' => $warning,
            'success' => $success,
            'accurate' => $accurate,
            'token' => $_SESSION['geoLikingToken'],
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
