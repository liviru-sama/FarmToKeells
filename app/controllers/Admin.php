<?php
    class Admin extends Controller{
        public function dashboard(){
            $data = [];

            $this->view('admin/dashboard', $data);
        }


        public function stock_overview(){
            $data = [];

            $this->view('admin/stock_overview', $data);
        }

    }
?>