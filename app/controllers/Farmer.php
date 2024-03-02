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
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'product_id' => trim($_POST['product_id']),
                    'quantity' => trim($_POST['quantity']),
                    'startdate' => trim($_POST['startdate']),
                    'enddate' => trim($_POST['enddate']),
                    'notes' => trim($_POST['notes']),
                    'user_id' => $_SESSION['user_id']
                ];

                $data['errors'] = [
                    'product_err' => '',
                    'quantity_err' => '',
                    'startdate_err' => '',
                    'enddate_err' => ''
                ];

                $data['errors']['errnum'] = 0;

                if (empty($data['product_id'])){
                    $data['errors']['errnum'] =+ 1;
                    $data['errors']['product_err'] = 'Please select a product';
                }

                if (empty($data['quantity'])){
                    $data['errors']['errnum'] =+ 1;
                    $data['errors']['quantity_err'] = 'Please provide a quantity';
                }

                if (empty($data['startdate'])){
                    $data['errors']['errnum'] =+ 1;
                    $data['errors']['startdate_err'] = 'Please provide a Date';
                }

                if (empty($data['enddate'])){
                    $data['errors']['errnum'] =+ 1;
                    $data['errors']['enddate_err'] = 'Please provide a Date';
                }

                if ($data['startdate'] > $data['enddate']){
                    $data['errors']['errnum'] =+ 1;
                    $data['errors']['startdate_err'] = 'Earliest Pickup cannot be after the Latest Pickup';
                    $data['errors']['enddate_err'] = 'Latest Pickup cannot be before the Earliest Pickup';
                }

                if ($data['errors']['errnum'] > 0){
                    $product = $this->model('Product');
    
                    $products = $product->getAllProducts();
                    
                    $data['products'] = $products;
                    
                    $this->view('farmer/place_order', $data);
                } else {
                    if ($request->insert($data)) {
                        redirect('farmer/place_order');
                    } else {
                        die('Something went wrong');
                    }
                }

            } else {
                $data = [
                    'title' => 'Place Order'
                ];

                $data['errors'] = [
                    'product_err' => '',
                    'quantity_err' => '',
                    'startdate_err' => '',
                    'enddate_err' => ''
                ];
    
                $product = $this->model('Product');
    
                $products = $product->getAllProducts();
                
                $data['products'] = $products;
                
                $this->view('farmer/place_order', $data);
            }
        }


        public function salesorder() {
            // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();
            
            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesorders();
            
            // Load the view with purchase orders data
            $this->view('farmer/salesorder', $data);
        }
        

        public function place_salesorder($purchase_id) {
            // Instantiate Purchaseorder Model
            $purchaseorderModel = $this->model('Purchaseorder');
            
            // Get the selected purchase order
            $data['purchaseorder'] = $purchaseorderModel->getPurchaseorderById($purchase_id);
            
            // Instantiate Salesorder Model
            $salesorderModel = $this->model('Salesorder');
            
            // Get relevant sales orders for the selected purchase order
            $data['salesorders'] = $salesorderModel->getSalesordersByPurchaseId($purchase_id);
            
            // Load the view with purchase order and sales orders data
            $this->view('farmer/place_salesorder', $data);
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




        public function add_salesorder(){
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->model("Salesorder");
    
                // Instantiate Product Model with Database dependency injection
                $salesorderModel = new Salesorder();
        
                // Sanitize and validate POST data
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $date= isset($_POST['date']) ? trim($_POST['date']) : ''; 
                $address = trim($_POST['address']);
        
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
                    'address' => $address
                ];
        
                if ($salesorderModel->add_salesorder($data)) {
                    // Product added successfully
                    // Redirect to view inventory page
                    redirect('farmer/salesorder');
                    exit();
                } else {
                    // Product addition failed
                    echo "Failed to add sales order.";
                }
            } else {
                // If not a POST request, redirect to the add product page or show an error message
                 //echo "Invalid request method.";
                $this->view("farmer/add_salesorder");
            }
        }
    
        
        public function edit_salesorder(){
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Instantiate Product Model with Database dependency injection
                $salesorderModel = new Salesorder();
        
                // Sanitize and validate POST data
                // $id = $_POST['id']; // Assuming the id of the product to edit is passed via POST
                $id = trim($_GET["id"]); 
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
                    'id' => $id,
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'date' => $date,
                    'address' => $address
                ];
        
                if ($salesorderModel->edit_salesorder($data)) {
                    // Product edited successfully
                    // Redirect to view inventory page or display success message
                    redirect('farmer/salesorder');
                    exit();
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
            if ($_GET['id']!=NULL) {
                
                // Instantiate Product Model with Database dependency injection
                $salesorderModel = new Salesorder();
        
                // Sanitize and validate POST data
                $id = $_GET['id']; // Assuming the id of the product to delete is passed via POST
                // // Check if id is provided
                // if (empty($id)) {
                //     echo "Please provide product ID.";
                //     return;
                // }
    
                // Attempt to delete product
                if ($salesorderModel->delete_salesorder($id)) {
                    // Product deleted successfully
                    // Redirect to view inventory page or display success message
                    redirect('farmer/salesorder');
                    exit();
                } else {
                    // Product deletion failed
                    echo "Failed to delete product.";
                }
            } else {
                // If not a POST request, redirect to the view inventory page or show an error message
                echo "Invalid request method.";
            }
        }
    
        
    
    
    }

