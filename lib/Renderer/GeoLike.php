<?php

namespace GeoLiking\Renderer;

use GeoLiking\Container;
use GeoLiking\Renderer;

class GeoLike extends Renderer
{

    /**
     * @var string
     */
    protected $template = 'like.php';


    /**
     *
     */
    protected function pre()
    {
        if (isset($_GET['token']) && isset($_SESSION['geoLikingToken']) && $_GET['token'] == $_SESSION['geoLikingToken']) {
            try {
                $fb = Container::get('Facebook');
                $fb->postGeoLikeToWall();
                $_SESSION['geoLikingSuccess'] = true;
            }
            catch (\Exception $e) {
                $_SESSION['geoLikingWarning'] = $e->getMessage();
            }
        }
        else {
            $_SESSION['geoLikingWarning']  = 'Invalid token';
        }
    }


    /**
     * @return array
     */
    protected function data()
    {
        return array();
    }


    /**
     *
     */
    protected function post()
    {
        global $CONFIG;
        unset($_SESSION['token']);
        Container::get('App')->redirect($CONFIG['URL']);
    }
}
