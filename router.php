<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// $query = parse_url($_SERVER['REQUEST_URI'])['query'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(422);
    }
}

function abort($code = 404) {
    http_response_code($code);
    require "views/$code.php";
    die();
}

routeToController($uri, $routes);