<?php

class Router {
    public static function handle($url) {
      
 


$routes = [
    '/' => ['dashboardController', 'dash_index'],

    // router siswa
    '/siswa/daftarSiswa' => ['siswaController', 'daftarSiswa'],
    '/siswa/createDataSiswa' => ['siswaController','methodCreateDataSiswa'],
    '/siswa/storeDataSiswa' => ['siswaController', 'methodStoreDataSiswa'],
    '/siswa/editDataSiswa' => ['siswaController', 'editDataSiswa'],
    '/siswa/updateDataSiswa' => ['siswaController', 'updateDataSiswa'],
    '/siswa/deleteDataSiswa' => ['siswaController', 'methodDeleteDataSiswa'],

    // router guru
    '/guru/daftarGuru' => ['guruController', 'daftarGuru'],
    '/guru/createDataGuru' => ['guruController','methodCreateDataGuru'],
    '/guru/storeDataGuru' => ['guruController', 'methodStoreDataGuru'],
    '/guru/editDataGuru' => ['guruController', 'methodEditDataGuru'],
    '/guru/updateDataGuru' => ['guruController', 'methodUpdateDataGuru'],
    '/guru/deleteDataGuru' => ['guruController', 'methodDeleteDataGuru'],

    // router staff
    '/staff/daftarStaff' => ['staffController', 'daftarStaff'],
    '/staff/createDataStaff' => ['staffController','methodCreateDataStaff'],
    '/staff/storeDataStaff' => ['staffController', 'methodStoreDataStaff'],
    '/staff/editDataStaff' => ['staffController', 'methodEditDataStaff'],
    '/staff/updateDataStaff' => ['staffController', 'methodUpdateDataStaff'],
    '/staff/deleteDataStaff' => ['staffController', 'methodDeleteDataStaff'],

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