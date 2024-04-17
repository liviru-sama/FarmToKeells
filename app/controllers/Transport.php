<?php

class Transport extends Controller
{
     
    public $adminModel;

    public function __construct() {
        
        $this->adminModel = $this->model('Admins'); 
    }

    public function tm_login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'admin_username' => trim($_POST['admin_username']),
                'admin_password' => trim($_POST['admin_password']),
                'admin_username_err' => '',
                'admin_password_err' => ''
            ];
    
            // Validate Username
            if (empty($data['admin_username'])) {
                $data['admin_username_err'] = 'Please enter username';
            }
    
            // Validate Password
            if (empty($data['admin_password'])) {
                $data['admin_password_err'] = 'Please enter password';
            }
    
            // Check for errors
            if (empty($data['admin_username_err']) && empty($data['admin_password_err'])) {
                // Validated
                // Call the validate_login method in the admin model with username and password
                $loggedInAdmin = $this->adminModel->validate_login($data['admin_username'], $data['admin_password']);
                if ($loggedInAdmin) {
                    // Create session
                    $this->createUserSession($loggedInAdmin);
                } else {
                    $data['admin_password_err'] = 'Incorrect username or password';
                    $this->view('transport/tm_login', $data);
                }
            } else {
                // Load view with errors
                $this->view('transport/tm_login', $data);
            }
        } else {
            // Load view
            $this->view('transport/tm_login');
        }
    }
    

    
    
  public function createUserSession($admin_user) {
$_SESSION['admin_id'] = $admin_user->admin_id;
$_SESSION['admin_username'] = $admin_user->admin_username;
// Check if the 'admin_id' session variable exists


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


    public function addChat() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get input data
            $inquiry = $_POST['inquiry'];
    
            // Load the CCM Chat model
            $tm_chatModel = $this->model('Tm_Chat');
    
            // Add the chat message to the database
            if ($tm_chatModel->addChat($inquiry)) {
                // Redirect to the chat page
                redirect('transport/tm_chat');
            } else {
                // If failed to add, show an error message
                die('Failed to add chat message.');
            }
        } else {
            // If not a POST request, redirect to home
            redirect('transport/tm_chat');
        }
    }
    
    
    
    // Farmer controller method to retrieve inquiries
    // Farmer controller method to retrieve inquiries of the current user
    // Farmer controller method to retrieve inquiries
    public function tm_chat() {
        // Load the Inquiry model
        $tm_chatModel = $this->model('Tm_chat');
    
        date_default_timezone_set('Asia/Kolkata'); // Replace 'Asia/Kolkata' with your timezone
        $tm_chats = $tm_chatModel->getAllChats();
    
        // Pass the chat data to the view
        $data = [
            'tm_chats' => $tm_chats,
        ];
    
        // Load the 'ccm/ccm_chat' view and pass data to it
        $this->view('transport/tm_chat', $data);
    }
    
    
    
}
