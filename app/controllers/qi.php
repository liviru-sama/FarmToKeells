<?php
require_once __DIR__ . '/../../vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Qi extends Controller
{
     
    public $adminModel;
    public $tmModel;
    public $qiModel;

  


    public function __construct() {
        $this->tmModel = $this->model('TmModel'); // Instantiate the CcmModel
        $this->qiModel = $this->model('QiModel');

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
                if ($this->qiModel->insertAdminCredentials($adminUsername, $hashedPassword, $email)) {
                    // Admin credentials inserted successfully
                    // You can redirect to a success page or perform other actions
                    $success_message = "QI credentials inserted successfully.</br> Now You can Login";
    
                    // Load the login view with success message
                    $this->view('qi/qi_login', ['success_message' => $success_message]);
                    exit;
                } else {
                    // Failed to insert admin credentials
                    // You can redirect to an error page or perform other actions
                    echo "Failed to insert admin credentials";
                }
            } else {
                // Load the view with errors
                $this->view('qi/qi_register', ['errors' => $errors]);
            }
        } else {
            // If not a POST request, load the registration form
            $this->view('qi/qi_register');
        }
    }
    

    public function qi_register() {
        // Load the view file
        $this->view('qi/qi_register');
    }
    
    
    public function qi_login()
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
                $loggedInAdmin = $this->qiModel->validateLogin($data['admin_username'], $data['admin_password']);
                if ($loggedInAdmin) {
                    // Start session if not already started
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
    
                    // Create session variables
                    $_SESSION['admin_id'] = $loggedInAdmin->admin_id;
                    $_SESSION['admin_username'] = $loggedInAdmin->admin_username;
    
                    // Redirect to tm dashboard or any desired page
                    redirect('qi/dashboard');                    exit;
                } else {
                    $data['admin_password_err'] = 'Incorrect username or password';
                    $this->view('qi/qi_login', $data);
                }
            } else {
                // Load view with errors
                $this->view('qi/qi_login', $data);
            }
        } else {
            // Load view
            $this->view('qi/qi_login');
        }
    }
    
    

    public function index(){
        if (!$this->isLoggedInccm()) {
            redirect('qi/qi_login');
        } else {
            $data = [
                'title' => ''
            ];
            $this->view('qi/dashboard', $data);
        }
    }
    
    public function dashboard(){
        if (!$this->isLoggedInadmin()) {
            redirect('qi/qi_login');
        } else {
            $data = [];
    
        $this->view('qi/dashboard', $data);
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
        redirect('qi/qi_login');
      }


      public function getUserInfo($user_id) {
        return $this->userModel->getUserInfoById($user_id);
    }

    
      public function salesorderapproved() {
        if (!$this->isLoggedInadmin()) {
            redirect('qi/qi_login');
        } else {// Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesordersapproved();
        
        // Load the view with purchase orders data
        $this->view('qi/salesorderapproved', $data);
    }}


    public function salesorderqualityapproved() {
        if (!$this->isLoggedInadmin()) {
            redirect('qi/qi_login');
        } else { // Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesordersqualityapproved();
        
        // Load the view with purchase orders data
        $this->view('qi/salesorderqualityapproved', $data);
    }}

    public function salesorderqualityrejected() {
        if (!$this->isLoggedInadmin()) {
            redirect('qi/qi_login');
        } else {// Instantiate Purchaseorder Model
        $salesorderModel = new Salesorder();
        
        // Get all purchase orders
        $data['salesorders'] = $salesorderModel->getAllSalesordersqualityrejected();
        
        // Load the view with purchase orders data
        $this->view('qi/salesorderqualityrejected', $data);
    }}

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Handle form submission
            $email = $_POST['email'];
    
            $admin = $this->qiModel->getQIByEmail($email);
            if ($admin) {
                $token = bin2hex(random_bytes(32));
    
                $adminId = $admin->admin_id;
                if ($this->qiModel->updateResetToken($adminId, $token)) {
                    // Send the password reset email
                    $resetPasswordLink = URLROOT . '/qi/resetPassword/' . $token;
    
                    $subject = 'Quality Inspector - Password Reset Link';
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
                        redirect('qi/forgotPassword');
    
                    } catch (Exception $e) {
                        die('Email sending failed: ' . $mail->ErrorInfo);
                    }
                } else {
                    //Email not found
                    flash('forgot_password_error', 'Email not found.');
                    redirect('qi/forgotPassword');
                }
            } else {
                // Email not found
                flash('forgot_password_error', 'Email not found.');
                redirect('qi/forgotPassword');
            }
        } else {
            // Render the view for the forgot password page
            $this->view('qi/forgotPassword');
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
    
                if ($this->qiModel->updatePasswordByResetToken($data['token'], $data['password'])) {
                    flash('reset_password_success', 'Password has been reset successfully.');
                    redirect('qi/qi_login');
                } else {
                    die('Error updating password.');
                }
            } else {
                $this->view('qi/resetPassword', $data);
            }
        } else {
            $admin = $this->qiModel->getQIByResetToken($token);
            if ($admin) {
                $data = [
                    'token' => $token,
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view('qi/resetPassword', $data);
            } else {
                flash('reset_password_error', 'Invalid or expired token.');
                redirect('qi/forgotPassword');
            }
        
    }
    }



}
