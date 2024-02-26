<?php
    class Admins{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        

       

        //Login User
        public function admin_login($admin_username, $admin_password){
            $this->db->query('SELECT * FROM admins WHERE admin_username = :admin_username');
            $this->db->bind(':admin_username', $admin_username);

            $row = $this->db->single();

            $hashed_password = $row->admin_password;
            if(password_verify($admin_password, $hashed_password)){
               
            } else {
                return false;
            }

        }

        public function findUserByUsername($admin_username){
            $this->db->query('SELECT * FROM admins WHERE admin_username = :admin_username');
            //Bind value
            $this->db->bind(':admin_username', $admin_username);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        public function ccm_login($admin_username, $admin_password){
            $this->db->query('SELECT * FROM admins WHERE admin_username = :admin_username');
            $this->db->bind(':admin_username', $admin_username);

            $row = $this->db->single();

            $hashed_password = $row->admin_password;
            if(password_verify($admin_password, $hashed_password)){
               
            } else {
                return false;
            }

        }

        


    

    }

