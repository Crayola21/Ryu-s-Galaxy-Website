<?php
defined('_access') or exit;
class Input
{
    public function get($key, $type = 'string')
    {
        return trim(filter_input(INPUT_GET, $key, $this->get_filter($type), $this->get_options($type)));
    }

    public function post($key, $type = 'string')
    {
        return trim(filter_input(INPUT_POST, $key, $this->get_filter($type), $this->get_options($type)));
    }

    public function cookie($key, $type = 'string')
    {
        $valor = trim(filter_input(INPUT_COOKIE, $key, $this->get_filter($type), $this->get_options($type)));
        return $valor;
    }

    private function get_filter($type)
    {
        switch (strtolower($type)) {
            case 'string':
                $filter = FILTER_SANITIZE_STRING;
                break;
            case 'int':
                $filter = FILTER_SANITIZE_NUMBER_INT;
                break;
            case 'float':
                $filter = FILTER_SANITIZE_NUMBER_FLOAT;
                break;
            case 'encoded':
                $filter = FILTER_SANITIZE_ENCODED;
                break;
            case 'url':
                $filter = FILTER_SANITIZE_URL;
                break;
            case 'mail':
                $filter = FILTER_SANITIZE_EMAIL;
                break;
            default:
                $filter = FILTER_SANITIZE_STRING;
        }
        return $filter;
    }

    private function get_options($type)
    {
        switch (strtolower($type)) {
            case 'float':
                $args = array('flags' => FILTER_FLAG_ALLOW_FRACTION);
                break;
            default:
                $args = array();
        }
        return $args;
    }

}