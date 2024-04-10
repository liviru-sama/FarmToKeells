<?php
    class Farmer extends Controller{
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
                'username' => $_SESSION['user_username'],
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                
                'new_username_err' => '',
                'new_name_err' => '',
                'new_email_err' => '',
                'new_mobile_err' => '',
                'new_password_err' => ''
            ];

            $this->view('farmer/update_profile', $data);
        }


        public function deleteUser($user_id){
            if($this->userModel->deleteUser($user_id)){
                // Clear the session and redirect to the login page
                unset($_SESSION['user_id']);
                unset($_SESSION['user_username']);
                unset($_SESSION['user_name']);
                unset($_SESSION['user_email']);
                unset($_SESSION['user_mobile']);
                unset($_SESSION['user_nic']);
                flash('user_message', 'User deleted successfully');
                redirect('users/login');
            } else {
                die('Something went wrong');
            }
        }

        public function changePassword($user_id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
            $data = [
              'current_password' => trim($_POST['current_password']),
              'new_password' => trim($_POST['new_password']),
              'confirm_password' => trim($_POST['confirm_password']),
              'current_password_err'=>'',
              'new_password_err'=>'',
              'confirm_password_err'=>''
            ];
    
            if(empty($data['current_password'])){
                $data['current_password_err']='Please enter current password';      
            }
    
            if(empty($data['new_password'])){
                $data['new_password_err']='Please enter new password';      
            }elseif(strlen($data['new_password'])<6){
                $data['new_password_err']='Password must be atleast 6 characters'; 
            }
    
            if(empty($data['confirm_password'])){
                $data['confirm_password_err']='Please re-enter new password';      
            }else{
                if($data['new_password']!=$data['confirm_password']){
                    $data['confirm_password_err']='passwords do not match';
                }
            }
    
            
    
            if(empty($data['username_err']) && empty($data['email_err'])&& empty($data['confirm_password_err'])){
                // Validated
    
                // Fetch the hashed password from the database based on the user ID
                $hashed_password_from_db = $this->userModel->getPasswordById($user_id);
    
                // Verify if the entered current password matches the hashed password from the database
                if (!password_verify($data['current_password'], $hashed_password_from_db)) {
                    $data['current_password_err'] = 'Current password is incorrect';
                } else {
                    // Hash the new password
                    $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
    
                    // Update the user's password
                    if ($this->userModel->updatePassword($user_id, $data['new_password'])) {
                    flash('user_message', 'Password updated successfully');
                    redirect('undergrad/ug_profile');
                    } else {
                    die('Something went wrong');
                    }
                }
    
              } else {
                // Load view with errors
                $this->view('undergrad/ug_profile', $data);
              }
            
            }   
        
            else {
                $data = [
                'current_password' => '',
                'new_password' => '',
                'confirm_password' => '',
                'current_password_err'=>'',
                'new_password_err'=>'',
                'confirm_password_err'=>''
              ];
        
              $this->view('undergrad/ug_profile', $data);
            }
    
            $this->view('undergrad/ug_profile', $data);
    
        }

        public function updateUsername($user_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                $data = [
                    
                    'new_username' => trim($_POST['new_username']),
                    'new_username_err' => ''
                ];
            
                if (empty($data['new_username'])) {
                    $data['new_username_err'] = 'Please enter a new username';
                }
            
                if (empty($data['new_username_err'])) {
                    // Update username in the database
                    // After successful update in the database
                    if ($this->userModel->updateUsername($user_id, $data['new_username'])) {
                        // Update the session variable immediately
                        $_SESSION['user_username'] = $data['new_username'];
                        flash('user_message', 'Username updated successfully');
                        redirect('farmer/update_profile');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('farmer/update_profile', $data);
                }
            } else {
                // This part is not needed, as it resets $data to empty values before rendering the form
                $data = [
                    'new_username' => '',
                    'new_username_err' => ''
                ];
                $this->view('farmer/update_profile', $data);
            }
        }

        public function updateName($user_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                $data = [
                    
                    'new_name' => trim($_POST['new_name']),
                    'new_name_err' => ''
                ];
            
                if (empty($data['new_name'])) {
                    $data['new_name_err'] = 'Please enter a new name';
                }
            
                if (empty($data['new_name_err'])) {
                    // Update username in the database
                    // After successful update in the database
                    if ($this->userModel->updateName($user_id, $data['new_name'])) {
                        // Update the session variable immediately
                        $_SESSION['user_name'] = $data['new_name'];
                        flash('user_message', 'Name updated successfully');
                        redirect('farmer/update_profile');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('farmer/update_profile', $data);
                }
            } else {
                // This part is not needed, as it resets $data to empty values before rendering the form
                $data = [
                    'new_name' => '',
                    'new_name_err' => ''
                ];
                $this->view('farmer/update_profile', $data);
            }

        }

        public function place_order() {
            $request = $this->model('Request');
            $salesOrder = $this->model('SalesOrder'); // Initialize SalesOrder model
                    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize input data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                // Fetch order ID and user ID from POST data
                $orderId = $_POST['order_id']; // Assuming order_id is passed as a hidden input in the form
                $userId = $_POST['user_id']; // Assuming user_id is passed as a hidden input in the form
        
                // Fetch product data from SalesOrder model
                $salesData = $salesOrder->getSalesOrderData($orderId);
                $product_name = $salesData->name; // Access the property 'name' of the $salesData object
        
                // Load other necessary data
        
                // Initialize data array
                $data = [
                    'order_id' => $orderId,
                    'user_id' => $userId,
                    'product_name' => $product_name, // Pass product_name retrieved from SalesOrder model
                    'quantity' => trim($_POST['quantity']),
                    'startdate' => trim($_POST['startdate']),
                    'enddate' => trim($_POST['enddate']),
                    'notes' => trim($_POST['notes']),
                    'errors' => [
                        'product_err' => '',
                        'quantity_err' => '',
                        'startdate_err' => '',
                        'enddate_err' => ''
                    ]
                ];
        
                // Validate input data
                if (empty($data['quantity'])){
                    $data['errors']['quantity_err'] = 'Please provide a quantity';
                }
        
                // Other validation checks...
        
                // Check for validation errors
                $errorCount = count(array_filter($data['errors']));
                if ($errorCount > 0){
                    // Load necessary models and data for the view
                    $product = $this->model('Product');
                    $products = $product->getAllProducts();
                    $data['products'] = $products;
        
                    // Load the view with errors
                    $this->view('farmer/place_order', $data);
                } else {
                    // Insert data into database
                    if ($request->insert($data)) {
                        redirect('farmer/place_order');
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load initial data for the view
                $data = [
                    'title' => 'Place Order',
                    'errors' => [
                        'product_err' => '',
                        'quantity_err' => '',
                        'startdate_err' => '',
                        'enddate_err' => ''
                    ]
                ];
        
                $product = $this->model('Product');
                $products = $product->getAllProducts();
                $data['products'] = $products;
        
                // Load the view
                $this->view('farmer/place_order', $data);
            }
        }
        
        
        
        public function salesorder() {
            // Retrieve the user ID from the session
            $user_id = $_SESSION['user_id']; // Adjust this according to your session implementation
            
            // Instantiate Salesorder Model
            $salesorderModel = new Salesorder();
            
            // Get sales orders for the current user with purchase_id as null
            $data['salesorders'] = $salesorderModel->getSalesordersByUserIdAndPurchaseId($user_id, null);
            
            // Load the view with sales orders data
            $this->view('farmer/salesorder', $data);
        }
        

       
        
        public function displaySalesorders() {
            // Create an instance of the PurchaseModel
            $salesorderModel = new SalesorderModel();
    
            // Call the method to fetch all products
            $salesorders = $salesorderModel->getAllSalesorders();
    
            // Pass the fetched products to the view
            require_once('views/farmer/salesorder');
        }

        public function purchaseorder() {
            // Instantiate Purchaseorder Model
            $purchaseorderModel = new Purchaseorder();
            
            // Get all purchase orders
            $data['purchaseorders'] = $purchaseorderModel->getAllPurchaseorders();
            
            // Load the view with purchase orders data
            $this->view('farmer/purchaseorder', $data);
        }


        public function place_salesorder($purchase_id) {
            // Instantiate Purchaseorder Model
            $purchaseorderModel = $this->model('Purchaseorder');
            
            // Get the selected purchase order
            $data['purchaseorder'] = $purchaseorderModel->getPurchaseorderById($purchase_id);
            
            // Instantiate Salesorder Model
            $salesorderModel = $this->model('Salesorder');
            
            // Get relevant sales orders for the selected purchase order and user ID
            $data['salesorders'] = $salesorderModel->getSalesordersByPurchaseIdAndUserId($purchase_id, $_SESSION['user_id']);
            
            // Pass the user ID to the view
            $data['user_id'] = $_SESSION['user_id'];
            
            // Load the view with purchase order and sales orders data
            $this->view('farmer/place_salesorder', $data);
        }
        
        public function add_salesorder(){
            // Check if it's a POST request
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Load the Salesorder model
                $this->model("Salesorder");
                $salesorderModel = new Salesorder();
                
                // Sanitize and validate POST data
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $date = isset($_POST['date']) ? trim($_POST['date']) : ''; 
                $address = trim($_POST['address']);
                $purchase_id = trim($_POST['purchase_id']);
                $user_id = trim($_POST['user_id']);
                $image = isset($_POST['image']) ? trim($_POST['image']) : ''; // Assuming the image is sent as a URL
                
                // Check for required fields
                if (empty($name) || empty($type) || empty($quantity) || empty($date) || empty($address)) {
                    echo "Please fill in all fields.";
                    return;
                }
                
                // Attempt to add product
                $data = [
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'date' => $date,
                    'address' => $address,
                    'purchase_id' => $purchase_id,
                    'user_id' => $user_id,
                    'image' => $image
                ];
        
                if ($salesorderModel->add_salesorder($data)) {
                    // Redirect to the place_salesorder route with both purchase_id and user_id
                    redirect('farmer/place_salesorder/' . $purchase_id . '?user_id=' . $user_id);
                    exit();
                } else {
                    // Product addition failed
                    echo "Failed to add sales order.";
                }
            } else {
                // If not a POST request, load the add sales order page with the purchase_id
                $purchase_id = $_GET['purchase_id'] ?? null;
                
                // Load the add sales order view with the purchase_id if it exists
                $this->view("farmer/add_salesorder", ['purchase_id' => $purchase_id]);
            }
        }
        
        public function edit_salesorder(){
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Instantiate Product Model with Database dependency injection
                $salesorderModel = new Salesorder();
        
                // Sanitize and validate POST data
                // $id = $_POST['id']; // Assuming the id of the product to edit is passed via POST
                $order_id = trim($_POST["order_id"]); 
                print_r(trim($_POST['name'])."</br>");
                print_r(trim($_POST['type'])."</br>");
                print_r(trim($_POST['date'])."</br>");
                print_r(trim($_POST['quantity'])."</br>");
                print_r(trim($_POST['address'])."</br>");
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $date = trim($_POST['date']);
                $address = trim($_POST['address']);
        
                // Check for required fields
                if (empty($name) || empty($type) || empty($quantity) || empty($date) || empty($address)) {
                    echo "Please fill in all fields.";
                    return;
                }
        
                // Attempt to edit product
                $data = [
                    'order_id' => $order_id,
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'date' => $date,
                    'address' => $address
                ];
        
                if ($salesorderModel->edit_salesorder($data)) {
                    // Product edited successfully
                    
                    $purchase_id = $salesorderModel->getPurchaseIdByOrderId($order_id);
                    if ($purchase_id) {
                        // Redirect to place_salesorder page with the relevant purchase_id
                        redirect('farmer/place_salesorder/' . $purchase_id);
                    } else {
                        // Failed to get purchase ID
                        echo "Failed to retrieve purchase ID.";
                    }
                } else {
                    // Product editing failed
                    echo "Failed to edit salesorder.";
                }
            } else {
                // If not a POST request, redirect to the edit product page or show an error message
                $id = $_GET['id'];
                $salesorderModel = new Salesorder();
                $salesorderData = $salesorderModel->view_salesorder($id);
                
                $this->view("farmer/edit_salesorder",(array)$salesorderData);
            }
        }

        public function delete_salesorder(){
            // Check for POST
            if ($_POST['order_id'] != NULL) {
                // Get the order ID from POST data
                $order_id = $_POST['order_id'];
        
                // Debug statement to check the order ID
        
                // Instantiate Salesorder Model
                $salesorderModel = $this->model('Salesorder');
        
                // Attempt to delete sales order
                if ($salesorderModel->delete_salesorder($order_id)) {
                    // Deletion successful
                    // You can set a success message here if needed
                    echo ('Deleted successfully');
                } else {
                    // Deletion failed
                    echo 'Failed to delete sales order';
                }
            } else {
                // If not a POST request or no ID provided, show error message
                echo 'Invalid request';
            }
        }
        
    
        public function productSelection() {
   
            $this->view("ccm/product_selection");
        }
    
        public function getPurchaseIdByOrderId($order_id) {
            $this->db->query('SELECT purchase_id FROM salesorder WHERE order_id = :order_id');
            $this->db->bind(':order_id', $order_id);
            $row = $this->db->single();
            return $row ? $row['purchase_id'] : null;
        }
        

        public function add_salesordercommon(){
            // Check if it's a POST request
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Load the Salesorder model

                
                $this->model("Salesorder");
                $salesorderModel = new Salesorder();
                
                // Sanitize and validate POST data
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $date= isset($_POST['date']) ? trim($_POST['date']) : ''; 
                $address = trim($_POST['address']);
                $user_id = trim($_POST['user_id']);
                $image = trim($_POST['image']);


            
                // Check for required fields
                if (empty($name) || empty($type) || empty($quantity) || empty($date) || empty($address)  ) {
                    echo "Please fill in all fields.";
                    return;
                }
            
                // Attempt to add product
                $data = [
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'date' => $date,
                    'address' => $address,
                    'user_id' => $user_id,
                    'image' => $image

                ];

                if ($salesorderModel->add_salesordercommon($data)) {
                    // Assuming you have the user session stored in $_SESSION['user_id']
                     $user_id = $_SESSION['user_id'];

// Redirect to the place_salesorder route with both purchase_id and user_id
                    redirect('farmer/salesorder' . '?user_id=' . $user_id);

                   
                    exit();
                
                
                } else {
                    // Product addition failed
                    echo "Failed to add sales order.";
                }
            } else {
                // If not a POST request, load the add sales order page with the purchase_id
              
                
                // Load the add sales order view with the purchase_id if it exists
                $this->view("farmer/add_salesordercommon");
            }
        }
        
    }

