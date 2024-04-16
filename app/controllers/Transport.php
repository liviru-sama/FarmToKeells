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


    public function ccm_chat() {
        // Load the Inquiry model
        $ccm_chatModel = $this->model('ccm_chat');
    
        // Get all chats from the database
        $ccm_chats = $ccm_chatModel->getAllChats();
    
        // Pass the chat data to the view
        $data = [
            'ccm_chats' => $ccm_chats,
        ];
    
        // Load the 'ccm/ccm_chat' view and pass data to it
        $this->view('transport/tm_chat', $data);
    }

    public function add() {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize the model
            $tmChatModel = $this->model('TmChat');

            // Add tm_chat message
            if ($tmChatModel->addTmChat($_POST['tm_reply'], $_POST['tm_reply_time'])) {
                // Redirect to the tm_chat page after successful addition
                redirect('transport/tm_chat');
            } else {
                die('Something went wrong.');
            }
        } else {
            // If not a POST request, redirect to the tm_chat page
            redirect('transport/tm_chat');
        }
    }

    public function addChat() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get input data
            $inquiry = $_POST['inquiry'];
    
            // Load the CCM Chat model
            $ccm_chatModel = $this->model('Ccm_Chat');
    
            // Add the chat message to the database
            if ($ccm_chatModel->addChat($inquiry)) {
                // Redirect to the chat page
                redirect('ccm/ccm_chat');
            } else {
                // If failed to add, show an error message
                die('Failed to add chat message.');
            }
        } else {
            // If not a POST request, redirect to home
            redirect('pages/index');
        }
    }
    
}
