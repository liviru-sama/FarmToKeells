<?php
    //Simple page redirect
    function redirect($page){
        print_r($page);
        header('location: ' . URLROOT . '/' . $page);
    }