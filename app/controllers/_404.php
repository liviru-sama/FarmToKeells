<?php

class _404 extends Controller
{
    public function index(){
        $data = [
            'title' => ''
        ];
        
        $this->view('404', $data);
    }
}
