<?php
    class Ccm extends Controller{
        public function dashboard(){
            $data = [];

            $this->view('ccm/dashboard', $data);
        }

        public function view_inventory(){
            $data = [];

            $this->view('ccm/view_inventory', $data);
        }
    }
        
?>
