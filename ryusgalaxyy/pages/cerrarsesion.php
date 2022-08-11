<?php 

require_once('../sesion.php'); 
session_destroy(); 
header('location: ../home'); 