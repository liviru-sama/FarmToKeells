<?php
class Users extends Controller{
    public $userModel;
    public function __construct(){
        $this->userModel = $this->model('User');

    }
    public function index(){
        $data = [
            'title' => ''
        ];
        
        $this->view('pages/index', $data);
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'nic' => trim($_POST['nic']),
                'mobile' => trim($_POST['mobile']),
                'password' => trim($_POST['password']),
                'cpassword' => trim($_POST['cpassword']),
                'name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'nic_err' => '',
                'mobile_err' => '',
                'password_err' => '',
                'cpassword_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }else{
                //check email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email already exist';
                }
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
            // Validate Confirm Password
            if (empty($data['cpassword'])) {
                $data['cpassword_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['cpassword']) {
                    $data['cpassword_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['username_err']) && empty($data['nic_err']) && empty($data['mobile_err']) && empty($data['password_err']) && empty($data['cpassword_err'])) {
                // Validated
                

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'Successfully Registered! You can Login.');
                    redirect('users/user_login');
                } else {
                    die('Something went wrong');
                }


            } else {
                // Load view with errors
                $this->view('users/register', $data);
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
            $this->view('users/register', $data);
        }
    }

    public function user_login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => '',
            ];

            // Validate Username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            
            //CHECK FOR USER/EMAIL
            if ($this->userModel->findUserByUsername($data['username'])) {
                //USER FOUND
            } else {
                //USER NOT FOUND
                $data['username_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['username_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Incorrect Password ';

                    $this->view('users/user_login', $data);
                }


            } else {
                // Load view with errors
                $this->view('users/user_login', $data);
            }
        } else {
            // Init data
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/user_login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_nic'] = $user->nic;
        $_SESSION['user_mobile'] = $user->mobile;
        redirect('farmer/dashboard');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_username']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_nic']);
        unset($_SESSION['user_mobile']);
        session_destroy();
        redirect('users/user_login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }
}
?>
