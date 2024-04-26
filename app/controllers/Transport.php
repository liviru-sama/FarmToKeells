<?php

require_once __DIR__ . '/../../vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Transport extends Controller
{
     
    public $adminModel;
    public $tmModel;


    public function __construct() {
        $this->tmModel = $this->model('TmModel'); 

        $this->adminModel = $this->model('Admins'); 
        $this->userModel = $this->model('User');

    }


    public function isLoggedInAdmin() {
        if(isset($_SESSION['admin_id'])) {
            return true;
        } else {
            return false;
        }
    }


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
                if ($this->tmModel->insertAdminCredentials($adminUsername, $hashedPassword, $email)) {
                    // Admin credentials inserted successfully
                    // You can redirect to a success page or perform other actions
                    $success_message = "TM credentials inserted successfully.</br> Now You can Login";
    
                    // Load the login view with success message
                    $this->view('admin/manageadmin', ['success_message' => $success_message]);
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
    

    public function tm_register() {
        // Load the view file
        $this->view('admin/tm_register');
    }
    
    
    public function tm_login()
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
                // Call the validate_login method in the tm model with username and password
                $loggedInAdmin = $this->tmModel->validateLogin($data['admin_username'], $data['admin_password']);
                if ($loggedInAdmin) {
                    // Start session if not already started
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
    
                    // Create session variables
                    $_SESSION['admin_id'] = $loggedInAdmin->admin_id;
                    $_SESSION['admin_username'] = $loggedInAdmin->admin_username;
    
                    // Redirect to tm dashboard or any desired page
                    redirect('transport/dashboard');                    exit;
                } else {
                    $data['admin_password_err'] = 'Incorrect username or password';
                    $this->view('transport/tm_login', $data);
                }
            } else {
                // Load view with errors
                $this->view('transport/tm_login', $data);
            }
        } else {
            // Load view
            $this->view('transport/tm_login');
        }
    }
    
   
    
    function getDates($startDate, $endDate) {
        $dates = array();
        $startDate = new DateTime($startDate);
        $endDate = new DateTime($endDate);
        
        $endDate = $endDate->modify('+1 day'); 
    
        $interval = new DateInterval('P1D');
        $dateRange = new DatePeriod($startDate, $interval, $endDate);
    
        foreach ($dateRange as $date) {
            $dates[] = $date->format("Y-m-d");
        }
    
        return $dates;
    }

    public function index(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [
                'title' => ''
            ];
            $this->view('transport/dashboard', $data);
        }
    }
    
    public function dashboard(){
        if (!$this->isLoggedInAdmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [];
    
        $this->view('transport/dashboard', $data);
        }
        
    }

    public function pending_requests(){
        $data = [
            'title' => 'Transport Requests'
        ];

        $requests = $this->model('Request');

        $users = $this->model('User');

        $data['activeRequests'] = $requests->getActiveRequests();

        foreach ($data['activeRequests'] as $request) {
            $user = $users->findUserByID($request->user_id);
            $request->user = $user->name;
        }

        $this->view('transport/pending_requests', $data);
    }

    public function cancelled_requests(){
        $data = [
            'title' => 'Transport Requests'
        ];

        $requests = $this->model('Request');

        $users = $this->model('User');

        $data['cancelledRequests'] = $requests->getCancelledRequests();

        foreach ($data['cancelledRequests'] as $request) {
            $user = $users->findUserByID($request->user_id);
            $request->user = $user->name;
        }

        $this->view('transport/cancelled_requests', $data);
    }


    public function resources() {

    }

    public function addChat() {
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get input data
            $inquiry = $_POST['inquiry'];
    
            // Load the CCM Chat model
            $tm_chatModel = $this->model('Tm_Chat');
    
            // Add the chat message to the database
            if ($tm_chatModel->addChat($inquiry)) {
                // Redirect to the chat page
                redirect('transport/tm_chat');
            } else {
                // If failed to add, show an error message
                die('Failed to add chat message.');
            }
        } else {
            // If not a POST request, redirect to home
            redirect('transport/tm_chat');
        }
    }}

    // Farmer controller method to retrieve inquiries of the current user
    public function tm_chat() {
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {// Load the Inquiry model
        $tm_chatModel = $this->model('Tm_chat');
    
        date_default_timezone_set('Asia/Kolkata'); // Replace 'Asia/Kolkata' with your timezone
        $tm_chats = $tm_chatModel->getAllChats();
    
        // Pass the chat data to the view
        $data = [
            'tm_chats' => $tm_chats,
        ];
    
        // Load the 'ccm/ccm_chat' view and pass data to it
        $this->view('transport/tm_chat', $data);
    }}
    
    public function logout() {
        // Unset all of the session variables
        $_SESSION = array();
      
        // Destroy the session.
        session_destroy();
      
        // Set a short session expiration time (e.g., 5 minutes) for future sessions
        ini_set('session.cookie_lifetime', 5 ); // Adjust as needed
      
        // Redirect to the index page
        redirect('transport/tm_login');
      }

      public function getUserInfo($user_id) {
        return $this->userModel->getUserInfoById($user_id);
    }

    public function salesorderapproved() {
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else { // Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesordersqualityapproved();
        
        // Load the view with purchase orders data
        $this->view('transport/salesorderapproved', $data);
    }}

    public function salesordercompleted() {
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else { // Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesorderscompleted();
        
        // Load the view with purchase orders data
        $this->view('transport/salesordercompleted', $data);
    }}

    public function Notifications() {
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else { $notificationModel = $this->model('TmNotifications');
    
        $notifications = $notificationModel->getAllNotifications();
    
       
        $data = [
            'notifications' => $notifications,
        ];
    
        // Load the 'farmer/inquiry' view and pass data to it
        $this->view('transport/notifications', $data);
    } }

      public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle form submission
            $email = $_POST['email'];
    
            $admin = $this->tmModel->getTMByEmail($email);
            if ($admin) {
                $token = bin2hex(random_bytes(32));
    
                $adminId = $admin->admin_id;
                if ($this->tmModel->updateResetToken($adminId, $token)) {
                    // Send the password reset email
                    $resetPasswordLink = URLROOT . '/transport/resetPassword/' . $token;
    
                    $subject = 'Transportation Manager - Password Reset Link';
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
                        flash('forgot_password_success', 'Password reset link has been sent to your email.');
                        redirect('transport/forgotPassword');
    
                    } catch (Exception $e) {
                        die('Email sending failed: ' . $mail->ErrorInfo);
                    }
                } else {
                    //Email not found
                    flash('forgot_password_error', 'Email not found.');
                    redirect('transport/forgotPassword');
                }
            } else {
                // Email not found
                flash('forgot_password_error', 'Email not found.');
                redirect('transport/forgotPassword');
            }
        } else {
            // Render the view for the forgot password page
            $this->view('transport/forgotPassword');
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
    
                if ($this->tmModel->updatePasswordByResetToken($data['token'], $data['password'])) {
                    flash('reset_password_success', 'Password has been reset successfully.');
                    redirect('transport/tm_login');
                } else {
                    die('Error updating password.');
                }
            } else {
                $this->view('transport/resetPassword', $data);
            }
        } else {
            $admin = $this->tmModel->getTMByResetToken($token);
            if ($admin) {
                $data = [
                    'token' => $token,
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view('transport/resetPassword', $data);
            } else {
                flash('reset_password_error', 'Invalid or expired token.');
                redirect('transport/forgotPassword');
            }
        
    }
    }


    public function drivers(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
             $data = [
            'title' => 'Drivers'
        ];

        $drivers = $this->model('Driver');
        
        $data['drivers'] = $drivers->getAllDrivers();
        
        $this->view('transport/driverList', $data);
    }}

    public function vehicles(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [
            'title' => 'Vehicles'
        ];

        $vehicles = $this->model('Vehicle');

        $drivers = $this->model('Driver');
        
        $data['vehicles'] = $vehicles->getAllVehicles();

        foreach ($data['vehicles'] as $vehicle) {
            $driver = $drivers->getDriverByID($vehicle->D_id);
            $vehicle->driver = $driver->D_name;
        }

        $this->view('transport/vehicleList', $data);
    }}

    public function addVehicle(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [
            'title' => 'Add New Vehicle'
        ];

        $Drivers = $this->model('Driver');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'License_no' => trim($_POST['License_no']),
                'chassis' => trim($_POST['chassis']),
                'vtype' => trim($_POST['vtype']),
                'model' => trim($_POST['model']),
                'capacity' => trim($_POST['capacity']),
                'D_id' => trim($_POST['D_id'])
            ];

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['License_no'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['License_no_err'] = 'Please provide a License Number';
            }

            if (empty($data['chassis'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['chassis_err'] = 'Please provide a Chassis Number';
            }

            if (empty($data['vtype'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['vtype_err'] = 'Please provide a Vehicle Type';
            }

            if (empty($data['model'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['model_err'] = 'Please provide a Vehicle Model';
            }

            if (empty($data['capacity'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['capacity_err'] = 'Please provide Vehicle Capacity';
            }

            if (empty($data['D_id'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_id_err'] = 'Please assign a Driver';
            }


            if ($data['errors']['errnum'] > 0){

                $UnassignedDrivers = $Drivers->getUnassignedDrivers();
                
                $data['Drivers'] = $UnassignedDrivers;
                
                $this->view('transport/addVehicle', $data);
            } else {
                $vehicles = $this->model('Vehicle');

                if ($vehicles->insert($data)) {
                    redirect('transport/addVehicle');
                } else {
                    die('Something went wrong');
                }
            }

        } else {
            $data = [
                'title' => 'Add New Vehicle'
            ];

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $UnassignedDrivers = $Drivers->getUnassignedDrivers();
            
            $data['Drivers'] = $UnassignedDrivers;
            
            $this->view('transport/addVehicle', $data);
        }
    }}

    public function addDriver(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else { $data = [
            'title' => 'Add Driver'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'D_name' => trim($_POST['D_name']),
                'D_email' => trim($_POST['D_email']),
                'D_contact' => trim($_POST['D_contact']),
                'D_address' => trim($_POST['D_address']),
                'DateJoined' => trim($_POST['DateJoined'])
            ];

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['D_name'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_name_err'] = 'Please provide a Name';
            }

            if (empty($data['D_email'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_email_err'] = 'Please provide an Email';
            }

            if (empty($data['D_contact'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_contact_err'] = 'Please provide a Contact Number';
            }

            if (empty($data['D_address'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_address_err'] = 'Please provide an Address';
            }

            if (empty($data['DateJoined'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['DateJoined_err'] = 'Please provide the Date Joined';
            }

            if ($data['errors']['errnum'] > 0){

                $this->view('transport/addDriver', $data);
            } else {
                $drivers = $this->model('Driver');

                if ($drivers->insert($data)) {
                    redirect('transport/addDriver');
                } else {
                    die('Something went wrong');
                }
            }

        } else {
            $data = [
                'title' => 'Add Driver'
            ];

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];
            
            $this->view('transport/addDriver', $data);
        }
    }
}

    public function vehicleInfo($id){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [
            'title' => 'Vehicle Information'
        ];

        $vehicles = $this->model('Vehicle');

        $drivers = $this->model('Driver');
        
        $data['vehicle'] = $vehicles->getVehicleByID($id);

        $driver = $drivers->getDriverByID($data['vehicle']->D_id);
        $data['vehicle']->driver = $driver->D_name;

        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'License_no' => trim($_POST['License_no']),
                'chassis' => trim($_POST['chassis']),
                'vtype' => trim($_POST['vtype']),
                'model' => trim($_POST['model']),
                'capacity' => trim($_POST['capacity']),
                'D_id' => trim($_POST['D_id'])
            ];

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['License_no'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['License_no_err'] = 'Please provide a License Number';
            }

            if (empty($data['chassis'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['chassis_err'] = 'Please provide a Chassis Number';
            }

            if (empty($data['vtype'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['vtype_err'] = 'Please provide a Vehicle Type';
            }

            if (empty($data['model'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['model_err'] = 'Please provide a Vehicle Model';
            }

            if (empty($data['capacity'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['capacity_err'] = 'Please provide Vehicle Capacity';
            }

            if (empty($data['D_id'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_id_err'] = 'Please assign a Driver';
            }


            if ($data['errors']['errnum'] > 0){

                $UnassignedDrivers = $drivers->getUnassignedDrivers();
                
                $data['Drivers'] = $UnassignedDrivers;
                
                $this->view('transport/vehicleInfo', $data);
            } else {
                $vehicles = $this->model('Vehicle');

                if ($vehicles->insert($data)) {
                    redirect('transport/vehicleInfo');
                } else {
                    die('Something went wrong');
                }
            }

        } else {

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $UnassignedDrivers = $drivers->getUnassignedDrivers();
            
            $data['Drivers'] = $UnassignedDrivers;
            
            $this->view('transport/vehicleInfo', $data);
        }
    }}

    public function editVehicle(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [
            'title' => 'Vehicle'
        ];

        $Drivers = $this->model('Driver');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'V_id' => trim($_POST['V_id']),
                'License_no' => trim($_POST['License_no']),
                'chassis' => trim($_POST['chassis']),
                'vtype' => trim($_POST['vtype']),
                'model' => trim($_POST['model']),
                'capacity' => trim($_POST['capacity']),
                'D_id' => trim($_POST['D_id'])
            ];

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['License_no'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['License_no_err'] = 'Please provide a License Number';
            }

            if (empty($data['chassis'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['chassis_err'] = 'Please provide a Chassis Number';
            }

            if (empty($data['vtype'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['vtype_err'] = 'Please provide a Vehicle Type';
            }

            if (empty($data['model'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['model_err'] = 'Please provide a Vehicle Model';
            }

            if (empty($data['capacity'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['capacity_err'] = 'Please provide Vehicle Capacity';
            }

            if (empty($data['D_id'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_id_err'] = 'Please assign a Driver';
            }


            if ($data['errors']['errnum'] > 0){

                $UnassignedDrivers = $Drivers->getUnassignedDrivers();
                
                $data['Drivers'] = $UnassignedDrivers;
                
                $this->view('transport/vehicleInfo/'.$data['V_id'], $data);
            } else {
                $vehicles = $this->model('Vehicle');

                if ($vehicles->update($data)) {
                    // $this->view('transport/vehicleInfo/'.$data['V_id'], $data);
                } else {
                    die('Something went wrong');
                }
            }

        } else {
            $data = [
                'title' => 'Add New Vehicle'
            ];

            $data['errors'] = [
                'License_no_err' => '',
                'chassis_err' => '',
                'vtype_err' => '',
                'model_err' => '',
                'capacity_err' => '',
                'D_id_err' => ''
            ];

            $UnassignedDrivers = $Drivers->getUnassignedDrivers();
            
            $data['Drivers'] = $UnassignedDrivers;
            
            $this->view('transport/vehicleInfo', $data);
        }
    }}

    public function deleteVehicle($id){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
             $data = [
            'title' => 'Vehicle'
        ];

        $data['id'] = $id;

        $vehicles = $this->model('Vehicle');

        if ($vehicles->delete($data)) {
            redirect('transport/vehicles');
        } else {
            die('Something went wrong');
        }
    }}

    public function driverInfo($id){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
             $data = [
            'title' => 'Vehicle Information'
        ];

        $drivers = $this->model('Driver');
        
        $data['driver'] = $drivers->getDriverByID($id);


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'D_name' => trim($_POST['D_name']),
                'D_email' => trim($_POST['D_email']),
                'D_contact' => trim($_POST['D_contact']),
                'D_address' => trim($_POST['D_address']),
                'DateJoined' => trim($_POST['DateJoined'])
            ];

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['D_name'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_name_err'] = 'Please provide a Name';
            }

            if (empty($data['D_email'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_email_err'] = 'Please provide an Email';
            }

            if (empty($data['D_contact'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_contact_err'] = 'Please provide a Contact Number';
            }

            if (empty($data['D_address'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_address_err'] = 'Please provide an Address';
            }

            if (empty($data['DateJoined'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['DateJoined_err'] = 'Please provide the Date Joined';
            }

            if ($data['errors']['errnum'] > 0){

                $this->view('transport/driverInfo', $data);
            } else {
                $drivers = $this->model('Driver');

                if ($drivers->insert($data)) {
                    redirect('transport/driverInfo');
                } else {
                    die('Something went wrong');
                }
            }

        } else {

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];
            
            $this->view('transport/driverInfo', $data);
        }
    }}
    
    public function editDriver(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [
            'title' => 'Driver'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'D_id' => trim($_POST['D_id']),
                'D_name' => trim($_POST['D_name']),
                'D_email' => trim($_POST['D_email']),
                'D_contact' => trim($_POST['D_contact']),
                'D_address' => trim($_POST['D_address']),
                'DateJoined' => trim($_POST['DateJoined'])
            ];

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];

            $data['errors']['errnum'] = 0;

            if (empty($data['D_name'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_name_err'] = 'Please provide a Name';
            }

            if (empty($data['D_email'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_email_err'] = 'Please provide an Email';
            }

            if (empty($data['D_contact'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_contact_err'] = 'Please provide a Contact Number';
            }

            if (empty($data['D_address'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['D_address_err'] = 'Please provide an Address';
            }

            if (empty($data['DateJoined'])){
                $data['errors']['errnum'] =+ 1;
                $data['errors']['DateJoined_err'] = 'Please provide the Date Joined';
            }

            if ($data['errors']['errnum'] > 0){

                $this->view('transport/driverInfo', $data);
            } else {
                $drivers = $this->model('Driver');

                if ($drivers->update($data)) {
                    // redirect('transport/addDriver');
                } else {
                    die('Something went wrong');
                }
            }

        } else {
            $data = [
                'title' => 'Add Driver'
            ];

            $data['errors'] = [
                'D_name_err' => '',
                'D_email_err' => '',
                'D_contact_err' => '',
                'D_address_err' => '',
                'DateJoined_err' => ''
            ];
            
            $this->view('transport/driverInfo', $data);
        }
    }}

    public function deleteDriver($id){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $data = [
            'title' => 'Driver'
        ];

        $data['id'] = $id;

        $drivers = $this->model('Driver');

        if ($drivers->delete($data)) {
            redirect('transport/drivers');
        } else {
            die('Something went wrong');
        }
    }}

    public function getUnits($date,$oid){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
             $vehicles = $this->model('Vehicle');
        $schedule = $this->model('Schedule');
        $salesOrder = $this->model('SalesOrder');
        $users = $this->model('User');

        $order = $salesOrder->view_salesorder($oid);
        $user = $users->findUserByID($order->user_id);

        $mins = ceil(((($user->distance / 0.5833333333) * 2) + 60) / 10) * 10;

        $slots = $mins / 10;

        $vehiclesQ = $vehicles->quantityVehicles($order->quantity);

        $available = [];

        foreach ($vehiclesQ as $key => $veh) {
            $occupied = $schedule->getSlots($date, $veh);
        
            if (48 - $occupied >= $slots) {
                $available[] = $veh;
            }
        }

        $jsonData = json_encode($available);

        if (empty($available) || !is_array($available)) {
            $jsonData = json_encode(array());
        }
        
        echo "$jsonData";
    }}

    public function requestInfo($id){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
            $request = $this->model('Request');
        $salesOrder = $this->model('SalesOrder');
        $users = $this->model('User');
        
        $data['req_id'] = $id;

        $data['request'] = $request->getRequestByID($data);

        $order = $salesOrder->view_salesorder($data['request']->order_id);

        $user = $users->findUserByID($order->user_id);

        $data['request']->address = $order->address;
        $data['request']->username = $user->name;
        $data['request']->distance = $user->distance;

        $mins = ceil(((($user->distance / 0.5833333333) * 2) + 60) / 10) * 10;

        $slots = $mins / 10;

        $hours = $mins / 60;
        $hours = (int)$hours;

        $mins = $mins - ($hours * 60);

        $data['request']->duration = $hours." hrs ".$mins." mins";

        $data['dates'] = $this->getDates($data['request']->startdate , $data['request']->enddate);
        $data['slots'] = $slots;

        
        $data['errors'] = [
                'date_err' => '',
                'V_id_err' => '',
            ];

        $this->view('transport/requestInfo', $data);
        
        
    }}

    public function accept_request(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {
             $request = $this->model('Request');
        $salesOrder = $this->model('SalesOrder');
        $schedule = $this->model('Schedule');
        $Torder = $this->model('Torders');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data['order_id'] = $_POST['order_id'];
            $order = $salesOrder->view_salesorder($data['order_id']);
            $data['product'] = $order->name;
            $data['user_id'] = $order->user_id;
            $data['slots'] = $_POST['slots'];
            $data['date'] = $_POST['date'];
            $data['V_id'] = $_POST['V_id'];
            $data['req_id'] = $_POST['req_id'];

            if ($Torder->create($data)) {
                if ($schedule->create($data)) {
                    if ($request->delete($data['req_id'])) {
                        redirect('Transport/pending_requests');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    die('Something went wrong');
                }
            } else {
                die('Something went wrong');
            }

        } else {
            $data['errors'] = [
                    'date_err' => '',
                    'V_id_err' => '',
                ];
    
            $this->view('transport/requestInfo', $data);
        }
    }
}

    public function reject_request($id){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else {  $request = $this->model('Request');

        if ($request->reject($id)) {
            redirect('Transport/pending_requests');
        } else {
            die('Something went wrong');
        }
    }}

    public function salesorder(){
        if (!$this->isLoggedInadmin()) {
            redirect('transport/tm_login');
        } else { $Torder = $this->model('Torders');
        $salesOrder = $this->model('SalesOrder');
        $users = $this->model('User');
        $vehicles = $this->model('Vehicle');
        $drivers = $this->model('Driver');
        $schedule = $this->model('Schedule');

        $data['torders'] = $Torder->getTorders();

        foreach ($data['torders'] as $torder) {
            // $agenda = $schedule->getByOrder($torder->order_id);
            // $torder->date = $agenda->date;
            $user = $users->findUserByID($torder->user_id);
            $torder->user = $user->name;
            $veh = $vehicles->getVehicleByID($torder->V_id);
            $torder->license = $veh->License_no;
            $driver = $drivers->getDriverByID($veh->D_id);
            $torder->D_name = $driver->D_name;
            switch ($torder->status) {
                case 1:
                    $torder->status_name = "Accepted";
                    break;
                case 2:
                    $torder->status_name = "Out for Pickup";
                    break;
                case 3:
                    $torder->status_name = "Collected";
                    break;
                case 4:
                    $torder->status_name = "Delivered";
                    break;
            }
        }

        $this->view('transport/salesorder', $data);
    }}

    public function statusminus($id){
        $torders = $this->model('Torders');

        $torder = $torders->getTorderByID($id);

        $status = $torder->status;

        switch ($status) {
            case 1:
                $newstatus = 1;
                redirect('Transport/salesorder');
                break;
            case 2:
                $newstatus = 1;
                break;
            case 3:
                $newstatus = 2;
                break;
            case 4:
                $newstatus = 3;
                break;
        }

        if ($torders->statusupdate($id,$newstatus)) {
            redirect('Transport/salesorder');
        } else {
            die('Something went wrong');
        }
    }

    public function statusadd($id){
        $torders = $this->model('Torders');

        $torder = $torders->getTorderByID($id);

        $status = $torder->status;

        switch ($status) {
            case 1:
                $newstatus = 2;
                break;
            case 2:
                $newstatus = 3;
                break;
            case 3:
                $newstatus = 4;
                break;
            case 4:
                $newstatus = 4;
                redirect('Transport/salesorder');
                break;
        }

        if ($torders->statusupdate($id,$newstatus)) {
            redirect('Transport/salesorder');
        } else {
            die('Something went wrong');
        }
    }
}


?>