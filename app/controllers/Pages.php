<?php
    class Pages extends Controller{
        public function __construct(){
            $this->postModel = $this->model('User');
        }

        public function index() {
            if ($this->isLoggedIn()) {
                redirect('farmer/dashboard');
            } else {
                $data = [
                    'title' => ''
                ];
                $this->view('pages/index', $data);
            }
        }


        public function selectadmin(){
            $data = [
                'title' => ''
            ];
            
            $this->view('pages/selectadmin', $data);
        }

        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }

        
    }

?>

