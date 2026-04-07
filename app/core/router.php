<?php

class Router {
    public static function handle($url) {
      
 


$routes = [
    '/' => ['siswaController', 'index'],
    '/siswa/createDataSiswa' => ['siswaController','methodCreateDataSiswa'],
    '/siswa/storeDataSiswa' => ['siswaController', 'methodStoreDataSiswa'],

    // ✅ TAMBAHAN
    '/siswa/editDataSiswa' => ['siswaController', 'editDataSiswa'],
    '/siswa/updateDataSiswa' => ['siswaController', 'updateDataSiswa'],

    '/siswa/deleteDataSiswa' => ['siswaController', 'methodDeleteDataSiswa'],
];

    if(!isset($routes[$url])) {
        die("404 Not Found");
    }

    [$controller, $method] = $routes[$url];

    require_once "../app/controllers/$controller.php";


    $controllerObj = new $controller();

    $controllerObj->$method();



    }

  
}
// $route = new Router();
// $route->handle($url);