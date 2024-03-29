<?php
    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //Register user
        public function register($data){
            $this->db->query('INSERT INTO users (name, username, email, nic, mobile, password, status) VALUES(:name, :username, :email, :nic, :mobile, :password, :status)');
            //Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':nic', $data['nic']);
            $this->db->bind(':mobile', $data['mobile']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':status', 'pending'); // Set initial status to 'pending'
        
            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                // Log the error
                error_log("User registration failed.");
                return false;
            }
        }

        //Find user by email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            //Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        //find user by username
        public function findUserByUsername($username){
            $this->db->query('SELECT * FROM users WHERE username = :username');
            //Bind value
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        //find user by ID
        public function findUserByID($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            //Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }
        }

        //Login User
        public function login($username, $password){
            $this->db->query('SELECT * FROM users WHERE username = :username');
            $this->db->bind(':username', $username);
        
            $row = $this->db->single();
        
            if ($row && $row->status === 'approved') {
                $hashed_password = $row->password;
                if (password_verify($password, $hashed_password)) {
                    return $row;
                }
            }
        
            return false;
        }

        public function getUserById($id) {
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
        
            return $this->db->single();
        }

        // Add this method to your User class
        public function getPasswordById($id) {
            $this->db->query('SELECT password FROM users WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return ($this->db->rowCount() > 0) ? $row->password : null;
        }


        public function changePassword($data) {
            $this->db->query('UPDATE users SET password = :password WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $_SESSION['user_id']);
            $this->db->bind(':password', $data['password']);
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // app/models/User.php

        public function updateUsername($user_id, $new_username) {
            $this->db->query('UPDATE users SET username = :new_username WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $user_id);
            $this->db->bind(':new_username', $new_username);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateName($user_id, $new_name) {
            $this->db->query('UPDATE users SET name = :new_name WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $user_id);
            $this->db->bind(':new_name', $new_name);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateEmail($user_id, $new_email) {
            $this->db->query('UPDATE users SET email = :new_email WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $user_id);
            $this->db->bind(':new_email', $new_email);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateMobile($user_id, $new_mobile) {
            $this->db->query('UPDATE users SET mobile = :new_mobile WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $user_id);
            $this->db->bind(':new_mobile', $new_mobile);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateNIC($user_id, $new_nic) {
            $this->db->query('UPDATE users SET nic = :new_nic WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $user_id);
            $this->db->bind(':new_nic', $new_nic);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        



        public function updatePassword($user_id, $new_password) {
            $sql = "UPDATE users SET password = :new_password WHERE id = :user_id";
            $this->db->query($sql);
            $this->db->bind(':new_password', $new_password);
            $this->db->bind(':user_id', $user_id);
            
            $pwd_updated = $this->db->execute();
            if ($pwd_updated){
                
                $sql_users = "UPDATE users SET password = :new_password WHERE id = :user_id";
                $this->db->query($sql_users);
                $this->db->bind(':new_password', $new_password);
                $this->db->bind(':user_id', $user_id);
                $this->db->execute();


                
                return true; // Password update successful
            } else{
                return false; // Password update failed
            }

        }



        public function deleteUser($id) {
            $this->db->query('DELETE FROM users WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        

        public function update_profile($data) {
            $this->db->query('UPDATE users SET name = :name, email = :email, username = :username WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':username', $data['username']);
    
            // Execute
            return $this->db->execute();
        }

        public function getPendingUsers()
        {
            $this->db->query('SELECT * FROM users WHERE status = "pending"');
            $result = $this->db->resultSet();
           
            if ($this->db->rowCount() > 0) {
                return $result;
            } else {
                return [];
            }
        }

        // User model method to get pending registration requests
        public function getPendingRegistrationRequests()
        {
            $this->db->query('SELECT id as user_id, name, email FROM users WHERE status = "pending"');
            $result = $this->db->resultSet();
        
            // Log the result
            error_log("Pending Registration Requests: " . print_r($result, true));
        
            if ($this->db->rowCount() > 0) {
                return $result;
            } else {
                return [];
            }
        }
        

        public function approveRegistrationRequest($userId)
        {
            $this->db->query('UPDATE users SET status = "approved" WHERE id = :id');
            $this->db->bind(':id', $userId);
            return $this->db->execute();
        }

        public function rejectRegistrationRequest($userId)
        {
            $this->db->query('DELETE FROM users WHERE id = :id');
            $this->db->bind(':id', $userId);
            return $this->db->execute();
        }



    }

