<?php

class Transport extends Controller
{
     
    public $adminModel;
    public $tmModel;


    public function __construct() {
        $this->tmModel = $this->model('TmModel'); 

        $this->adminModel = $this->model('Admins'); 
        $this->userModel = $this->model('User');

    }

    public function addAdminCredentials() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $adminUsername = filter_input(INPUT_POST, 'admin_username', FILTER_SANITIZE_STRING);
            $adminPassword = filter_input(INPUT_POST, 'admin_password', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $admincPassword = filter_input(INPUT_POST, 'admin_cpassword', FILTER_SANITIZE_STRING);
    
            // Initialize error array
            $errors = [];
    

            // Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_err'] = "Invalid email format.";
}

            // Validate if passwords match
            if ($adminPassword !== $admincPassword) {
                $errors['cpassword_err'] = "Passwords do not match.";
            }
    
            // Validate all fields are filled
            if (empty($adminUsername) || empty($adminPassword) || empty($email) || empty($admincPassword)) {
                $errors['fields_err'] = "All fields are required.";
            }
    
            // If there are no errors, proceed with registration
            if (empty($errors)) {
                // Hash the admin password
                $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
    
                // Call the model method to insert admin credentials
                if ($this->tmModel->insertAdminCredentials($adminUsername, $hashedPassword, $email)) {
                    // Admin credentials inserted successfully
                    // You can redirect to a success page or perform other actions
                    $success_message = "TM credentials inserted successfully.</br> Now You can Login";
    
                    // Load the login view with success message
                    $this->view('transport/tm_login', ['success_message' => $success_message]);
                    exit;
                } else {
                    // Failed to insert admin credentials
                    // You can redirect to an error page or perform other actions
                    echo "Failed to insert admin credentials";
                }
            } else {
                // Load the view with errors
                $this->view('transport/tm_register', ['errors' => $errors]);
            }
        } else {
            // If not a POST request, load the registration form
            $this->view('transport/tm_register');
        }
    }
    

    public function tm_register() {
        // Load the view file
        $this->view('transport/tm_register');
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
                // Call the validate_login method in the tm model with username and password
                $loggedInAdmin = $this->tmModel->validateLogin($data['admin_username'], $data['admin_password']);
                if ($loggedInAdmin) {
                    // Start session if not already started
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
    
                    // Create session variables
                    $_SESSION['admin_id'] = $loggedInAdmin->id;
                    $_SESSION['admin_username'] = $loggedInAdmin->username;
    
                    // Redirect to tm dashboard or any desired page
                    redirect('transport/dashboard');                    exit;
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
    
    
    public function logout() {
        // Unset all of the session variables
        $_SESSION = array();
      
        // Destroy the session.
        session_destroy();
      
        // Set a short session expiration time (e.g., 5 minutes) for future sessions
        ini_set('session.cookie_lifetime', 5 ); // Adjust as needed
      
        // Redirect to the index page
        redirect('transport/tm_login');
      }


      public function getUserInfo($user_id) {
        return $this->userModel->getUserInfoById($user_id);
    }

    
      public function salesorderapproved() {
        // Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesordersapproved();
        
        // Load the view with purchase orders data
        $this->view('transport/salesorderapproved', $data);
    }

    public function salesordercompleted() {
        // Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesorderscompleted();
        
        // Load the view with purchase orders data
        $this->view('transport/salesordercompleted', $data);
    }


      public function Notifications() {
        $notificationModel = $this->model('TmNotifications');
    
        $notifications = $notificationModel->getAllNotifications();
    
       
        $data = [
            'notifications' => $notifications,
        ];
    
        // Load the 'farmer/inquiry' view and pass data to it
        $this->view('transport/notifications', $data);
      }
}
