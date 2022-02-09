<?php
//turn on output buffer
ob_start();
//this is our controller, it will take request from client,
// grab view page and send it back to client

//turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//start session
session_start();
var_dump($_SESSION); //as a test to see what is what up top

//require auto-load function
require_once('vendor/autoload.php');
//this file will define my functions
require('model/data-layer.php');

//create instance of Base class
//instantiate Fat Free framework
$f3 = Base::instance();

//define default route
//routes only exist when defined in this controller
$f3->route('GET /', function(){

    $view = new Template();

    echo $view->render('views/home.html');

});

//define breakfast route
$f3->route('GET /breakfast', function(){

    $view = new Template();

    echo $view->render('views/breakfast-menu.html');

});

//define breakfast route
$f3->route('GET /lunch', function(){

    $view = new Template();

    echo $view->render('views/lunch-menu.html');

});


//define summary route
$f3->route('GET /summary', function(){

    $view = new Template();

    echo $view->render('views/summary.html');

    //clear session data
    session_destroy();

});

//define order 1  route
//CAN GET TO THIS FORM USING EITHER GET AND POST
//when page is first visited, it is using the GET method then when form is submitted it is using the POST method
$f3->route('GET|POST /order1', function($f3){

    //get the condiments from the model and add to the F3 hive
    $f3->set('meal', getMeal());

    //if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //TODO validate this data cuh

        //add data to the session variable
        $_SESSION['food'] = $_POST['food'];
        $_SESSION['meal'] = $_POST['meal'];

        //redirect user to next page
        $f3->reroute('order2');

    }

    $view = new Template();

    echo $view->render('views/orderForm1.html');

});

//define order 2 route
//routes only exist when defined in this controller
$f3->route('GET|POST /order2', function($f3){

    //get the condiments from the model and add to the F3 hive
    $f3->set('conds', getCondiments());

    //if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //TODO validate this data cuh

        //add data to the session variable
        //if condiments were selected
        if(isset($_POST['conds'])){
            $_SESSION['conds'] = implode(", ", $_POST['conds']);
        }else{
            $_SESSION['conds'] = "None selected";
        }

        /*$_SESSION['conds'] = $_POST['conds'];*/

        //redirect user to next page
        $f3->reroute('order3');

    }

    $view = new Template();

    echo $view->render('views/orderForm2.html');

});

//define order 3  route
$f3->route('GET|POST /order3', function($f3){

    //if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //TODO validate this data cuh

        //add data to the session variable
        $_SESSION['drink'] = $_POST['drink'];

        //redirect user to next page
        $f3->reroute('summary');

    }

    $view = new Template();

    echo $view->render('views/orderForm1.html');

});

/*$view = new Template();
echo $view->render('views/home.html');*/

//run fat-free
$f3->run();

//send output to browser
ob_flush();
