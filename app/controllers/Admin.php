<?php
    class Admin extends Controller{

        public $adminModel;

            public function __construct() {
                
                $this->adminModel = $this->model('Admins'); 
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
        
        public function displaySalesorders() {
            // Create an instance of the PurchaseModel
            $salesorderModel = new SalesorderModel();
    
            // Call the method to fetch all products
            $salesorders = $salesorderModel->getAllSalesorders();
    
            // Pass the fetched products to the view
            require_once('views/admin/salesorder');
        }

        
    }
?>