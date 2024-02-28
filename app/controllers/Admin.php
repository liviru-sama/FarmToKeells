<?php
    class Admin extends Controller{

        public $adminModel;
        public $userModel;

        public function __construct()
        {
            $this->adminModel = $this->model('Admins');
            $this->userModel = $this->model('User'); // Add this line
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


        public function stock_overview(){
            $data = [];

            $this->view('admin/stock_overview', $data);
        }

        public function selectorder(){
            $data = [];

            $this->view('admin/selectorder', $data);
        }

        public function purchaseorder() {
            // Instantiate Purchaseorder Model
            $purchaseorderModel = new Purchaseorder();
            
            // Get all purchase orders
            $data['purchaseorders'] = $purchaseorderModel->getAllPurchaseorders();
            
            // Load the view with purchase orders data
            $this->view('admin/purchaseorder', $data);
        }
        
        public function displayPurchaseorders() {
            // Create an instance of the PurchaseModel
            $purchaseorderModel = new PurchaseorderModel();
    
            // Call the method to fetch all products
            $purchaseorders = $purchaseorderModel->getAllPurchaseorders();
    
            // Pass the fetched products to the view
            require_once('views/admin/purchaseorder');
        }
    

        public function salesorder() {
            // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();
            
            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesorders();
            
            // Load the view with purchase orders data
            $this->view('admin/salesorder', $data);
        }


        public function manageUsers()
        {
            // // Check if the user is an admin
            // if ($_SESSION['user_role'] !== 'admin') {
            //     redirect('farmer/dashboard');
            // }

            // Get a list of pending users
            $pendingUsers = $this->userModel->getPendingUsers();

            // Pass the data to the view
            $data = [
                'title' => 'Pending Users',
                'pendingUsers' => $pendingUsers,
            ];

            $this->view('admin/manageUsers', $data);
        }

        
        public function displaySalesorders() {
            // Create an instance of the PurchaseModel
            $salesorderModel = new SalesorderModel();
    
            // Call the method to fetch all products
            $salesorders = $salesorderModel->getAllSalesorders();
    
            // Pass the fetched products to the view
            require_once('views/admin/salesorder');
        }

        public function viewRegistrationRequests()
        {
            // Check if the user is an admin
            if ($_SESSION['user_role'] !== 'admin') {
                redirect('farmer/dashboard');
            }
        
            // Get a list of pending registration requests
            $pendingRequests = $this->userModel->getPendingRegistrationRequests();
        
            // Pass the data to the view for admin approval/rejection
            $data = [
                'title' => 'Registration Requests',
                'pendingRequests' => $pendingRequests,
            ];
        
            $this->view('admin/manageUsers', $data);
        }


        public function approveRegistrationRequest()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userId = $_POST['user_id'];

                // Debug statement
                echo "Approving user ID: $userId";

                // Perform approval logic
                if ($this->adminModel->approveRegistrationRequest($userId)) {
                    // Notify the user or perform any necessary action
                    flash('admin_message', 'User registration request approved.');
                } else {
                    die('Something went wrong');
                }

                // Redirect back to the admin interface for managing requests
                redirect('admin/viewRegistrationRequests');
            } else {
                // Handle cases where the request method is not POST
                redirect('admin/viewRegistrationRequests');
            }
        }

        public function rejectRegistrationRequest()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userId = $_POST['user_id'];

                // Debug statement
                echo "Rejecting user ID: $userId";

                // Perform rejection logic
                if ($this->adminModel->rejectRegistrationRequest($userId)) {
                    // Notify the user or perform any necessary action
                    flash('admin_message', 'User registration request rejected.');
                } else {
                    die('Something went wrong');
                }

                // Redirect back to the admin interface for managing requests
                redirect('admin/viewRegistrationRequests');
            } else {
                // Handle cases where the request method is not POST
                redirect('admin/viewRegistrationRequests');
            }
        }







        
    }
?>