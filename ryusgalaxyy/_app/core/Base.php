<?php
defined('_access') or exit;
class Base {

    protected $url = array();

    public function __construct()
    {
        $this->url = $this->parseUrl();
    }

    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        } else {
            return array('home');
        }
    }

    public function PrintFormat($var)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}