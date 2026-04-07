<?php

require_once "../app/core/router.php";

$url = $_GET['url'] ?? '/';

// $route = new Router();
// $route->handle($url);

Router::handle($url);