<?php

class Transport extends Controller
{
     
    public $adminModel;

    public function __construct() {
        
        $this->adminModel = $this->model('Admins'); 
    }

    public function tm_login()
    {
      
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
    
                        $this->view('transport/tm_login', $data);
                    }
    
    
                } else {
                    // Load view with errors
                    $this->view('transport/tm_login', $data);
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
                $this->view('transport/tm_login', $data);
            
        }
        
       
    }

    public function createUserSession($admin_user) {
        $_SESSION['admin_id'] = $admin_user->admin_id;
        $_SESSION['admin_username'] = $admin_user->admin_username;
        // No need to store admin name and email if they are not present in the table
        redirect('transport/dashboard');
    }
    



    public function index(){
        $data = [
            'title' => 'Transport Dashboard'
        ];
        
        $this->view('transport/dashboard', $data);
    }

    public function pending_requests(){
        $data = [
            'title' => 'Transport Requests'
        ];

        $requests = $this->model('Request');

        $users = $this->model('User');

        $products = $this->model('Product');

        $data['activeRequests'] = $requests->getActiveRequests();

        // show($data['activeRequests']);

        foreach ($data['activeRequests'] as $request) {
            $user = $users->findUserByID($request->user_id);
            $request->user = $user->name;
            $product = $products->getProductByID($request->product_id);
            $request->product = $product->name;
        }

        $this->view('transport/pending_requests', $data);
    }

    public function cancelled_requests(){
        $data = [
            'title' => 'Transport Requests'
        ];

        $requests = $this->model('Request');

        $users = $this->model('User');

        $products = $this->model('Product');

        $data['cancelledRequests'] = $requests->getCancelledRequests();

        // show($data['activeRequests']);
        foreach ($data['cancelledRequests'] as $request) {
            $user = $users->findUserByID($request->user_id);
            $request->user = $user->name;
            $product = $products->getProductByID($request->product_id);
            $request->product = $product->name;
        }

        $this->view('transport/cancelled_requests', $data);
    }

    public function resources() {

    }
}
