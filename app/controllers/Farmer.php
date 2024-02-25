<?php
    class Farmer extends Controller{
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
                'name' => $_SESSION['user_name'],
                'username' => $_SESSION['user_username'],
                'email' => $_SESSION['user_email'],
                'nic' => $_SESSION['user_nic'],
                'mobile' => $_SESSION['user_mobile'],
                // 'password' => $_SESSION['user_password'],

            ];

            if(isset($_POST['update_profile'])){
                $data['name'] = $_POST['name'];
                $data['username'] = $_POST['username'];
                $data['email'] = $_POST['email'];
                $data['nic'] = $_POST['nic'];
                $data['mobile'] = $_POST['mobile'];
                $data['password'] = $_POST['password'];
                
                // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }else{
                // //check email
                // if($this->farmerModel->findUserByEmail($data['email'])){
                //     $data['email_err'] = 'Email already exist';
                // }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            // Validate Username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }
            // Validate NIC
            if (empty($data['nic'])) {
                $data['nic_err'] = 'Please enter NIC';
            }
            // Validate Mobile
            if (empty($data['mobile'])) {
                $data['mobile_err'] = 'Please enter mobile';
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['username_err']) && empty($data['nic_err']) && empty($data['mobile_err']) && empty($data['password_err']) && empty($data['cpassword_err'])) {
                // Validated
                

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'Successfully Updated! ');
                    redirect('users/user_login');
                } else {
                    die('Something went wrong');
                }


            } else {
                // Load view with errors
                $this->view('farmer/update_profile', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'username' => '',
                'email' => '',
                'nic' => '',
                'mobile' => '',
                'password' => '',
                'cpassword' => '',
                'name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'nic_err' => '',
                'mobile_err' => '',
                'password_err' => '',
                'cpassword_err' => ''
            ];

            // Load view
            $this->view('farmer/update_profile', $data);

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

        public function displaySalesorders() {
            // Create an instance of the PurchaseModel
            $salesorderModel = new SalesorderModel();
    
            // Call the method to fetch all products
            $salesorders = $salesorderModel->getAllSalesorders();
    
            // Pass the fetched products to the view
            require_once('views/farmer/salesorder');
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

?>
