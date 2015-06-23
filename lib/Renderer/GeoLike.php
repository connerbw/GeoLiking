<?php

namespace Trotch\Renderer;

use Trotch\Container;
use Trotch\Renderer;

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
        if (isset($_GET['token']) && isset($_SESSION['token']) && $_GET['token'] == $_SESSION['token']) {
            try {
                $fb = Container::get('Facebook');
                $fb->setUserStatus();
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
        unset($_SESSION['token']);
        $app = Container::get('App');
        $app->redirect($app->request()->getRootUri());
    }
}
