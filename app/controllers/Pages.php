<?php
    class Pages extends Controller{
        public function __construct(){
            $this->postModel = $this->model('User');
        }

        public function index(){
            $data = [
                'title' => ''
            ];
            
            $this->view('pages/index', $data);
        }


        public function selectadmin(){
            $data = [
                'title' => ''
            ];
            
            $this->view('pages/selectadmin', $data);
        }

        
    }

?>

