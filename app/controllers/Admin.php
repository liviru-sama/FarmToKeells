<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Admin extends Controller
{

    public $adminModel;
    public $adminsModel;
    public $userModel;
    public $ccmModel; 
    public $tmModel;
    public $qiModel;

    public function __construct()
    {

        $this->adminModel = $this->model('AdminModel');
        $this->adminsModel = $this->model('Admins');
        $this->userModel = $this->model('User');
        $this->ccmModel = $this->model('CcmModel'); 
        $this->tmModel = $this->model('TmModel'); 
        $this->qiModel = $this->model('QiModel');

    }

    public function isLoggedInAdmin()
    {
        if (isset($_SESSION['admin_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function admin_login()
    {
        if ($this->isLoggedInAdmin()) {
            redirect('admin/dashboard');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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

                // Check for errors
                if (empty($data['admin_username_err']) && empty($data['admin_password_err'])) {
                    // Validated
                    // Call the validate_login method in the ccm model with username and password
                    $loggedInAdmin = $this->adminModel->validateLogin($data['admin_username'], $data['admin_password']);
                    if ($loggedInAdmin) {
                        // Start session if not already started
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        // Create session variables
                        $_SESSION['admin_id'] = $loggedInAdmin->admin_id;
                        $_SESSION['admin_username'] = $loggedInAdmin->admin_username;

                        // Redirect to admin dashboard or any desired page
                        redirect('admin/dashboard');
                        exit;
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

    }

    public function index(){
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            $data = [
                'title' => '',
            ];
            $this->view('admin/dashboard', $data);
        }
    }

    public function dashboard()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            $data = [];

            $this->view('admin/dashboard', $data);
        }

    }

    public function addAdminCredentials()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $adminUsername = filter_input(INPUT_POST, 'admin_username', FILTER_SANITIZE_STRING);
            $adminPassword = filter_input(INPUT_POST, 'admin_password', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $admincPassword = filter_input(INPUT_POST, 'admin_cpassword', FILTER_SANITIZE_STRING);

            // Initialize error array
            $errors = [];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email_err'] = "Invalid email format.";
            }

            // Validate if passwords match
            if ($adminPassword !== $admincPassword) {
                $errors['cpassword_err'] = "Passwords do not match.";
            }

            // Validate password length
            if (strlen($adminPassword) < 8) {
                $errors['password_length_err'] = "Password should be at least 8 characters long.";
            }

            // Validate all fields are filled
            if (empty($adminUsername) || empty($adminPassword) || empty($email) || empty($admincPassword)) {
                $errors['fields_err'] = "All fields are required.";
            }

            // Check if email already exists
            if ($this->adminModel->isEmailExists($email)) {
                $errors['email_exists_err'] = "Email already exists.";
            }

            // Check if username already exists
            if ($this->adminModel->isUsernameExists($adminUsername)) {
                $errors['username_exists_err'] = "Username already exists.";
            }

            // If there are no errors, proceed with registration
            if (empty($errors)) {
                // Hash the admin password
                $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

                // Call the model method to insert admin credentials
                if ($this->adminModel->insertAdminCredentials($adminUsername, $hashedPassword, $email)) {
                    // Admin credentials inserted successfully
                    // You can redirect to a success page or perform other actions
                    $success_message = "Admin credentials inserted successfully.</br> Now You can Login";

                    // Load the login view with success message
                    $this->view('admin/admin_login');
                    exit;

                } else {
                    // Failed to insert admin credentials
                    // You can redirect to an error page or perform other actions
                    echo "Failed to insert admin credentials";
                }
            } else {
                // Load the view with errors
                $this->view('admin/admin_register', ['errors' => $errors]);
            }
        } else {
            // If not a POST request, load the registration form
            $this->view('admin/admin_register');
        }
    }

    public function admin_register()
    {
        // Load the view file
        $this->view('admin/admin_register');
    }

    public function stock_overview()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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
    }

    public function stock_overviewbar()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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
    }

    public function view_price()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            // Instantiate Product Model
            $priceModel = new Price();

            // Get all products
            $data['prices'] = $priceModel->getAllPrices();

            // Load the view with products data
            $this->view('admin/view_price', $data);
        }
    }

    public function marketdemand()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate the Product model
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
    }

    public function edit_price()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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
                    'price' => $price,
                ];

                if ($priceModel->edit_price($data)) {
                    // Product edited successfully
                    // Redirect to view inventory page or display success message
                    redirect('admin/view_price');
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

                $this->view("admin/edit_price", (array) $priceData);
            }
        }
    }

    public function displayReportGenerator()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Load the report generator view
            $this->view("admin/report_generator");
        }
    }

    public function displayReportGeneratorprice()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            // Load the report generator view
            $this->view("admin/report_generatorprice");
        }
    }

    public function displayInventoryHistoryReport()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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
                $filteredproductHistory = array_filter($productHistory, function ($record) {
                    return $record->price_change === null;
                });

                // Pass the filtered inventory history data and form inputs to the view
                $data = [
                    'inventory_history' => $filteredproductHistory,
                    'product_name' => $productName, // Add product name to data array
                    'start_date' => $startDate, // Add start date to data array
                    'end_date' => $endDate, // Add end date to data array
                ];

                // Load the inventory history report view within the iframe
                $this->view("admin/inventory_history_report", $data);
            } else {
                // If not a POST request, redirect to the report generator page or show an error message
                redirect('admin/report_generator');
            }
        }
    }

    public function displayInventoryHistoryReportprice()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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
                $filteredproductHistory = array_filter($productHistory, function ($record) {
                    return $record->quantity_change === null;
                });

                // Pass the filtered inventory history data and form inputs to the view
                $data = [
                    'inventory_history' => $filteredproductHistory,
                    'product_name' => $productName, // Add product name to data array
                    'start_date' => $startDate, // Add start date to data array
                    'end_date' => $endDate, // Add end date to data array
                ];

                // Load the inventory history report view within the iframe
                $this->view("admin/inventory_history_reportprice", $data);
            } else {
                // If not a POST request, redirect to the report generator page or show an error message
                redirect('admin/report_generatorprice');
            }
        }
    }

    public function existingproduct()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            // Instantiate Product Model
            $productModel = new Product();

            // Get all products
            $data['products'] = $productModel->getAllProducts();

            // Load the view with products data
            $this->view('admin/existingproduct', $data);
        }
    }

    public function purchaseorder()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            $purchaseorderModel = new Purchaseorder();

            // Get all purchase orders
            $data['purchaseorders'] = $purchaseorderModel->getAllPurchaseorders();

            // Load the view with purchase orders data
            $this->view('admin/purchaseorder', $data);
        }
    }

    public function displayPurchaseorders()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            // Create an instance of the PurchaseModel
            $purchaseorderModel = new PurchaseorderModel();

            // Call the method to fetch all products
            $purchaseorders = $purchaseorderModel->getAllPurchaseorders();

            // Pass the fetched products to the view
            require_once 'views/admin/purchaseorder';
        }
    }

    public function salesorder()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();

            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesorders();

            // Load the view with purchase orders data
            $this->view('admin/salesorder', $data);
        }
    }

    public function salesorderpending()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();

            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesorderspending();

            // Load the view with purchase orders data
            $this->view('admin/salesorderpending', $data);
        }
    }

    public function salesorderapproved()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();

            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesordersapproved();

            // Load the view with purchase orders data
            $this->view('admin/salesorderapproved', $data);
        }
    }

    public function salesordercompleted()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();

            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesorderscompleted();

            // Load the view with purchase orders data
            $this->view('admin/salesordercompleted', $data);

        }
    }

    public function salesorderrejected()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();

            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesordersrejected();

            // Load the view with purchase orders data
            $this->view('admin/salesorderrejected', $data);
        }
    }

    public function getUserInfo($user_id)
    {
        return $this->userModel->getUserInfoById($user_id);
    }

    public function add_purchaseorder()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->model("Purchaseorder");

                // Instantiate Product Model with Database dependency injection
                $purchaseorderModel = new Purchaseorder();

                // Sanitize and validate POST data
                $name = trim($_POST['name']);
                $type = trim($_POST['type']);
                $quantity = trim($_POST['quantity']);
                $date = isset($_POST['date']) ? trim($_POST['date']) : '';
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
                    'image' => $image,
                ];

                if ($purchaseorderModel->add_purchaseorder($data)) {
                    // Product added successfully
                    // Redirect to view inventory page
                    redirect('admin/purchaseorder');
                    exit();
                } else {
                    // Product addition failed
                    echo "Failed to add purchase order.";
                }
            } else {
                // If not a POST request, redirect to the add product page or show an error message
                //echo "Invalid request method.";
                $this->view("admin/add_purchaseorder");
            }
        }
    }

    public function confirmationDialog($purchaseId)
    {
        // Load the confirmation dialog view passing the purchase ID
        $data = [
            'purchaseId' => $purchaseId,
        ];
        $this->view('admin/confirmationdialog', $data);
    }

    public function indexprod()
    {
        $data = [
            'title' => '',
        ];

        $this->view('ccm/product_selection', $data);
    }
    public function product_selection()
    {

        $this->view("ccm/product_selection");
    }

    public function edit_purchaseorder()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Instantiate Product Model with Database dependency injection
                $purchaseorderModel = new Purchaseorder();

                // Sanitize and validate POST data
                // $id = $_POST['id']; // Assuming the id of the product to edit is passed via POST
                $id = trim($_GET["id"]);
                print_r(trim($_POST['name']) . "</br>");
                print_r(trim($_POST['type']) . "</br>");
                print_r(trim($_POST['date']) . "</br>");
                print_r(trim($_POST['quantity']) . "</br>");
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
                    'date' => $date,
                ];

                if ($purchaseorderModel->edit_purchaseorder($data)) {
                    // Product edited successfully
                    // Redirect to view inventory page or display success message
                    redirect('admin/purchaseorder');
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

                $this->view("admin/edit_purchaseorder", (array) $purchaseorderData);
            }
        }
    }

    public function delete_purchaseorder()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Check for POST
            if ($_GET['id'] != null) {

                // Instantiate Purchaseorder Model with Database dependency injection
                $purchaseorderModel = new Purchaseorder();

                // Sanitize and validate GET data
                $id = $_GET['id'];

                // Attempt to delete purchase order
                if ($purchaseorderModel->delete_purchaseorder($id)) {
                    // Deletion successful
                    header("Location: " . URLROOT . "/admin/purchaseorder");
                    exit(); // Ensure that no other output is sent
                } else {
                    // Deletion failed
                    $response = array(
                        'success' => false,
                        'message' => 'Failed to delete purchase order.',
                    );
                }
            } else {
                // Invalid request
                $response = array(
                    'success' => false,
                    'message' => 'Invalid request method.',
                );
            }

            // Return JSON response
            echo json_encode($response);
        }
    }

    public function place_salesorder($purchase_id)
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
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
    }

    public function updateStatus()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        }}
    }

    public function updatePurchaseStatus()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        }}
    }

    public function manageUsers()
    {if (!$this->isLoggedInAdmin()) {
        redirect('admin/admin_login');
    } else {
        // Get pending registration requests
        $pendingUsers = $this->userModel->getPendingUsers();
        $rejectedUsers = $this->userModel->getRejectedUsers();

        // Get accepted users
        $acceptedUsers = $this->userModel->getAcceptedUsers(); // Assuming you have a method to retrieve accepted users

        $data = [
            'pendingUsers' => $pendingUsers,
            'acceptedUsers' => $acceptedUsers,
            'rejectedUsers' => $rejectedUsers,
        ];

        $this->view('admin/manageUsers', $data);
    }}

    // public function acceptUser()
    // {if (!$this->isLoggedInAdmin()) {
    //     redirect('admin/admin_login');
    // } else {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $userId = $_POST['userId'];

    //         // Perform acceptance logic using User model
    //         $userModel = $this->model('User');

    //         if ($userModel->acceptRegistrationRequest($userId)) {
    //             // Notify the user or perform any necessary action
    //             flash('admin_message', 'User registration request accepted.');
    //         } else {
    //             die('Something went wrong');
    //         }

    //         // Redirect back to the admin interface for managing requests
    //         redirect('admin/manageUsers');
    //     } else {
    //         // Handle cases where the request method is not POST
    //         redirect('admin/manageUsers');
    //     }
    // }}

    // public function rejectUser()
    // {if (!$this->isLoggedInAdmin()) {
    //     redirect('admin/admin_login');
    // } else {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $userId = $_POST['userId'];

    //         // Perform rejection logic using User model
    //         $userModel = $this->model('User');

    //         if ($userModel->rejectRegistrationRequest($userId)) {
    //             // Notify the user or perform any necessary action
    //             flash('admin_message', 'User registration request rejected.');
    //         } else {
    //             die('Something went wrong');
    //         }

    //         // Redirect back to the admin interface for managing requests
    //         redirect('admin/manageUsers');
    //     } else {
    //         // Handle cases where the request method is not POST
    //         redirect('admin/manageUsers');
    //     }
    // }}

    public function acceptUser()
{
    if (!$this->isLoggedInAdmin()) {
        redirect('admin/admin_login');
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];

            // Perform acceptance logic using User model
            $userModel = $this->model('User');

            if ($userModel->acceptRegistrationRequest($userId)) {
                // Notify the user or perform any necessary action
                flash('admin_message', 'User registration request accepted.');

                // Fetch user's email
                $user = $userModel->getUserById($userId);
                $name= $user->name;
                $email = $user->email;

                // Send acceptance email
                $subject = 'Your registration request has been accepted';
                $body = 'Dear ' . $name . ', your registration request to to FarmToKeells has been accepted. You can now <a href="http://localhost/Farmtokeells/users/user_login">login to your account</a>.';
                
                // Send email
                $this->sendEmail($email, $subject, $body);
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
}

// Function to send email
private function sendEmail($email, $subject, $body)
{
    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.mailgun.org'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = ''; 
        $mail->Password = ''; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('FarmToKeells@gmail.com', 'FarmToKeells');
        $mail->addAddress($email); 

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
    } catch (Exception $e) {
        // Handle exception
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

    
    public function rejectUser() {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['userId'];
    
            // Perform rejection logic using User model
            $userModel = $this->model('User');
    
            if ($userModel->rejectRegistrationRequest($userId)) {
                // Notify the user
                $user = $userModel->getUserById($userId);
                $name= $user->name;
                $email = $user->email;

                // Send rejection email
                $subject = 'Your registration request has been rejected';
                $body = 'Dear ' . $name . ', We are sorry to inform that your registration request to FarmToKeells has been rejected.';


                // Send email
                $this->sendEmail($email, $subject, $body);
                
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
}

    // public function deleteUser()
    // {if (!$this->isLoggedInAdmin()) {
    //     redirect('admin/admin_login');
    // } else {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $userId = $_POST['userId'];

    //         // Perform deletion logic using User model
    //         $userModel = $this->model('User');

    //         if ($userModel->deleteUser($userId)) {
    //             // Notify the admin or perform any necessary action
    //             flash('admin_message', 'User account deleted successfully.');
    //         } else {
    //             die('Something went wrong');
    //         }

    //         // Redirect back to the admin interface for managing users
    //         redirect('admin/manageUsers');
    //     } else {
    //         // Handle cases where the request method is not POST
    //         redirect('admin/manageUsers');
    //     }
    // }}

    public function inquiry()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Load the Inquiry model
            $inquiryModel = $this->model('Inquiry');

            // Get all inquiries from the database
            $inquiries = $inquiryModel->getAllInquiries();

            // Pass the inquiries data to the view
            $data = [
                'inquiries' => $inquiries,
            ];

            // Load the 'farmer/inquiry' view and pass data to it
            $this->view('admin/inquiry', $data);
        }
    }

    public function reply()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Get the inquiry ID from the URL
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
    }

    public function sendReply()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Check if the form is submitted
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
    }

    public function addChatadmin()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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
    }

// Farmer controller method to retrieve inquiries
// Farmer controller method to retrieve inquiries of the current user
// Farmer controller method to retrieve inquiries
    public function tm_chat()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Load the Inquiry model
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
    }

    public function addChatadmintm()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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
    }

// Farmer controller method to retrieve inquiries
// Farmer controller method to retrieve inquiries of the current user
// Farmer controller method to retrieve inquiries
    public function ccm_chat()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
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

    public function payment()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            // Load the Paymentrequests model
            $paymentRequestsModel = $this->model('Paymentrequests');

            // Get all payment requests
            $paymentRequests = $paymentRequestsModel->getAllPaymentRequests();

            // Pass payment requests data to the view
            $data = [
                'paymentRequests' => $paymentRequests,
            ];

            // Load the view
            $this->view('admin/payment', $data);
        }
    }

    public function logout()
    {
        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session.
        session_destroy();

        // Set a short session expiration time (e.g., 5 minutes) for future sessions
        ini_set('session.cookie_lifetime', 5); // Adjust as needed

        // Redirect to the index page
        redirect('admin/admin_login');
    }

    public function Notifications()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else {
            $notificationModel = $this->model('AdminNotifications');

            $notifications = $notificationModel->getAllNotifications();

            $data = [
                'notifications' => $notifications,
            ];

            // Load the 'farmer/inquiry' view and pass data to it
            $this->view('admin/notifications', $data);
        }
    }

    public function manageadmin()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Get data for each table
            $ccm = $this->ccmModel->getUsers('ccm');
            $tm = $this->tmModel->getUsers('tm');
            $qi = $this->qiModel->getUsers('inspector');

            // Pass the data to the view
            $data = [
                'ccm' => $ccm,
                'tm' => $tm,
                'qi' => $qi,
            ];

            $this->view('admin/manageadmin', $data);
        }
    }

    public function tm_register()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Load the view file
            $this->view('admin/tm_register');
        }
    }

    public function addAdminCredentialstm()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize input data
                $adminUsername = filter_input(INPUT_POST, 'admin_username', FILTER_SANITIZE_STRING);
                $adminPassword = filter_input(INPUT_POST, 'admin_password', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $admincPassword = filter_input(INPUT_POST, 'admin_cpassword', FILTER_SANITIZE_STRING);
                $collectioncenter = filter_input(INPUT_POST, 'collectioncenter', FILTER_SANITIZE_STRING);

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

                // Validate password length
                if (strlen($adminPassword) < 8) {
                    $errors['password_length_err'] = "Password should be at least 8 characters long.";
                }

                // Validate all fields are filled
                if (empty($adminUsername) || empty($adminPassword) || empty($email) || empty($collectioncenter) || empty($admincPassword)) {
                    $errors['fields_err'] = "All fields are required.";
                }

                // Check if email already exists
                if ($this->tmModel->isEmailExists($email)) {
                    $errors['email_exists_err'] = "Email already exists.";
                }

                // Check if username already exists
                if ($this->tmModel->isUsernameExists($adminUsername)) {
                    $errors['username_exists_err'] = "Username already exists.";
                }

                // If there are no errors, proceed with registration
                if (empty($errors)) {
                    // Hash the admin password
                    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

                    // Call the model method to insert admin credentials
                    if ($this->tmModel->insertAdminCredentials($adminUsername, $hashedPassword, $email, $collectioncenter)) {
                        // Admin credentials inserted successfully
                        // You can redirect to a success page or perform other actions
                        $success_messagetm = "TM credentials inserted successfully.</br>";

                        // Get data for each table again
                        $ccm = $this->ccmModel->getUsers('ccm');
                        $tm = $this->tmModel->getUsers('tm');
                        $qi = $this->qiModel->getUsers('inspector');

                        // Pass the data to the view
                        $data = [
                            'ccm' => $ccm,
                            'tm' => $tm,
                            'qi' => $qi,
                            'success_messagetm' => $success_messagetm,
                        ];

                        // Load the manageadmin view with success message and data
                        $this->view('admin/manageadmin', $data);
                        exit;
                    } else {
                        // Failed to insert admin credentials
                        // You can redirect to an error page or perform other actions
                        echo "Failed to insert admin credentials";
                    }
                } else {
                    // Load the view with errors
                    $this->view('admin/tm_register', ['errors' => $errors]);
                }
            } else {
                // If not a POST request, load the registration form
                $this->view('admin/tm_register');
            }
        }
    }

    public function qi_register()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Load the view file
            $this->view('admin/qi_register');
        }
    }

    public function addAdminCredentialsqi()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize input data
                $adminUsername = filter_input(INPUT_POST, 'admin_username', FILTER_SANITIZE_STRING);
                $adminPassword = filter_input(INPUT_POST, 'admin_password', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $admincPassword = filter_input(INPUT_POST, 'admin_cpassword', FILTER_SANITIZE_STRING);
                $collectioncenter = filter_input(INPUT_POST, 'collectioncenter', FILTER_SANITIZE_STRING);

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

                if (strlen($adminPassword) < 8) {
                    $errors['password_length_err'] = "Password should be at least 8 characters long.";
                }
                // Validate all fields are filled
                if (empty($adminUsername) || empty($adminPassword) || empty($email) || empty($collectioncenter) || empty($admincPassword)) {
                    $errors['fields_err'] = "All fields are required.";
                }

                if ($this->qiModel->isEmailExists($email)) {
                    $errors['email_exists_err'] = "Email already exists.";
                }

                // Check if username already exists
                if ($this->qiModel->isUsernameExists($adminUsername)) {
                    $errors['username_exists_err'] = "Username already exists.";
                }
                // If there are no errors, proceed with registration
                if (empty($errors)) {
                    // Hash the admin password
                    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

                    // Call the model method to insert admin credentials
                    if ($this->qiModel->insertAdminCredentials($adminUsername, $hashedPassword, $email, $collectioncenter)) {
                        // Admin credentials inserted successfully
                        // You can redirect to a success page or perform other actions
                        $success_messageqi = "QI credentials inserted successfully.</br>";

                        // Get data for each table again
                        $ccm = $this->ccmModel->getUsers('ccm');
                        $tm = $this->tmModel->getUsers('tm');
                        $qi = $this->qiModel->getUsers('inspector');

                        // Pass the data to the view
                        $data = [
                            'ccm' => $ccm,
                            'tm' => $tm,
                            'qi' => $qi,
                            'success_messageqi' => $success_messageqi,
                        ];

                        // Load the manageadmin view with success message and data
                        $this->view('admin/manageadmin', $data);
                        exit;
                    } else {
                        // Failed to insert admin credentials
                        // You can redirect to an error page or perform other actions
                        echo "Failed to insert admin credentials";
                    }
                } else {
                    // Load the view with errors
                    $this->view('admin/qi_register', ['errors' => $errors]);
                }
            } else {
                // If not a POST request, load the registration form
                $this->view('admin/qi_register');
            }
        }
    }

    public function ccm_register()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Load the view file
            $this->view('admin/ccm_register');
        }
    }

    public function addAdminCredentialsccm()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize input data
                $adminUsername = filter_input(INPUT_POST, 'admin_username', FILTER_SANITIZE_STRING);
                $adminPassword = filter_input(INPUT_POST, 'admin_password', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $admincPassword = filter_input(INPUT_POST, 'admin_cpassword', FILTER_SANITIZE_STRING);
                $collectioncenter = filter_input(INPUT_POST, 'collectioncenter', FILTER_SANITIZE_STRING);

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

                if (strlen($adminPassword) < 8) {
                    $errors['password_length_err'] = "Password should be at least 8 characters long.";
                }
                // Validate all fields are filled
                if (empty($adminUsername) || empty($adminPassword) || empty($email) || empty($collectioncenter) || empty($admincPassword)) {
                    $errors['fields_err'] = "All fields are required.";
                }

                if ($this->ccmModel->isEmailExists($email)) {
                    $errors['email_exists_err'] = "Email already exists.";
                }

                // Check if username already exists
                if ($this->ccmModel->isUsernameExists($adminUsername)) {
                    $errors['username_exists_err'] = "Username already exists.";
                }
                // If there are no errors, proceed with registration
                if (empty($errors)) {
                    // Hash the admin password
                    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

                    // Call the model method to insert admin credentials
                    if ($this->ccmModel->insertAdminCredentials($adminUsername, $hashedPassword, $email, $collectioncenter)) {
                        // Admin credentials inserted successfully
                        // You can redirect to a success page or perform other actions
                        $success_messageccm = "CCM credentials inserted successfully.</br>";

                        // Get data for each table again
                        $ccm = $this->ccmModel->getUsers('ccm');
                        $tm = $this->tmModel->getUsers('tm');
                        $qi = $this->qiModel->getUsers('inspector');

                        // Pass the data to the view
                        $data = [
                            'ccm' => $ccm,
                            'tm' => $tm,
                            'qi' => $qi,
                            'success_messageccm' => $success_messageccm,
                        ];

                        // Load the manageadmin view with success message and data
                        $this->view('admin/manageadmin', $data);
                        exit;
                    } else {
                        // Failed to insert admin credentials
                        // You can redirect to an error page or perform other actions
                        echo "Failed to insert admin credentials";
                    }
                } else {
                    // Load the view with errors
                    $this->view('admin/ccm_register', ['errors' => $errors]);
                }
            } else {
                // If not a POST request, load the registration form
                $this->view('admin/ccm_register');
            }
        }
    }

    public function salesorderqualityapproved()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();

            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesordersqualityapproved();

            // Load the view with purchase orders data
            $this->view('admin/salesorderqualityapproved', $data);
        }
    }

    public function salesorderqualityrejected()
    {
        if (!$this->isLoggedInAdmin()) {
            redirect('admin/admin_login');
        } else { // Instantiate Purchaseorder Model
            $salesorderModel = new Salesorder();

            // Get all purchase orders
            $data['salesorders'] = $salesorderModel->getAllSalesordersqualityrejected();

            // Load the view with purchase orders data
            $this->view('admin/salesorderqualityrejected', $data);
        }
    }

    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle form submission
            $email = $_POST['email'];

            $admin = $this->adminModel->getAdminByEmail($email);
            if ($admin) {
                $token = bin2hex(random_bytes(32));

                $adminId = $admin->admin_id;
                if ($this->adminModel->updateResetToken($adminId, $token)) {
                    // Send the password reset email
                    $resetPasswordLink = URLROOT . '/admin/resetPassword/' . $token;

                    $subject = 'Keells Admin - Password Reset Link';
                    $body = 'Click on the following link to reset your password: ' . $resetPasswordLink;

                    // Create a PHPMailer instance
                    $mail = new PHPMailer(true);

                    try {
                        // Server settings
                        $mail->isSMTP();
                        $mail->Host = 'smtp.mailgun.org'; // SMTP server
                        $mail->SMTPAuth = true;
                        $mail->Username = 'postmaster@sandbox7c468670b48147fba44d2f3b0a32b045.mailgun.org'; // SMTP username
                        $mail->Password = '672c996787ba83eadd396afa108b1340-2175ccc2-41886cd4'; // SMTP password
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;

                        // Recipients
                        $mail->setFrom('FarmToKeells@gmail.com', 'FarmToKeells');
                        $mail->addAddress($email); // Add a recipient

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = $subject;
                        $mail->Body = $body;

                        $mail->send();

                        // Redirect to a success page or display a message
                        flash('forgot_password_success', 'Keells Admin password reset link has been sent to your email.');
                        redirect('admin/forgotPassword');

                    } catch (Exception $e) {
                        die('Email sending failed: ' . $mail->ErrorInfo);
                    }
                } else {
                    //Email not found
                    flash('forgot_password_error', 'Email not found.');
                    redirect('admin/forgotPassword');
                }
            } else {
                // Email not found
                flash('forgot_password_error', 'Email not found.');
                redirect('admin/forgotPassword');
            }
        } else {
            // Render the view for the forgot password page
            $this->view('admin/forgotPassword');
        }
    }

    public function resetPassword($token = null)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $token = $_GET['token'];

            // Validate password reset form data
            // Validate password reset form data
            $data = [
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'token' => $token,
                'password_err' => '',
                'confirm_password_err' => '',
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

                if ($this->adminModel->updatePasswordByResetToken($data['token'], $data['password'])) {
                    flash('reset_password_success', 'Password has been reset successfully.');
                    redirect('admin/admin_login');
                } else {
                    die('Error updating password.');
                }
            } else {
                $this->view('admin/resetPassword', $data);
            }
        } else {
            $admin = $this->adminModel->getAdminByResetToken($token);
            if ($admin) {
                $data = [
                    'token' => $token,
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];
                $this->view('admin/resetPassword', $data);
            } else {
                flash('reset_password_error', 'Invalid or expired token.');
                redirect('admin/forgotPassword');
            }

        }
    }

        public function notify(){
            $notificationModel = new AdminNotifications();
            $unread = $notificationModel->unreadNotifs();
        
            // Return JSON response
            echo json_encode(array('unread' => $unread));
        }
        
        public function markAllAsRead() {
            $notificationModel = new AdminNotifications();
            $notificationModel->isRead();
        
            // You can return a response if needed
            echo json_encode(['success' => true]);
        }
       
}