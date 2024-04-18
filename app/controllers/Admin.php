<?php
class Admin extends Controller{

    public $adminModel;
    public $userModel;

            public function __construct() {
                
                $this->adminModel = $this->model('Admins'); 
                $this->userModel = $this->model('User');

            //     // Check if admin is logged in
            // if(!isset($_SESSION['admin_id'])) {
            //     redirect('admin/admin_login');
            // }

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
                    
                    $this->view('admin/stock_overview', $data);
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
                    
                    $this->view('admin/stock_overviewbar', $data);
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
                $this->view('admin/view_price', $data);
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
                    
                    $this->view('admin/marketdemand', $data);
                } else {
                    // Handle case where no products are returned or an error occurs
                    // For example, you can return an error message as JSON
                    header('Content-Type: application/json');
                    echo (['error' => 'No products found']);
                }
        }
        
        

        

        public function displayReportGenerator() {
            // Load the report generator view
            $this->view("admin/report_generator");
        }
        
        public function displayReportGeneratorprice() {
            // Load the report generator view
            $this->view("admin/report_generatorprice");
        }
        
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
                $this->view("admin/inventory_history_report", $data);
            } else {
                // If not a POST request, redirect to the report generator page or show an error message
                redirect('admin/report_generator');
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
                $this->view("admin/inventory_history_reportprice", $data);
            } else {
                // If not a POST request, redirect to the report generator page or show an error message
                redirect('admin/report_generatorprice');
            }
        }
    
        public function existingproduct(){
            // Instantiate Product Model
            $productModel = new Product();
            
            // Get all products
            $data['products'] = $productModel->getAllProducts();
            
            // Load the view with products data
            $this->view('admin/existingproduct', $data);
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
        
        

        public function getUserInfo($user_id) {
            return $this->userModel->getUserInfoById($user_id);
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
            $this->view('admin/place_salesorder', $data);
        }
        
        
        public function updateStatus() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve the order IDs and statuses from the form for sales order
                $orderIds = $_POST['order_id'];
                $statuses = $_POST['status'];
        
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
          
          
       
        
        
    

    public function index(){
        $data = [
            'title' => ''
        ];

        $this->view('admin/dashboard', $data);
    }    

    public function admin_login()
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
                    $this->view('admin/admin_login', $data);
                }
            } else {
                // Load view with errors
                $this->view('admin/admin_login', $data);
            }
        } else {
            // Load view
            $this->view('admin/admin_login');
        }
    }
    


    
    
  public function createUserSession($admin_user) {
$_SESSION['admin_id'] = $admin_user->admin_id;
$_SESSION['admin_username'] = $admin_user->admin_username;
// Check if the 'admin_id' session variable exists


redirect('admin/dashboard');
}

    

    public function dashboard(){
        $data = [];

        $this->view('admin/dashboard', $data);
    }

    public function manageUsers()
    {
        // Get pending registration requests
        $pendingUsers = $this->userModel->getPendingUsers();

        // Get accepted users
        $acceptedUsers = $this->userModel->getAcceptedUsers(); // Assuming you have a method to retrieve accepted users
        
        $data = [
            'pendingUsers' => $pendingUsers,
            'acceptedUsers' => $acceptedUsers
        ];

        $this->view('admin/manageUsers', $data);
    }




    public function acceptUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];

            // Perform acceptance logic using User model
            $userModel = $this->model('User');

            if ($userModel->acceptRegistrationRequest($userId)) {
                // Notify the user or perform any necessary action
                flash('admin_message', 'User registration request accepted.');
            } else {
                die('Something went wrong');
            }

            // Redirect back to the admin interface for managing requests
            redirect('admin/manageUsers');
        } else {
            // Handle cases where the request method is not POST
            redirect('admin/manageUsers');
        }
    }

    public function rejectUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];

            // Perform rejection logic using User model
            $userModel = $this->model('User');

            if ($userModel->rejectRegistrationRequest($userId)) {
                // Notify the user or perform any necessary action
                flash('admin_message', 'User registration request rejected.');
            } else {
                die('Something went wrong');
            }

            // Redirect back to the admin interface for managing requests
            redirect('admin/manageUsers');
        } else {
            // Handle cases where the request method is not POST
            redirect('admin/manageUsers');
        }
    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];

            // Perform deletion logic using User model
            $userModel = $this->model('User');

            if ($userModel->deleteUser($userId)) {
                // Notify the admin or perform any necessary action
                flash('admin_message', 'User account deleted successfully.');
            } else {
                die('Something went wrong');
            }

            // Redirect back to the admin interface for managing users
            redirect('admin/manageUsers');
        } else {
            // Handle cases where the request method is not POST
            redirect('admin/manageUsers');
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
        redirect('admin/admin_login');
      }



    public function inquiry() {
        // Load the Inquiry model
        $inquiryModel = $this->model('Inquiry');
    
        // Get all inquiries from the database
        $inquiries = $inquiryModel->getAllInquiries();
    
        // Pass the inquiries data to the view
        $data = [
            'inquiries' => $inquiries
        ];
    
        // Load the 'farmer/inquiry' view and pass data to it
        $this->view('admin/inquiry', $data);
    }
    

    public function reply() {
        // Get the inquiry ID from the URL
        $inquiry_id = $_GET['inquiry_id'] ?? null;
    
        // Check if the inquiry ID is provided
        if ($inquiry_id) {
            // Load the Inquiry model
            $inquiryModel = $this->model('Inquiry');
    
            // Fetch the inquiry data using the inquiry ID
            $inquiry = $inquiryModel->getInquiryById($inquiry_id);
    
            // Check if inquiry data is found
            if ($inquiry) {
                // Pass the inquiry data to the view
                $this->view('admin/reply', ['inquiry_id' => $inquiry_id, 'inquiry' => $inquiry]);
            } else {
                // Inquiry not found, display an error message or redirect as needed
                echo "Inquiry not found!";
            }
        } else {
            // Inquiry ID not provided, display an error message or redirect as needed
            echo "Inquiry ID not provided!";
        }
    }
    

public function sendReply() {
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        // Instantiate the Inquiry model
        $inquiryModel = $this->model('Inquiry');
    
        // Get the inquiry ID from the form
        $inquiry_id = $_POST['inquiry_id'];
    
        // Get the admin reply from the form
        $admin_reply = $_POST['admin_reply'];
    
        // Update the inquiry with the admin reply
        if ($inquiryModel->updateAdminReply($inquiry_id, $admin_reply)) {
            // If successful, redirect to the inquiry page or any other desired page
            redirect('admin/inquiry');
        } else {
            // If failed, display an error message or handle it accordingly
            die('Something went wrong');
        }
    } else {
        // If the form is not submitted via POST method, redirect to home page or any other desired page
        redirect('pages/index');
    }
}









public function addChatadmin() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get input data
        $admin_reply = $_POST['admin_reply'];

        // Load the CCM Chat model
        $ccm_chatModel = $this->model('Ccm_Chat');

        // Add the chat message to the database
        if ($ccm_chatModel->addChatadmin($admin_reply)) {
            // Redirect to the chat page
            redirect('admin/ccm_chat');
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
public function tm_chat() {
    // Load the Inquiry model
    $tm_chatModel = $this->model('Tm_Chat');

    // Get all chats from the database
    $tm_chats = $tm_chatModel->getAllChats();

    // Pass the chat data to the view
    $data = [
        'tm_chats' => $tm_chats,
    ];

    // Load the 'ccm/ccm_chat' view and pass data to it
    $this->view('admin/tm_chat', $data);
}

public function addChatadmintm() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get input data
        $admin_reply = $_POST['admin_reply'];

        // Load the CCM Chat model
        $tm_chatModel = $this->model('Tm_Chat');

        // Add the chat message to the database
        if ($tm_chatModel->addChatadmintm($admin_reply)) {
            // Redirect to the chat page
            redirect('admin/tm_chat');
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
    $ccm_chatModel = $this->model('Ccm_Chat');

    // Get all chats from the database
    $ccm_chats = $ccm_chatModel->getAllChats();

    // Pass the chat data to the view
    $data = [
        'ccm_chats' => $ccm_chats,
    ];

    // Load the 'ccm/ccm_chat' view and pass data to it
    $this->view('admin/ccm_chat', $data);
}

}
?>
