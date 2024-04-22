<?php
class Users extends Controller {
    public $userModel;

    public function __construct() {
        $this->userModel = $this->model('User');

        // if(!isset($_SESSION['user_id'])){
        //     redirect('users/user_login');
        // }
    }

    public function index() {
        $data = [
            'title' => ''
        ];

        //     // Check if user is already logged in
        // if(isset($_SESSION['user_id'])){
        //     redirect('farmer/dashboard');
        // }

        $this->view('pages/index', $data);
    }

    public function register() {
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
                'province' => trim($_POST['province']),
                'distance' => trim($_POST['distance']),
                'collectioncenter' => trim($_POST['collectioncenter']),
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
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Invalid email format';
            } else {
                // Check if email already exists
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email already exists';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            } else {
                // Check if username already exists
                if ($this->userModel->findUserByUsername($data['username'])) {
                    $data['username_err'] = 'Username already exists';
                }
            }

            // Validate NIC
            if (empty($data['nic'])) {
                $data['nic_err'] = 'Please enter NIC';
            } elseif (strlen($data['nic']) !== 10 && strlen($data['nic']) !== 12) {
                $data['nic_err'] = 'NIC must be 10 or 12 characters';
            } else {
                // Check if NIC already exists
                if ($this->userModel->findUserByNic($data['nic'])) {
                    $data['nic_err'] = 'NIC already exists';
                }
            }

            // Validate Mobile
            if (empty($data['mobile'])) {
                $data['mobile_err'] = 'Please enter mobile';
            } elseif (!preg_match('/^\d{9,10}$/', $data['mobile'])) {
                $data['mobile_err'] = 'Mobile must have 9 or 10 digits';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $data['password'])) {
                $data['password_err'] = 'Password must contain at least one letter and one number';
            }

            // Validate Confirm Password
            if (empty($data['cpassword'])) {
                $data['cpassword_err'] = 'Please confirm password';
            } elseif ($data['password'] !== $data['cpassword']) {
                $data['cpassword_err'] = 'Passwords do not match';
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
                'province' => '',
                'distance' => '',
                'collectioncenter' => '',
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

    public function user_login() {
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
            $user = $this->userModel->login($data['username'], $data['password']);
            if ($user) {
                if ($user->status === 'accept') {
                    // Validated
                    // Create Session
                    $this->createUserSession($user);
                } else {
                    // User exists but status is not 'accept'
                    $data['username_err'] = 'Your account has not been approved yet.';
                    $this->view('users/user_login', $data);
                }
            } else {
                // User not found
                $data['username_err'] = 'No user found';
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

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_nic'] = $user->nic;
        $_SESSION['user_mobile'] = $user->mobile;
        $_SESSION['user_province'] = $user->province;
        $_SESSION['user_collectioncenter'] = $user->collectioncenter;

        redirect('farmer/dashboard');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_username']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_nic']);
        unset($_SESSION['user_mobile']);
        unset($_SESSION['user_province']);
        unset($_SESSION['user_collectioncenter']);
        session_destroy();
        redirect('users/user_login');
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
