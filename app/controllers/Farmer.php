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
            $data = [
                'name' => $_SESSION['user_name'],
                'username' => $_SESSION['user_username'],
                'email' => $_SESSION['user_email'],
                'nic' => $_SESSION['user_nic'],
                'mobile' => $_SESSION['user_mobile'],
                // 'password' => $_SESSION['user_password'],

            ];

            if(isset($_POST['update_profile'])){
                $data['name'] = $_POST['name'];
                $data['username'] = $_POST['username'];
                $data['email'] = $_POST['email'];
                $data['nic'] = $_POST['nic'];
                $data['mobile'] = $_POST['mobile'];
                $data['password'] = $_POST['password'];
                
                // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }else{
                // //check email
                // if($this->farmerModel->findUserByEmail($data['email'])){
                //     $data['email_err'] = 'Email already exist';
                // }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            // Validate Username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }
            // Validate NIC
            if (empty($data['nic'])) {
                $data['nic_err'] = 'Please enter NIC';
            }
            // Validate Mobile
            if (empty($data['mobile'])) {
                $data['mobile_err'] = 'Please enter mobile';
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['username_err']) && empty($data['nic_err']) && empty($data['mobile_err']) && empty($data['password_err']) && empty($data['cpassword_err'])) {
                // Validated
                

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'Successfully Updated! ');
                    redirect('users/user_login');
                } else {
                    die('Something went wrong');
                }


            } else {
                // Load view with errors
                $this->view('farmer/update_profile', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'username' => '',
                'email' => '',
                'nic' => '',
                'mobile' => '',
                'password' => '',
                'cpassword' => '',
                'name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'nic_err' => '',
                'mobile_err' => '',
                'password_err' => '',
                'cpassword_err' => ''
            ];

            // Load view
            $this->view('farmer/update_profile', $data);

            }

            
        }
    }

?>
