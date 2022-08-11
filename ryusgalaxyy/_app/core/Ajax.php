<?php
defined('_access') or exit;

class Ajax extends Base
{
    private $publicAjax = array(
        'home'
    );

    public function Run()
    {
        $route = new AjaxRoute();
        if (in_array($this->url[0], $this->publicAjax)) {
            $route->LoadFile($this->url[0]);
        } else {
            //Validar Si requiere Login
            if (RLogin) {
                echo$route->LoadFile($this->url[0]);
            }

        }
    }
}