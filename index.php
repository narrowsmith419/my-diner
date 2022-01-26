<?php

//this is our controller, it will take request from client,
// grab view page and send it back to client

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require auto-load function
require_once('vendor/autoload.php');

//create instance of Base class
//instantiate Fat Free framework
$f3 = Base::instance();

//define default route
//routes only exist when defined in this controller
$f3->route('GET /', function(){
    //echo "<h1>Sup World</h1>";

    $view = new Template();

    echo $view->render('views/home.html');

});

//define breakfast route
//routes only exist when defined in this controller
$f3->route('GET /breakfast', function(){

    $view = new Template();

    echo $view->render('views/breakfast-menu.html');

});

//define breakfast route
//routes only exist when defined in this controller
$f3->route('GET /lunch', function(){

    $view = new Template();

    echo $view->render('views/lunch-menu.html');

});

//define order route
//routes only exist when defined in this controller
$f3->route('GET /order1', function(){

    $view = new Template();

    echo $view->render('views/orderForm1.html');

});

//define order route
//routes only exist when defined in this controller
$f3->route('GET /order2', function(){

    $view = new Template();

    echo $view->render('views/orderForm2.html');

});

/*$view = new Template();
echo $view->render('views/home.html');*/

//run fat-free
$f3->run();
