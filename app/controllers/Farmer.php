<?php

require_once __DIR__ . '/../../vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    class Farmer extends Controller{
        public $userModel;

        public function __construct(){
            $this->userModel = $this->model('User');
        }
        
        public function index(){
            $data = [
                'title' => ''
            ];
            
            $this->view('farmer/dashboard', $data);
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

        public function forgotPassword() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
    
                // Check if the email exists in the database
                $user = $this->userModel->findUserByEmail($email);
                if ($user) {
                    // Generate a unique token for password reset
                    $token = bin2hex(random_bytes(32));
    
                    // Update the user's token and token expiration time in the database
                    $userId = $user->id;
                    if ($this->userModel->updateResetToken($userId, $token)) {
                        // Send the password reset email
                        $subject = 'Password Reset Link';
                        $body = 'Click on the following link to reset your password: ' . URLROOT . '/farmer/resetPassword/' . $token;
    
                        // Create a PHPMailer instance
                        $mail = new PHPMailer(true);
    
                        try {
                            // Server settings
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.example.com'; // SMTP server
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'your@example.com'; // SMTP username
                            $mail->Password   = 'your_password';   // SMTP password
                            $mail->SMTPSecure = 'tls';
                            $mail->Port       = 587;
    
                            // Recipients
                            $mail->setFrom('your@example.com', 'Your Name');
                            $mail->addAddress($email); // Add a recipient
    
                            // Content
                            $mail->isHTML(true);
                            $mail->Subject = $subject;
                            $mail->Body    = $body;
    
                            $mail->send();
                            
                            // Redirect to a success page or display a message
                            flash('forgot_password_success', 'Password reset link has been sent to your email.');
                            redirect('farmer/forgotPassword');
                        } catch (Exception $e) {
                            die('Email sending failed: ' . $mail->ErrorInfo);
                        }
                    } else {
                        die('Token update failed.');
                    }
                } else {
                    // Email not found
                    flash('forgot_password_error', 'Email not found.');
                    redirect('farmer/forgotPassword');
                }
            } else {
                $this->view('farmer/forgotPassword');
            }
        }

        
        public function update_profile(){
            $data = [
                'username' => $_SESSION['user_username'],
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email'],
                'mobile' => $_SESSION['user_mobile'],
                'password' => isset($_SESSION['user_password']) ? $_SESSION['user_password'] : '',
                'confirm_password' => isset($_SESSION['user_password']) ? $_SESSION['user_password'] : '',
            
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
                redirect('users/user_login');
            } else {
                die('Something went wrong');
            }
        }

        public function changePassword($id) {
            // Initialize the variable outside the if-else blocks
            $data = [
                'id' => $id,
                'current_password' => '',
                'new_password' => '',
                'confirm_new_password' => '',
                'new_password_err' => ''
            ];
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                // Set the form data to the $data array
                $data['current_password'] = trim($_POST['current_password']);
                $data['new_password'] = trim($_POST['new_password']);
                $data['confirm_new_password'] = isset($_POST['confirm_new_password']) ? trim($_POST['confirm_new_password']) : '';
        
                // Validate new password
                if (empty($data['current_password']) || empty($data['new_password']) || empty($data['confirm_new_password'])) {
                    $data['new_password_err'] = 'All fields must be filled';
                } elseif (strlen($data['new_password']) < 6) {
                    $data['new_password_err'] = 'Password must be at least 6 characters';
                } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $data['new_password'])) {
                    $data['new_password_err'] = 'Password must contain at least one uppercase letter, one lowercase letter, and one number';
                } elseif ($data['new_password'] !== $data['confirm_new_password']) {
                    $data['new_password_err'] = 'New password and confirm new password do not match';
                }
        
                if (empty($data['new_password_err'])) {
                    // Get the current password from the database
                    $current_password = $this->userModel->getPasswordById($id);
        
                    // Check if the entered current password matches the one in the database
                    if ($current_password !== false && password_verify($data['current_password'], $current_password)) {
                        // The current password is correct
                        // Hash the new password
                        $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
        
                        // Update the password in the database
                        if ($this->userModel->changePassword($data)) {
                            // Password changed successfully
                            flash('user_message', 'Password changed successfully');
                            redirect('farmer/update_profile');
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // The current password is incorrect
                        $data['new_password_err'] = 'Current password is incorrect';
                        $this->view('farmer/update_profile', $data);
                    }
                } else {
                    // Load the view with errors
                    $this->view('farmer/update_profile', $data);
                }
            } else {
                // Load the form view if it's not a POST request
                $this->view('farmer/update_profile', $data);
            }
        }




        public function updateUsername($user_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                $data = [
                    
                    'new_username' => isset($_POST['new_username']) ? trim($_POST['new_username']) : '',
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
                        $data['new_username_err'] = 'Username updated successfully';
                        // flash('user_message', 'Username updated successfully');
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
                    
                    'new_name' => isset($_POST['new_name']) ? trim($_POST['new_name']) : '',
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

        public function updateEmail($user_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                $data = [
                    'new_email' => isset($_POST['new_email']) ? trim($_POST['new_email']) : '',
                    'new_email_err' => ''
                ];
        
                // Validate new email
                if (empty($data['new_email'])) {
                    $data['new_email_err'] = 'Please enter a new email';
                } elseif (!filter_var($data['new_email'], FILTER_VALIDATE_EMAIL)) {
                    $data['new_email_err'] = 'Invalid email format';
                }
        
                if (empty($data['new_email_err'])) {
                    // Update email in the database
                    // After successful update in the database
                    if ($this->userModel->updateEmail($user_id, $data['new_email'])) {
                        // Update the session variable immediately
                        $_SESSION['user_email'] = $data['new_email'];
                        flash('user_message', 'Email updated successfully');
                        redirect('farmer/update_profile');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('farmer/update_profile', $data);
                }
            } else {
                $data = [
                    'new_email' => '',
                    'new_email_err' => ''
                ];
                $this->view('farmer/update_profile', $data);
            }
        }

        public function updateMobile($user_id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                $data = [
                    'new_mobile' => isset($_POST['new_mobile']) ? trim($_POST['new_mobile']) : '',
                    'new_mobile_err' => ''
                ];
        
                // Validate new mobile number
                if (empty($data['new_mobile'])) {
                    $data['new_mobile_err'] = 'Please enter a new mobile number';
                } elseif (!preg_match('/^[0-9]{10}$/', $data['new_mobile'])) {
                    $data['new_mobile_err'] = 'Invalid mobile number format';
                }
        
                if (empty($data['new_mobile_err'])) {
                    // Update mobile number in the database
                    // After successful update in the database
                    if ($this->userModel->updateMobile($user_id, $data['new_mobile'])) {
                        // Update the session variable immediately
                        $_SESSION['user_mobile'] = $data['new_mobile'];
                        flash('user_message', 'Mobile number updated successfully');
                        redirect('farmer/update_profile');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('farmer/update_profile', $data);
                }
            } else {
                $data = [
                    'new_mobile' => '',
                    'new_mobile_err' => ''
                ];
                $this->view('farmer/update_profile', $data);
            }
        }

        public function logout() {
            // Unset all of the session variables
            $_SESSION = array();
          
            // Destroy the session.
            session_destroy();
          
            // Set a short session expiration time (e.g., 5 minutes) for future sessions
            ini_set('session.cookie_lifetime', 5 ); // Adjust as needed
          
            // Redirect to the index page
            redirect('user/user_login');
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
                    'address' => trim($_POST['address']),
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
        
          
        public function table_salesorder() {
            // Retrieve the user ID from the session
            $user_id = $_SESSION['user_id']; // Adjust this according to your session implementation
            
            // Instantiate Salesorder Model
            $salesorderModel = new Salesorder();
            
            // Get sales orders for the current user with purchase_id as null
            $data['salesorders'] = $salesorderModel->getSalesordersByUserIdAndPurchaseId($user_id, null);
            
            // Load the view with sales orders data
            $this->view('farmer/table_salesorder', $data);
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
            // Load the Salesorder model

            $userModel = $this->Model('User');
            $address = $userModel->getCollectionCenterAddress($_SESSION['user_id']);

            $this->model("Salesorder");
            $salesorderModel = new Salesorder();
            
            // Check if it's a POST request
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize and validate POST data
                // Code for handling POST data...
                
                // Initialize the $data array
                $data = [
                    'purchase_id' => $_POST['purchase_id'] ?? null,
                    'user_id' => $_POST['user_id'] ?? null,
                    'name' => $_POST['name'] ?? null,
                    'type' => $_POST['type'] ?? null,
                    'quantity' => $_POST['quantity'] ?? null,
                    'price' => $_POST['price'] ?? null,
                    'status' => $_POST['status'] ?? null,
                    'date' => $_POST['date'] ?? null,
                    'address' => $_POST['address'] ?? null,
                    'image' => isset($_POST['image']) ? $_POST['image'] : null, // Use submitted image if available
                  ];
                  
                  // Basic validation
                  if (empty($data['purchase_id']) || empty($data['name']) || empty($data['type']) || empty($data['quantity']) || empty($data['price']) || empty($data['date']) || empty($data['address'])) {
                    echo "Please fill in all required fields.";
                    return; // Exit if validation fails
                  }
                  
        
                if ($salesorderModel->add_salesorder($data)) {
                    // Redirect to the place_salesorder route with both purchase_id and user_id
                    $purchase_id = $data['purchase_id'];
                    $user_id = $data['user_id'];
                    redirect('farmer/place_salesorder/' . $purchase_id . '?user_id=' . $user_id);
                    exit();
                } else {
                    // Product addition failed
                    echo "Failed to add sales order.";
                }
            } else {
                // If not a POST request, load the add sales order page with the purchase_id
                $purchase_id = $_GET['purchase_id'] ?? null;
                $user_id = $_GET['user_id'] ?? null;
                
                // Fetch product details using purchase ID
                $product_name = $product_image = null;
                if ($purchase_id) {
                    // Load the Purchaseorder model
                    $this->model("Purchaseorder");
                    $purchaseorderModel = new Purchaseorder();
        
                    // Get product details using purchase ID
                    $product_details = $purchaseorderModel->getProductDetails($purchase_id);
        
                    // Extract product name and image from the result
                    $product_name = $product_details['name'];
                    $product_image = $product_details['image'];
                }
        
                // Load the add sales order view with the purchase_id, user_id, product_name, and product_image
                $data = [
                    'purchase_id' => $purchase_id,
                    'user_id' => $user_id,
                    'name' => $product_name, // Pass the retrieved product name
                    'image' => $product_image, // Pass the retrieved product image
                    'address' => $address

                ];
                $this->view("farmer/add_salesorder", $data);
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
                print_r(trim($_POST['price'])."</br>");
                print_r(trim($_POST['address'])."</br>");
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $price = trim($_POST['price']);
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
                    'price' => $price,
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
                $price = trim($_POST['price']);
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
                    'price' => $price,
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
                // Load the User model to get the collection center address
                $userModel = $this->model('User');
        
                // Get the collection center address for the logged-in user
                $address = $userModel->getCollectionCenterAddress($_SESSION['user_id']);
        
                // Data to be passed to the view
                $data = [
                    'address' => $address
                    // Add other data for the view
                ];
        
                $this->view("farmer/add_salesordercommon", $data);
            }
        }
        

        public function edit_salesordercommon(){
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Instantiate Product Model with Database dependency injection
                $salesorderModel = new Salesorder();
        
                // Sanitize and validate POST data
                $order_id = trim($_POST["order_id"]); 
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $price = trim($_POST['price']);
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
                    'price' => $price,
                    'date' => $date,
                    'address' => $address
                ];
        
                if ($salesorderModel->edit_salesorder($data)) {
                    // Product edited successfully
                    // Redirect to salesorder page with the user id
                    $userId = $_GET['user_id'] ?? null;
                    if ($userId) {
                        redirect('farmer/salesorder/' . $userId);
                    } else {
                        // If user id is not provided, redirect to some default page
                        redirect('farmer/dashboard');
                    }
                } else {
                    // Product editing failed
                    echo "Failed to edit salesorder.";
                }
            } else {
                // If not a POST request, redirect to the edit product page or show an error message
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $salesorderModel = new Salesorder();
                    $salesorderData = $salesorderModel->view_salesorder($id);
                    $this->view("farmer/edit_salesordercommon", (array)$salesorderData);
                } else {
                    // If order id is not provided, redirect to some default page
                    redirect('farmer/dashboard');
                }
            }
        }
        

        public function marketdemand() {
            // Instantiate the Product model
            $priceModel = $this->model('Price');
            
            // Get product data from the model
            $prices = $priceModel->getAllPrices();
            
            // Check if products are retrieved successfully
            if ($prices) {
                // Load the view file and pass the product data
                $data['prices'] = $prices;
                
                $this->view('farmer/marketdemand', $data);
            } else {
                // Handle case where no products are returned or an error occurs
                // For example, you can return an error message as JSON
                header('Content-Type: application/json');
                echo (['error' => 'No products found']);
            }
    }
    

        public function view_price(){
            // Instantiate Product Model
            $priceModel = new Price();
            
            // Get all products
            $data['prices'] = $priceModel->getAllPrices();
            
            // Load the view with products data
            $this->view('farmer/view_price', $data);
        }
        

        public function add_inquiry() {
            $userModel = $this->model('User');
        
            // Get user ID from session or wherever it's stored
            $user_id = $_SESSION['user_id'];
        
            // Get user data using the model method
            $user_data = $userModel->getUserDataById($user_id);
        
            // Pass the user data to the view
            $data = [
                'user_data' => $user_data
            ];
        
            $this->view('farmer/inquiry', $data);
        }
        
        

        public function sendInquiry() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                // Instantiate Inquiry model
                $inquiryModel = $this->model('Inquiry');
    
                // Get form data
                $data = [
                    'user_id' => $_POST['user_id'],
                    'username' => $_POST['username'],
                    'contact_no' => $_POST['contact_no'],
                    'email' => $_POST['email'],
                    'inquiry' => $_POST['inquiry']
                ];
    
                // Store the inquiry in the database
                if ($inquiryModel->storeInquiry($data)) {
                    // Inquiry stored successfully
                    // Redirect to a success page or display a success message
                    redirect('farmer/inquiry');
                } else {
                    // Error occurred while storing the inquiry
                    // Redirect to an error page or display an error message
                    redirect('farmer/inquiry');
                }
            } else {
                // If the request method is not POST, redirect to the inquiry form
                redirect('farmer/inquiry');
            }
        }


        // Farmer controller method to retrieve inquiries
// Farmer controller method to retrieve inquiries of the current user
public function inquiry() {
    // Load the Inquiry model
    $inquiryModel = $this->model('Inquiry');

    // Get user ID from session
    $user_id = $_SESSION['user_id'];

    // Get user data using the model method
    $userModel = $this->model('User');
    $user_data = $userModel->getUserDataById($user_id);

    // Get inquiries of the current user from the database
    $inquiries = $inquiryModel->getUserInquiries($user_id);

    // Pass the inquiries data to the view
    $data = [
        'inquiries' => $inquiries,
        'user_data' => $user_data
    ];

    // Load the 'farmer/inquiry' view and pass data to it
    $this->view('farmer/inquiry', $data);
}

    }

    

