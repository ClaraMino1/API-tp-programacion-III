<?php 

include_once "Route.php";
include_once "Router.php";

function startRouter(): Router 
{
    // Inicializamos el array de rutas
    $routes = [];

    include_once "Routes/EntryLogsRoutes.php";
    $routes = array_merge($routes, EntryLogsRoutes::getRoutes());

    include_once "Routes/EntryRoutes.php";
    $routes = array_merge($routes, EntryRoutes::getRoutes());
    
    include_once "Routes/AuthorRoutes.php";//Ruta author
    $routes = array_merge($routes, AuthorRoutes::getRoutes());

    // Como las rutas en este momento son primitivas, tenemos que encapsularlas en un DTO
    $routesClass = [];
    foreach ($routes as $route) {
        // Pasamos de las rutas de tipo array a tipo DTO
        $routesClass[] = Route::fromArray($route);
    }
    
    // Retornamos un nuevo ruteador
    return new Router($routesClass);
}
