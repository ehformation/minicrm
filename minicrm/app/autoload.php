<?php 

spl_autoload_register(function($class) {    

    $class = str_replace("\\", "/", $class);

    $paths = [
        "../app/Core/$class.php",
        "../app/Controllers/$class.php",
        "../app/Helpers/$class.php",
        "../app/Models/$class.php",
    ];

    foreach($paths as  $file) {
        if(file_exists($file)) {
            require $file;
            return;
        }
    }
});