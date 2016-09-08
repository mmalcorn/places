<?php
    require_once(__DIR__ . "/../vendor/autoload.php");
    require_once(__DIR__ . "/../src/Place.php");

    session_start();
    if (empty($_SESSION["list_of_places"])){
        $_SESSION["list_of_places"] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__ . '/../views'));

    $app->get("/", function() use ($app){
        return $app['twig']->render('home.html.twig');

    });
    $app->post('/create_place', function() use ($app){
        $city = new Place($_POST['city']);
        $city->save();
        return $app['twig']->render('new_city.html.twig',array('new_place' =>$city));
    });


    return $app;
 ?>
