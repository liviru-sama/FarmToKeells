<?php
class Admin extends Controller{

    public $adminModel;
    public $userModel;

    public function __construct()
    {
        // Load models here
        $this->adminModel = $this->model('Admins');
        $this->userModel = $this->model('User');
    }

    public function index(){
        $data = [
            'title' => ''
        ];

        $this->view('admin/dashboard', $data);
    }    

    public function admin_login(){
      
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'admin_username' => trim($_POST['admin_username']),
                'admin_password' => trim($_POST['admin_password']),
                'admin_username_err' => '',
                'admin_password_err' => '',
            ];

            // Validate Username
            if (empty($data['admin_username'])) {
                $data['admin_username_err'] = 'Please enter username';
            }
            // Validate Password
            if (empty($data['admin_password'])) {
                $data['admin_password_err'] = 'Please enter password';
            }
            
            //CHECK FOR USER/EMAIL
            if ($this->adminModel->findUserByUsername($data['admin_username'])) {
                //USER FOUND
            } else {
                //USER NOT FOUND
                $data['admin_username_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['admin_username_err']) && empty($data['admin_password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInAdmin = $this->adminModel->admin_login($data['admin_username'], $data['admin_password']);

                if ($loggedInAdmin) {
                    // Create Session
                    $this->createUserSession($loggedInAdmin);
                } else {
                    $data['admin_password_err'] = 'Incorrect Password ';

                    $this->view('admin/admin_login', $data);
                }


            } else {
                // Load view with errors
                $this->view('admin/admin_login', $data);
            }
        } else {
            // Init data
            $data = [
                'admin_username' => '',
                'admin_password' => '',
                'admin_username_err' => '',
                'admin_password_err' => '',
            ];

            // Load view
            $this->view('admin/admin_login', $data);

        }
    }

    public function createUserSession($admin_user) {
        $_SESSION['admin_id'] = $admin_user->admin_id;
        $_SESSION['admin_username'] = $admin_user->admin_username;
        // No need to store admin name and email if they are not present in the table
        redirect('admin/dashboard');
    }

    public function dashboard(){
        $data = [];

        $this->view('admin/dashboard', $data);
    }

    public function manageUsers()
    {
        // Get pending registration requests
        $pendingUsers = $this->userModel->getPendingUsers();

        // Get accepted users
        $acceptedUsers = $this->userModel->getAcceptedUsers(); // Assuming you have a method to retrieve accepted users
        
        $data = [
            'pendingUsers' => $pendingUsers,
            'acceptedUsers' => $acceptedUsers
        ];

        $this->view('admin/manageUsers', $data);
    }




    public function acceptUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];

            // Perform acceptance logic using User model
            $userModel = $this->model('User');

            if ($userModel->acceptRegistrationRequest($userId)) {
                // Notify the user or perform any necessary action
                flash('admin_message', 'User registration request accepted.');
            } else {
                die('Something went wrong');
            }

            // Redirect back to the admin interface for managing requests
            redirect('admin/manageUsers');
        } else {
            // Handle cases where the request method is not POST
            redirect('admin/manageUsers');
        }
    }

    public function rejectUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];

            // Perform rejection logic using User model
            $userModel = $this->model('User');

            if ($userModel->rejectRegistrationRequest($userId)) {
                // Notify the user or perform any necessary action
                flash('admin_message', 'User registration request rejected.');
            } else {
                die('Something went wrong');
            }

            // Redirect back to the admin interface for managing requests
            redirect('admin/manageUsers');
        } else {
            // Handle cases where the request method is not POST
            redirect('admin/manageUsers');
        }
    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];

            // Perform deletion logic using User model
            $userModel = $this->model('User');

            if ($userModel->deleteUser($userId)) {
                // Notify the admin or perform any necessary action
                flash('admin_message', 'User account deleted successfully.');
            } else {
                die('Something went wrong');
            }

            // Redirect back to the admin interface for managing users
            redirect('admin/manageUsers');
        } else {
            // Handle cases where the request method is not POST
            redirect('admin/manageUsers');
        }
    }




}
?>
