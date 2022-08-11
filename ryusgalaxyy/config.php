<?php

//database
DEFINE('LDB_ENGINE', 'mysql'); #Oracle , SqlServer, Postgress, Mongo Etc..
DEFINE('LDB_HOST', 'localhost');
DEFINE('LDB_NAME', 'ryusgalaxydb');
DEFINE('LDB_USER', 'root');
DEFINE('LDB_PASS', '');
DEFINE('LDB_CHARSET', 'utf8mb4');


#Conexión si estamos en un servidor Remoto
DEFINE('DB_ENGINE', 'mysql'); #Oracle , SqlServer, Postgress, Mongo Etc..
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'ryusgalaxydb');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', '');
DEFINE('DB_CHARSET', 'utf8mb4');

DEFINE('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1'], '::1'));


define('_access', TRUE);
define('rutaRaiz', 'http://localhost/apps/ryusgalaxy/');
define('rutaAJAX', rutaRaiz.'ajax/');
define('Directorio', __DIR__.'/');
define('DirLib', __DIR__.'/lib/');
define('DirApp', __DIR__.'/_app/');
define('DirectorioAjax', __DIR__.'/_app/ajax/');
define('Clase', __DIR__.'/_app/class/');
define('DEBUG',false);
// error_reporting(0);
error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

//login Información
define('RLogin', true);
define('ID_USUARIO','');
define('ajaxcontrol', true);
define('LOGIN_CONTROL', true);
define('correo', 'ryusgalaxy@gmail.com');
define('remitente', 'ryusgalaxy@gmail.com');
define('passCorreo', '');
define('IP_SERVIDOR', 'smtp.gmail.com');

//Idioma, Hora y Moneda
setlocale(LC_TIME, 'es_ES');
date_default_timezone_set('America/Bogota');
setlocale(LC_MONETARY,"es_CO.UTF-8");
