<?php
    session_start();
    require_once 'config/config.php';
    require_once 'helpers/DbFunctions.php';

    // Autoload Core libraries.

    spl_autoload_register(function($className){
        require_once 'libraries/' . $className .'.php';
    });
    



?>
