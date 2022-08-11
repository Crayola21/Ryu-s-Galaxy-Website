<?php
    if($_vista == 'catalogo' || $_vista == 'realizarpago'){
    include('pages/' . $_vista . ".php");  
    die();
}
include('header.php');
include('pages/' . $_vista . ".php");
include('footer.php');