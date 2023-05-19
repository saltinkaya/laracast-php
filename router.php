<?php

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];


$routes = require "routes.php";


function routeToController($uri, $routes)
{

    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(); // no need to pass an argument to the function since it has a default value.
    }
}


function abort($value = 404) // set the default value to 404
{
    http_response_code($value);

    require "views/{$value}.php";

    die();
}




routeToController($uri, $routes);