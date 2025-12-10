<?php 
if (session_id() === "") {
    session_start();
}
define("BASE_URL", "/DSP3-BD023/minicrm/public/index.php");
require '../app/helpers.php';   
require '../app/routes.php';