<?php 
if (session_id() === "") {
    session_start();
}
define("BASE_URL", "/DSP3-BD023/minicrm/public/index.php");
define("STYLE_URL", "/DSP3-BD023/minicrm/public/css");
require "../app/autoload.php";

$router = new Router();

require '../app/routes.php';

$router->dispatch();


 