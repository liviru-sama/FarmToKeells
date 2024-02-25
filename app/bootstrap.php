<?php

    //load config
    require_once 'config/config.php';

    //Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

    //Autoload Core Libraries
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });

    spl_autoload_register(function($className){
        $libraries_file = 'libraries/' . $className . '.php';
        if (file_exists($libraries_file)) { require_once $libraries_file; return; }
        
        $models_file = 'models/' . $className . '.php'; // Adjusted to look for models
        if (file_exists($models_file)) { require_once $models_file; return; }
    });
    

?>