<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        //print_r($this->getUrl());

        $url = $this->getUrl();

        // Check if the URL array is not empty
        if (!empty($url)) {
            // Look in controllers for the first value
            if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                // Remove the first element from the $url array
                array_shift($url);
            }else{
                $this->currentController = '_404';
            }
        }

        // Require the controller
        require_once '../app/controllers/'. $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for the second part of URL
        if (!empty($url[0])) {
            // Check to see if the method exists in the controller
            if(method_exists($this->currentController, $url[0])){
                $this->currentMethod = $url[0];
                // Remove the first element from the $url array
                array_shift($url);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with an array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return [];
        }
    }

    
}
