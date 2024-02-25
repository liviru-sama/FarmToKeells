<?php

class Monitor extends Controller
{
    public function index(){
        $data = [
            'title' => 'Transport Monitor'
        ];
        
        $this->view('monitor/dashboard', $data);
    }
}