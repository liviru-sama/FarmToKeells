<?php
    class Farmer extends Controller{
        public function dashboard(){
            $data = [];

            $this->view('farmer/dashboard', $data);
        }

        public function view_profile(){
            $data = [
                'name' => $_SESSION['user_name'],

            ];

            $this->view('farmer/view_profile', $data);
        }

        public function update_profile(){
            $data = [];

            $this->view('farmer/update_profile', $data);
        }
    }

?>
