<?php

class Monitor extends Controller
{
    public function index(){
        $data = [
            'title' => 'Transport Monitor'
        ];
        
        $this->view('monitor/dashboard', $data);
    }

    public function driverList(){
        $data = [
            'title' => 'Drivers'
        ];
        
        $this->view('monitor/driverList', $data);
    }

    public function vehicleList(){
        $data = [
            'title' => 'Vehicles'
        ];
        
        $this->view('monitor/vehicleList', $data);
    }
}