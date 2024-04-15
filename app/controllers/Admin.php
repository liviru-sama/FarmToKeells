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
        

       
       
            public function marketdemand() {
   
                $this->view("ccm/marketdemand");
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
        
        

        public function getUserInfo($user_id) {
            return $this->userModel->getUserInfoById($user_id);
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
    


}
?>
