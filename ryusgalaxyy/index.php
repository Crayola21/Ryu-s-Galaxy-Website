<?php 
    require('route.php');
    require('config.php');
    require('_app/core/_core.php');
    require_once('sesion.php');
    
    $js = new script();
     require 'vendor/autoload.php';
     
    //iniciar aplicacion
    $aplicacion = new Aplicacion();
    $aplicacion->Run();
    $js->mostrar();