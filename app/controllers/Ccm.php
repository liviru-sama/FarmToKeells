<?php
class Ccm extends Controller {
    public $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('Admins'); 
        $this->userModel = $this->model('User');
    }

    public function viewProductPrices() {
        // Load the view
        require APPROOT . '/views/ccm/productprices.php';
    }
    



        public function index(){
            $data = [
                'title' => ''
            ];
            
            $this->view('ccm/product_selection', $data);
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
                    // Call the validate_login method in the admin model with username and password
                    $loggedInAdmin = $this->adminModel->validate_login($data['admin_username'], $data['admin_password']);
                    if ($loggedInAdmin) {
                        // Create session
                        $this->createUserSession($loggedInAdmin);
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
        

        
        
      public function createUserSession($admin_user) {
    $_SESSION['admin_id'] = $admin_user->admin_id;
    $_SESSION['admin_username'] = $admin_user->admin_username;
  // Check if the 'admin_id' session variable exists


    redirect('ccm/dashboard');
}

        
public function dashboard(){
    $data = [];

    $this->view('ccm/dashboard', $data);
}

public function notifications(){
    $data = [];

    $this->view('ccm/notifications.php',$data);
}

// CcmController.php





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
            // Instantiate Product Model
            $productModel = new Product();
            
            // Get all products
            $data['products'] = $productModel->getAllProducts();
            
            // Load the view with products data
            $this->view('ccm/view_inventory', $data);
        }
        
        public function view_price(){
            // Instantiate Product Model
            $priceModel = new Price();
            
            // Get all products
            $data['prices'] = $priceModel->getAllPrices();
            
            // Load the view with products data
            $this->view('ccm/view_price', $data);
        }
        
public function edit_price() {
    // Check for POST request
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
        
        public function edit_product() {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Instantiate Product Model with Database dependency injection
                $productModel = new Product();
        
                // Sanitize and validate POST data
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
               
                $type = trim($_POST['type'] ?? '');
                $quantity = trim($_POST['quantity'] ?? '');
                $price = trim($_POST['price'] ?? '');
        
                // Check for required fields
                if ( empty($type) || empty($quantity) || empty($price)) {
                    echo "Please fill in all fields.";
                    return;
                }
        
                // Attempt to edit product
                $data = [
                    'id' => $id,
                    
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
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $productModel = new Product();
                $productData = $productModel->view_product($id);
                
                $this->view("ccm/edit_product", (array)$productData);
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
        $this->view('ccm/place_salesorder', $data);
    }
    
    

public function updateStatus() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}

public function updatePurchaseStatus() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
  }
  
  





public function displayReportGenerator() {
    // Load the report generator view
    $this->view("ccm/report_generator");
}

public function displayReportGeneratorprice() {
    // Load the report generator view
    $this->view("ccm/report_generatorprice");
}


    // controllers/Ccm.php

    // controllers/Ccm.php

    public function displayInventoryHistoryReport() {
        // Check for POST request
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
    }
    

    public function displayInventoryHistoryReportprice() {
        // Check for POST request
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
    }

    public function existingproduct(){
        // Instantiate Product Model
        $productModel = new Product();
        
        // Get all products
        $data['products'] = $productModel->getAllProducts();
        
        // Load the view with products data
        $this->view('ccm/existingproduct', $data);
    }
    
    

public function productSelection() {
   
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

public function script() {
   
    $this->view("ccm/script");
}




    // Get name and phone number of a user by ID
    public function getUserInfo($user_id) {
        return $this->userModel->getUserInfoById($user_id);
    }

    

      
    

    public function salesorder() {
        // Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesorders();
        
        // Load the view with purchase orders data
        $this->view('ccm/salesorder', $data);
    }

    public function stock_overview() {
        // Instantiate the Product model
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
    }

    public function stock_overviewbar() {
        // Instantiate the Product model
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
            
            $this->view('ccm/marketdemand', $data);
        } else {
            // Handle case where no products are returned or an error occurs
            // For example, you can return an error message as JSON
            header('Content-Type: application/json');
            echo (['error' => 'No products found']);
        }
}








// CCM controller method to add a new chat message
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



// Farmer controller method to retrieve inquiries
// Farmer controller method to retrieve inquiries of the current user
// Farmer controller method to retrieve inquiries
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
    $this->view('ccm/ccm_chat', $data);
}


}

?>







