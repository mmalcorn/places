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
        return $app['twig']->render('home.html.twig', array('list_of_cities' => Place::getAll()));

    });
    $app->post('/create_place', function() use ($app){
        $city = new Place($_POST['city']);
        $city->save();
        return $app['twig']->render('new_city.html.twig',array('new_place' =>$city));
    });

    $app->post('/delete_places', function() use ($app){

        Place::deleteAll();
        return $app['twig']->render('delete_cities.html.twig');

    });
    return $app;
 ?>
