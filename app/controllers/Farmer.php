<?php
    class Farmer extends Controller{
        public function dashboard(){
            $data = [];

            $this->view('farmer/dashboard', $data);
        }

        public function view_profile(){
            $data = [
                'name' => '',

            ];

            $this->view('farmer/view_profile', $data);
        }
    }

