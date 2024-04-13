<?php
    class Admins{
        private $db;

        public function __construct(){
            $this->db = new Database;
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

        //Login User
      


        public function validate_login($admin_username, $admin_password)
        {
            $this->db->query('SELECT * FROM admins WHERE admin_username = :admin_username');
            $this->db->bind(':admin_username', $admin_username);
        
            $row = $this->db->single();
        
            if ($row) {
                $stored_password = $row->admin_password;
                
                // Compare the plaintext password provided by the user with the stored password
                if ($admin_password === $stored_password) {
                    // Password is correct
                    return $row; // Return the admin object
                }
            }
        
            return false; // Invalid username or password
        }
        

        
        
        

    

        public function getPendingRegistrationRequests()
            {
                $this->db->query('SELECT id as user_id, name, email FROM users WHERE status = "pending"');
                $result = $this->db->resultSet();

                if ($this->db->rowCount() > 0) {
                    return $result;
                } else {
                    return [];
                }
            }

        


        

        


    

    }

