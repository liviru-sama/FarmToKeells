<?php


require_once __DIR__ . '/../../vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Ccm extends Controller {
    public $adminModel;
    public $ccmModel; // Fix the property name
    public $tmModel;



    public function __construct() {
        $this->userModel = $this->model('User');
        $this->ccmModel = $this->model('CcmModel'); // Instantiate the CcmModel
        $this->adminModel = $this->model('AdminModel'); // Instantiate the CcmModel
        $this->tmModel = $this->model('TmModel'); // Instantiate the CcmModel



    }
    

    public function viewProductPrices() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Load the view
        require APPROOT . '/views/ccm/productprices.php';
    }}
    
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
                if ($this->ccmModel->insertAdminCredentials($adminUsername, $hashedPassword, $email)) {
                    // Set success message
                    $success_message = "CCM credentials inserted successfully.</br> Now You can Login";
    
                    // Load the login view with success message
                    $this->view('ccm/ccm_login', ['success_message' => $success_message]);
                    exit;
                } else {
                    // Failed to insert admin credentials
                    // You can redirect to an error page or perform other actions
                    echo "Failed to insert admin credentials";
                }
            } else {
                // Load the registration form view with errors
                $this->view('ccm/ccm_register', ['errors' => $errors]);
            }
        } else {
            // If not a POST request, load the registration form
            $this->view('ccm/ccm_register');
        }
    }
    
    

    public function ccm_register() {
        // Load the view file
        $this->view('ccm/ccm_register');
    }
    
    
        


        public function validate_login($admin_username, $admin_password)
{
    $loggedInccm = $this->ccmModel->validateLogin($admin_username, $admin_password);
    if ($loggedInccm) {
        return $loggedInccm;
    }
    return false; // Invalid username or password
}

public function ccm_login()
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
            // Call the validate_login method in the ccm model with username and password
            $loggedInccm = $this->ccmModel->validateLogin($data['admin_username'], $data['admin_password']);
            if ($loggedInccm) {
                // Start session if not already started
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                // Create session variables
                $_SESSION['admin_id'] = $loggedInccm->admin_id; // Assuming the admin_id field name
                $_SESSION['admin_username'] = $loggedInccm->admin_username; // Assuming the admin_username field name

                // Redirect to ccm dashboard or any desired page
                redirect('ccm/dashboard');
                exit;
            } else {
                $data['admin_password_err'] = 'Incorrect username or password';
                $this->view('ccm/ccm_login', $data);
            }
        } else {
            // Load view with errors
            $this->view('ccm/ccm_login', $data);
        }
    } else {
        // Load view
        $this->view('ccm/ccm_login');
    }
}


        

        
     

        
public function isLoggedInccm() {
    if(isset($_SESSION['admin_id'])) {
        return true;
    } else {
        return false;
    }
}

public function index(){
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {
        $data = [
            'title' => ''
        ];
        $this->view('ccm/dashboard', $data);
    }
}

public function dashboard(){
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {
        $data = [];

    $this->view('ccm/dashboard', $data);
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
    redirect('ccm/ccm_login');
  }

  




     

        public function view_inventory(){
            if (!$this->isLoggedInccm()) {
                redirect('ccm/ccm_login');
            } else {// Instantiate Product Model
            $productModel = new Product();
            
            // Get all products
            $data['products'] = $productModel->getAllProducts();
            
            // Load the view with products data
            $this->view('ccm/view_inventory', $data);
        }}
        
        public function view_price(){
            if (!$this->isLoggedInccm()) {
                redirect('ccm/ccm_login');
            } else {// Instantiate Product Model
            $priceModel = new Price();
            
            // Get all products
            $data['prices'] = $priceModel->getAllPrices();
            
            // Load the view with products data
            $this->view('ccm/view_price', $data);
        }}
        
public function edit_price() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {// Check for POST request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Instantiate Product Model with Database dependency injection
        $priceModel = new Price();

        // Sanitize and validate POST data
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $price = trim($_POST['price'] ?? '');

        // Check for required fields
        if (empty($price)) {
            echo "Please fill in all fields.";
            return;
        }

        // Attempt to edit product
        $data = [
            'id' => $id,
            'price' => $price
        ];

        if ($priceModel->edit_price($data)) {
            // Product edited successfully
            // Redirect to view inventory page or display success message
            redirect('ccm/view_price');
            exit();
        } else {
            // Product editing failed
            echo "Failed to edit price.";
        }
    } else {
        // If not a POST request, redirect to the edit product page or show an error message
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $priceModel = new Price();
        $priceData = $priceModel->view_price($id);

        $this->view("ccm/edit_price", (array)$priceData);
    }
}}

        
        public function Purchaseorder() {
            if (!$this->isLoggedInccm()) {
                redirect('ccm/ccm_login');
            } else {// Instantiate Purchaseorder Model
            $purchaseorderModel = new Purchaseorder();
            
            // Get all purchase orders
            $data['purchaseorders'] = $purchaseorderModel->getAllPurchaseorders();
            
            // Load the view with purchase orders data
            $this->view('ccm/purchaseorder', $data);
        }}
        
        
        public function add_product(){
            if (!$this->isLoggedInccm()) {
                redirect('ccm/ccm_login');
            } else {// Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->model("product");
        
                // Instantiate Product Model with Database dependency injection
                $productModel = new Product();
        
                // Sanitize and validate POST data
                $name = trim($_POST['name']);
                $image = isset($_POST['image']) ? trim($_POST['image']) : ''; 
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
                    $error_message = "Product with this name already exists.";
                    $this->view("ccm/add_product", ['error_message' => $error_message]);
                    return;
                }
        
                // Attempt to add product
                $data = [
                    'name' => $name,
                    'image' => $image,
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
    }

        public function edit_product() {
            if (!$this->isLoggedInccm()) {
                redirect('ccm/ccm_login');
            } else {// Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Instantiate Product Model with Database dependency injection
                $productModel = new Product();
        
                // Sanitize and validate POST data
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
               
                $type = trim($_POST['type'] ?? '');
                $quantity = trim($_POST['quantity'] ?? '');
                $poor_quantity = trim($_POST['poor_quantity'] ?? '');

                $price = trim($_POST['price'] ?? '');
        
                // Check for required fields
                if ( empty($type) || empty($price)) {
                    echo "Please fill in all fields.";
                    return;
                }
        
                // Attempt to edit product
                $data = [
                    'id' => $id,
                    
                    'type' => $type,
                    'quantity' => $quantity,
                    'poor_quantity' => $poor_quantity,

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
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $productModel = new Product();
                $productData = $productModel->view_product($id);
                
                $this->view("ccm/edit_product", (array)$productData);
            }
        }
    }

    public function displayProducts() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Create an instance of the ProductModel
        $productModel = new ProductModel();

        // Call the method to fetch all products
        $products = $productModel->getAllProducts();

        // Pass the fetched products to the view
        require_once('views/ccm/view_inventory');
    }}

    public function displayPurchaseorders() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Create an instance of the PurchaseModel
        $purchaseorderModel = new PurchaseorderModel();

        // Call the method to fetch all products
        $purchaseorders = $purchaseorderModel->getAllPurchaseorders();

        // Pass the fetched products to the view
        require_once('views/ccm/purchaseorder');
    }}


    public function add_purchaseorder(){
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model("Purchaseorder");

            // Instantiate Product Model with Database dependency injection
            $purchaseorderModel = new Purchaseorder();
    
            // Sanitize and validate POST data
            $name = trim($_POST['name']);
            $type = trim($_POST['type']);
            $quantity = trim($_POST['quantity']);
            $date= isset($_POST['date']) ? trim($_POST['date']) : ''; 
            $image = isset($_POST['image']) ? trim($_POST['image']) : ''; 
    
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
                'date' => $date,
                'image' => $image
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
}
    
    public function edit_purchaseorder(){
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Check for POST
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
    }}
    
    public function delete_purchaseorder(){
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Check for POST
        if ($_GET['id'] != NULL) {
            
            // Instantiate Purchaseorder Model with Database dependency injection
            $purchaseorderModel = new Purchaseorder();
    
            // Sanitize and validate GET data
            $id = $_GET['id'];
    
            // Attempt to delete purchase order
            if ($purchaseorderModel->delete_purchaseorder($id)) {
                // Deletion successful
                header("Location: " . URLROOT . "/ccm/purchaseorder");
            exit(); // Ensure that no other output is sent
            } else {
                // Deletion failed
                $response = array(
                    'success' => false,
                    'message' => 'Failed to delete purchase order.'
                );
            }
        } else {
            // Invalid request
            $response = array(
                'success' => false,
                'message' => 'Invalid request method.'
            );
        }
    
        // Return JSON response
        echo json_encode($response);
    }}
    

    public function place_salesorder($purchase_id) {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate Purchaseorder Model
        $purchaseorderModel = $this->model('Purchaseorder');
        
        // Get the selected purchase order
        $data['purchaseorder'] = $purchaseorderModel->getPurchaseorderById($purchase_id);
    
        // Instantiate Salesorder Model
        $salesorderModel = $this->model('Salesorder');
        
        // Get relevant sales orders for the selected purchase order
        $data['salesorders'] = $salesorderModel->getSalesordersByPurchaseId($purchase_id);
        
        // Load the view with purchase order and sales orders data
        $this->view('ccm/place_salesorder', $data);
    }}
    
    

public function updateStatus() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the order IDs and statuses from the form for sales order
        $orderIds = $_POST['order_id'] ?? [];
        $statuses = $_POST['status'] ?? [];

        // Instantiate Salesorder Model
        $salesorderModel = $this->model('Salesorder');

        // Loop through each order and update its status for sales order
        foreach ($orderIds as $key => $orderId) {
            $newStatus = $statuses[$key];
            // Update status in the database
            if (!$salesorderModel->updateStatus($orderId, $newStatus)) {
                echo json_encode(['error' => 'Failed to update status']);
                return;
            }
        }

       

        echo json_encode('Status updated successfully');
    } else {
        echo json_encode('Invalid request method');
    }
}}

public function updatePurchaseStatus() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else { if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Retrieve the purchase order IDs and statuses from the form
      $purchaseOrderIds = $_POST['purchase_order_id'] ?? [];
      $purchaseStatuses = $_POST['purchase_status'] ?? [];
  
      // Loop through each purchase order and update its status
      foreach ($purchaseOrderIds as $key => $purchaseId) {
        $newPurchaseStatus = $purchaseStatuses[$key]; // Get status for this purchase order
        // Update purchase status in the database
        if (!$this->model('Purchaseorder')->updatePurchaseStatus($purchaseId, $newPurchaseStatus)) {
          echo json_encode(['error' => 'Failed to update purchase status']);
          return;
        }
      }
  
      echo json_encode('Purchase status updated successfully');
    } else {
      echo json_encode('Invalid request method');
    }
  }}
  
  





public function displayReportGenerator() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {// Load the report generator view
    $this->view("ccm/report_generator");
}}

public function displayReportGeneratorprice() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {// Load the report generator view
    $this->view("ccm/report_generatorprice");
}}


    // controllers/Ccm.php

    // controllers/Ccm.php

    public function displayInventoryHistoryReport() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else { // Check for POST request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the start date, end date, and product name from the form submission
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $productName = isset($_POST['product_name']) ? $_POST['product_name'] : null; // Check if product name is set
            
            // Load the InventoryHistory model
            $productHistoryModel = $this->model('productHistory');
            
            // Fetch inventory history report for the given time period and product name
            $productHistory = $productHistoryModel->getInventoryHistoryByDateRangeAndProductName($startDate, $endDate, $productName);
            
            // Filter inventory history to include only records with null price_change
            $filteredproductHistory = array_filter($productHistory, function($record) {
                return $record->price_change === null;
            });
            
            // Pass the filtered inventory history data and form inputs to the view
            $data = [
                'inventory_history' => $filteredproductHistory,
                'product_name' => $productName, // Add product name to data array
                'start_date' => $startDate, // Add start date to data array
                'end_date' => $endDate // Add end date to data array
            ];
    
            // Load the inventory history report view within the iframe
            $this->view("ccm/inventory_history_report", $data);
        } else {
            // If not a POST request, redirect to the report generator page or show an error message
            redirect('ccm/report_generator');
        }
    }}
    

    public function displayInventoryHistoryReportprice() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Check for POST request
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the start date, end date, and product name from the form submission
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $productName = isset($_POST['product_name']) ? $_POST['product_name'] : null; // Check if product name is set
            
            // Load the InventoryHistory model
            $productHistoryModel = $this->model('productHistory');
            
            // Fetch inventory history report for the given time period and product name
            $productHistory = $productHistoryModel->getInventoryHistoryByDateRangeAndProductNameprice($startDate, $endDate, $productName);
            
            // Filter inventory history to include only records with null price_change
            $filteredproductHistory = array_filter($productHistory, function($record) {
                return $record->quantity_change === null;
            });
            
            // Pass the filtered inventory history data and form inputs to the view
            $data = [
                'inventory_history' => $filteredproductHistory,
                'product_name' => $productName, // Add product name to data array
                'start_date' => $startDate, // Add start date to data array
                'end_date' => $endDate // Add end date to data array
            ];
    
            // Load the inventory history report view within the iframe
            $this->view("ccm/inventory_history_reportprice", $data);
        } else {
            // If not a POST request, redirect to the report generator page or show an error message
            redirect('ccm/report_generatorprice');
        }
    }}

    public function existingproduct(){
        // Instantiate Product Model
        $productModel = new Product();
        
        // Get all products
        $data['products'] = $productModel->getAllProducts();
        
        // Load the view with products data
        $this->view('ccm/existingproduct', $data);
    }
    
    

public function product_selection() {
   
    $this->view("ccm/product_selection");
}


// controllers/Ccm.php

// PurchaseOrdersController.php

public function confirmationDialog($purchaseId){
    // Load the confirmation dialog view passing the purchase ID
    $data = [
        'purchaseId' => $purchaseId
    ];
    $this->view('ccm/confirmationdialog', $data);
}



public function existingproductSelection() {
   
    $this->view("ccm/existingproductselection");
}




    // Get name and phone number of a user by ID
    public function getUserInfo($user_id) {
        return $this->userModel->getUserInfoById($user_id);
    }

    

      
    
    

    public function salesorder() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesorders();
        
        // Load the view with purchase orders data
        $this->view('ccm/salesorder', $data);
    }}

    public function salesorderpending() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesorderspending();
        
        // Load the view with purchase orders data
        $this->view('ccm/salesorderpending', $data);
    }}

    public function salesorderapproved() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesordersapproved();
        
        // Load the view with purchase orders data
        $this->view('ccm/salesorderapproved', $data);
    }}
    
    public function salesorderrejected() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesordersrejected();
        
        // Load the view with purchase orders data
        $this->view('ccm/salesorderrejected', $data);
    }}

    public function salesordercompleted() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesorderscompleted();
        
        // Load the view with purchase orders data
        $this->view('ccm/salesordercompleted', $data);
    }}
    

    public function stock_overview() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate the Product model
        $productModel = $this->model('Product');
        
        // Get product data from the model
        $products = $productModel->getAllProducts();
        
        // Check if products are retrieved successfully
        if ($products) {
            // Load the view file and pass the product data
            $data['products'] = $products;
            
            $this->view('ccm/stock_overview', $data);
        } else {
            // Handle case where no products are returned or an error occurs
            // For example, you can return an error message as JSON
            header('Content-Type: application/json');
            echo (['error' => 'No products found']);
        }
    }}

    public function stock_overviewbar() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate the Product model
        $productModel = $this->model('Product');
        
        // Get product data from the model
        $products = $productModel->getAllProducts();
        
        // Check if products are retrieved successfully
        if ($products) {
            // Load the view file and pass the product data
            $data['products'] = $products;
            
            $this->view('ccm/stock_overviewbar', $data);
        } else {
            // Handle case where no products are returned or an error occurs
            // For example, you can return an error message as JSON
            header('Content-Type: application/json');
            echo (['error' => 'No products found']);
        }

        
    }}

    public function marketdemand() {
        if (!$this->isLoggedInccm()) {
            redirect('ccm/ccm_login');
        } else {// Instantiate the Product model
        $priceModel = $this->model('Price');
        
        // Get product data from the model
        $prices = $priceModel->getAllPrices();
        
        // Check if products are retrieved successfully
        if ($prices) {
            // Load the view file and pass the product data
            $data['prices'] = $prices;
            
            $this->view('ccm/marketdemand', $data);
        } else {
            // Handle case where no products are returned or an error occurs
            // For example, you can return an error message as JSON
            header('Content-Type: application/json');
            echo (['error' => 'No products found']);
        }
}}








// CCM controller method to add a new chat message
public function addChat() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
}}



// Farmer controller method to retrieve inquiries
// Farmer controller method to retrieve inquiries of the current user
// Farmer controller method to retrieve inquiries
public function ccm_chat() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {// Load the Inquiry model
    $ccm_chatModel = $this->model('ccm_chat');

    // Get all chats from the database
    $ccm_chats = $ccm_chatModel->getAllChats();

    // Pass the chat data to the view
    $data = [
        'ccm_chats' => $ccm_chats,
    ];

    // Load the 'ccm/ccm_chat' view and pass data to it
    $this->view('ccm/ccm_chat', $data);
}}


public function Notifications() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {$notificationModel = $this->model('CcmNotifications');

    $notifications = $notificationModel->getAllNotifications();

   
    $data = [
        'notifications' => $notifications,
    ];

    // Load the 'farmer/inquiry' view and pass data to it
    $this->view('ccm/notifications', $data);
  }}
  

  public function salesorderqualityapproved() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else { // Instantiate Purchaseorder Model
    $salesorderModel = new Salesorder();
    
    // Get all purchase orders
    $data['salesorders'] = $salesorderModel->getAllSalesordersqualityapproved();
    
    // Load the view with purchase orders data
    $this->view('ccm/salesorderqualityapproved', $data);
}}

public function salesorderqualityrejected() {
    if (!$this->isLoggedInccm()) {
        redirect('ccm/ccm_login');
    } else {// Instantiate Purchaseorder Model
    $salesorderModel = new Salesorder();
    
    // Get all purchase orders
    $data['salesorders'] = $salesorderModel->getAllSalesordersqualityrejected();
    
    // Load the view with purchase orders data
    $this->view('ccm/salesorderqualityrejected', $data);
}
}
public function forgotPassword() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Handle form submission
        $email = $_POST['email'];

        $admin = $this->ccmModel->getCCMByEmail($email);
        if ($admin) {
            $token = bin2hex(random_bytes(32));

            $adminId = $admin->admin_id;
            if ($this->ccmModel->updateResetToken($adminId, $token)) {
                // Send the password reset email
                $resetPasswordLink = URLROOT . '/ccm/resetPassword/' . $token;

                $subject = 'Collection Center Manager - Password Reset Link';
                $body = 'Click on the following link to reset your password: ' . $resetPasswordLink;

                // Create a PHPMailer instance
                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.mailgun.org'; // SMTP server
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'postmaster@sandbox7c468670b48147fba44d2f3b0a32b045.mailgun.org'; // SMTP username
                    $mail->Password   = '672c996787ba83eadd396afa108b1340-2175ccc2-41886cd4';   // SMTP password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;

                    // Recipients
                    $mail->setFrom('FarmToKeells@gmail.com', 'FarmToKeells');
                    $mail->addAddress($email); // Add a recipient

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = $body;

                    $mail->send();

                    // Redirect to a success page or display a message
                    flash('forgot_password_success', 'Collection Center Manager password reset link has been sent to your email.');
                    redirect('ccm/forgotPassword');

                } catch (Exception $e) {
                    die('Email sending failed: ' . $mail->ErrorInfo);
                }
            } else {
                //Email not found
                flash('forgot_password_error', 'Email not found.');
                redirect('ccm/forgotPassword');
            }
        } else {
            // Email not found
            flash('forgot_password_error', 'Email not found.');
            redirect('ccm/forgotPassword');
        }
    } else {
        // Render the view for the forgot password page
        $this->view('ccm/forgotPassword');
    }
}


public function resetPassword($token = null) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $token = $_GET['token'];

        // Validate password reset form data
        // Validate password reset form data
        $data = [
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'token' => $token,
            'password_err' => '',
            'confirm_password_err' => ''
        ];

        // Validate Password
        if (empty($data['password'])) {
            $data['password_err'] = 'Please enter password';
        } elseif (strlen($data['password']) < 6) {
            $data['password_err'] = 'Password must be at least 6 characters';
        } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $data['password'])) {
            $data['password_err'] = 'Password must contain at least one letter and one number';
        }

        // Confirm password validation
        if (empty($data['confirm_password'])) {
            $data['confirm_password_err'] = 'Please confirm password.';
        } else {
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match.';
            }
        }

        if (empty($data['password_err']) && empty($data['confirm_password_err'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if ($this->ccmModel->updatePasswordByResetToken($data['token'], $data['password'])) {
                flash('reset_password_success', 'Password has been reset successfully.');
                redirect('ccm/ccm_login');
            } else {
                die('Error updating password.');
            }
        } else {
            $this->view('ccm/resetPassword', $data);
        }
    } else {
        $admin = $this->ccmModel->getCCMByResetToken($token);
        if ($admin) {
            $data = [
                'token' => $token,
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('ccm/resetPassword', $data);
        } else {
            flash('reset_password_error', 'Invalid or expired token.');
            redirect('ccm/forgotPassword');
        }
    
}
}

public function notify(){
    $notificationModel = new CcmNotifications();
    $unread = $notificationModel->unreadNotifs();

    // Return JSON response
    echo json_encode(array('unread' => $unread));
}

public function markAllAsRead() {
    $notificationModel = new CcmNotifications();
    $notificationModel->isRead();

    // Return a response
    echo json_encode(['success' => true]);
}



}

?>







