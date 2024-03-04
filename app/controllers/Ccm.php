<?php
    class Ccm extends Controller{


        public $adminModel;

        public function __construct() {
            
            $this->adminModel = $this->model('Admins'); 
        }
    
        public function index(){
            $data = [
                'title' => ''
            ];
            $this->view("ccm/product_selection");
            
        }

        public function ccm_login()
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
        
                            $this->view('ccm/ccm_login', $data);
                        }
        
        
                    } else {
                        // Load view with errors
                        $this->view('ccm/ccm_login', $data);
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
                    $this->view('ccm/ccm_login', $data);
                
            }
            
           
        }

        public function createUserSession($admin_user) {
            $_SESSION['admin_id'] = $admin_user->admin_id;
            $_SESSION['admin_username'] = $admin_user->admin_username;
            // No need to store admin name and email if they are not present in the table
            redirect('ccm/dashboard');
        }
        



        public function dashboard(){
            $data = [];

            $this->view('ccm/dashboard', $data);
        }

        public function view_inventory(){
            // Instantiate Product Model
            $productModel = new Product();
            
            // Get all products
            $data['products'] = $productModel->getAllProducts();
            
            // Load the view with products data
            $this->view('ccm/view_inventory', $data);
        }
        

        public function Purchaseorder() {
            // Instantiate Purchaseorder Model
            $purchaseorderModel = new Purchaseorder();
            
            // Get all purchase orders
            $data['purchaseorders'] = $purchaseorderModel->getAllPurchaseorders();
            
            // Load the view with purchase orders data
            $this->view('ccm/purchaseorder', $data);
        }
        
        
        public function add_product(){
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->model("product");
        
                // Instantiate Product Model with Database dependency injection
                $productModel = new Product();
        
                // Sanitize and validate POST data
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $price = trim($_POST['price']);
        
                // Check for required fields
                if (empty($name) || empty($type) || empty($quantity) || empty($price)) {
                    echo "Please fill in all fields.";
                    return;
                }
        
                // Check if the product with the given name already exists
                if ($productModel->findProductByName($name)) {
                    echo "Product with this name already exists.";
                    $this->view("ccm/add_product");
                    return;
                }
        
                // Attempt to add product
                $data = [
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'price' => $price
                ];
        
                if ($productModel->add_product($data)) {
                    // Product added successfully
                    // Redirect to view inventory page
                    redirect('ccm/view_inventory');
                    exit();
                } else {
                    // Product addition failed
                    echo "Failed to add product.";
                }
            } else {
                // If not a POST request, redirect to the add product page or show an error message
                // echo "Invalid request method.";
                $this->view("ccm/add_product");
            }
        }
        
        public function edit_product(){
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Instantiate Product Model with Database dependency injection
                $productModel = new Product();
        
                // Sanitize and validate POST data
                // $id = $_POST['id']; // Assuming the id of the product to edit is passed via POST
                $id = trim($_GET["id"]); 
                print_r(trim($_POST['name'])."</br>");
                print_r(trim($_POST['type'])."</br>");
                print_r(trim($_POST['price'])."</br>");
                print_r(trim($_POST['quantity'])."</br>");
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $price = trim($_POST['price']);
        
                // Check for required fields
                if (empty($name) || empty($type) || empty($quantity) || empty($price)) {
                    echo "Please fill in all fields.";
                    return;
                }
        
                // Attempt to edit product
                $data = [
                    'id' => $id,
                    'name' => $name,
                    'type' => $type,
                    'quantity' => $quantity,
                    'price' => $price
                ];
        
                if ($productModel->edit_product($data)) {
                    // Product edited successfully
                    // Redirect to view inventory page or display success message
                    redirect('ccm/view_inventory');
                    exit();
                } else {
                    // Product editing failed
                    echo "Failed to edit product.";
                }
            } else {
                // If not a POST request, redirect to the edit product page or show an error message
                $id = $_GET['id'];
                $productModel = new Product();
                $productData = $productModel->view_product($id);
                
                $this->view("ccm/edit_product",(array)$productData);
            }
        }
        
        

        public function delete_product(){
            // Check for POST
            if ($_GET['id']!=NULL) {
                
                // Instantiate Product Model with Database dependency injection
                $productModel = new Product();
        
                // Sanitize and validate POST data
                $id = $_GET['id']; // Assuming the id of the product to delete is passed via POST
                // // Check if id is provided
                // if (empty($id)) {
                //     echo "Please provide product ID.";
                //     return;
                // }

                // Attempt to delete product
                if ($productModel->delete_product($id)) {
                    // Product deleted successfully
                    // Redirect to view inventory page or display success message
                    redirect('ccm/view_inventory');
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

        


    public function displayProducts() {
        // Create an instance of the ProductModel
        $productModel = new ProductModel();

        // Call the method to fetch all products
        $products = $productModel->getAllProducts();

        // Pass the fetched products to the view
        require_once('views/ccm/view_inventory');
    }

    public function displayPurchaseorders() {
        // Create an instance of the PurchaseModel
        $purchaseorderModel = new PurchaseorderModel();

        // Call the method to fetch all products
        $purchaseorders = $purchaseorderModel->getAllPurchaseorders();

        // Pass the fetched products to the view
        require_once('views/ccm/purchaseorder');
    }


    public function add_purchaseorder(){
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model("Purchaseorder");

            // Instantiate Product Model with Database dependency injection
            $purchaseorderModel = new Purchaseorder();
    
            // Sanitize and validate POST data
            $name = trim($_POST['name']);
            $type = trim($_POST['type']);
            $quantity = trim($_POST['quantity']);
            $date= isset($_POST['date']) ? trim($_POST['date']) : ''; 
    
            // Check for required fields
            if (empty($name) || empty($type) || empty($quantity) || empty($date)) {
                echo "Please fill in all fields.";
                return;
            }
    
            // Attempt to add product
            $data = [
                'name' => $name,
                'type' => $type,
                'quantity' => $quantity,
                'date' => $date
            ];
    
            if ($purchaseorderModel->add_purchaseorder($data)) {
                // Product added successfully
                // Redirect to view inventory page
                redirect('ccm/purchaseorder');
                exit();
            } else {
                // Product addition failed
                echo "Failed to add purchase order.";
            }
        } else {
            // If not a POST request, redirect to the add product page or show an error message
             //echo "Invalid request method.";
            $this->view("ccm/add_purchaseorder");
        }
    }

    
    public function edit_purchaseorder(){
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Instantiate Product Model with Database dependency injection
            $purchaseorderModel = new Purchaseorder();
    
            // Sanitize and validate POST data
            // $id = $_POST['id']; // Assuming the id of the product to edit is passed via POST
            $id = trim($_GET["id"]); 
            print_r(trim($_POST['name'])."</br>");
            print_r(trim($_POST['type'])."</br>");
            print_r(trim($_POST['date'])."</br>");
            print_r(trim($_POST['quantity'])."</br>");
            $name = trim($_POST['name']);
            $type = trim($_POST['type']);
            $quantity = trim($_POST['quantity']);
            $date = trim($_POST['date']);
    
            // Check for required fields
            if (empty($name) || empty($type) || empty($quantity) || empty($date)) {
                echo "Please fill in all fields.";
                return;
            }
    
            // Attempt to edit product
            $data = [
                'id' => $id,
                'name' => $name,
                'type' => $type,
                'quantity' => $quantity,
                'date' => $date
            ];
    
            if ($purchaseorderModel->edit_purchaseorder($data)) {
                // Product edited successfully
                // Redirect to view inventory page or display success message
                redirect('ccm/purchaseorder');
                exit();
            } else {
                // Product editing failed
                echo "Failed to edit purchaseorder.";
            }
        } else {
            // If not a POST request, redirect to the edit product page or show an error message
            $id = $_GET['id'];
            $purchaseorderModel = new Purchaseorder();
            $purchaseorderData = $purchaseorderModel->view_purchaseorder($id);
            
            $this->view("ccm/edit_purchaseorder",(array)$purchaseorderData);
        }
    }
    
    
    public function delete_purchaseorder(){
        // Check for POST
        if ($_GET['id']!=NULL) {
            
            // Instantiate Product Model with Database dependency injection
            $purchaseorderModel = new Purchaseorder();
    
            // Sanitize and validate POST data
            $id = $_GET['id']; // Assuming the id of the product to delete is passed via POST
            // // Check if id is provided
            // if (empty($id)) {
            //     echo "Please provide product ID.";
            //     return;
            // }

            // Attempt to delete product
            if ($purchaseorderModel->delete_purchaseorder($id)) {
                // Product deleted successfully
                // Redirect to view inventory page or display success message
                redirect('ccm/purchaseorder');
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

    public function place_salesorder($purchase_id) {
        // Instantiate Purchaseorder Model
        $purchaseorderModel = $this->model('Purchaseorder');
        
        // Get the selected purchase order
        $data['purchaseorder'] = $purchaseorderModel->getPurchaseorderById($purchase_id);
    
        // Set status for the purchase order (assuming you have a getStatus method in your model)
        $data['purchaseorder']->status = $purchaseorderModel->getStatus($purchase_id);
    
        // Instantiate Salesorder Model
        $salesorderModel = $this->model('Salesorder');
        
        // Get relevant sales orders for the selected purchase order
        $data['salesorders'] = $salesorderModel->getSalesordersByPurchaseId($purchase_id);
        
        // Load the view with purchase order and sales orders data
        $this->view('ccm/place_salesorder', $data);
    }
    
// Inside Ccm controller class

public function updateStatus() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $purchaseId = $data['purchase_id'];
        $newStatus = $data['status'];

        // Instantiate Purchaseorder Model
        $purchaseorderModel = $this->model('Purchaseorder');

        // Update status in the database
        if ($purchaseorderModel->updateStatus($purchaseId, $newStatus)) {
            echo json_encode(['message' => 'Status updated successfully']);
        } else {
            echo json_encode(['error' => 'Failed to update status']);
        }
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
}

public function displayReportGenerator() {
    // Load the report generator view
    $this->view("ccm/report_generator");
}


    // controllers/Ccm.php

public function displayInventoryHistoryReport() {
    // Check for POST request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the start date and end date from the form submission
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        
        // Load the InventoryHistory model
        $inventoryHistoryModel = $this->model('InventoryHistory');
        
        // Fetch inventory history report for the given time period
        $inventoryHistory = $inventoryHistoryModel->getInventoryHistoryByDateRange($startDate, $endDate);
        
        // Pass the inventory history data to the view
        $data = [
            'inventory_history' => $inventoryHistory
        ];

        // Load the inventory history report view within the iframe
        $this->view("ccm/inventory_history_report", $data);
    } else {
        // If not a POST request, redirect to the report generator page or show an error message
        redirect('ccm/displayReportGenerator');
    }
}

public function productSelection() {
   
    $this->view("ccm/product_selection");
}


}
?>



