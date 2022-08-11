<?php
defined('_access') or exit;

class Aplicacion extends Base
{
    private $publicView = array('home');

    public function Run()
    {
        $route = new Enrutador();
		$route->setUrl($this->url);
        // if (RLogin) {
        //     if (!isset($_SESSION[ID_USUARIO])) {
        //         $route->cargarVista("home");
        //         exit;
        //     }

        // }
        //$this->url = $this->parseUrl();
        if (in_array($this->url[0], $this->publicView)) {
            $route->cargarVista($this->url[0]);
            // $this->PrintFormat("publicas");
        } else {
            $route->cargarVista2($this->url[0]);
        }
    }
}
