<?php
class Admins extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    // public function login()
    // {
    //     // Check for POST
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Process form
    
    //         // Sanitize POST data    
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    //         // Init data
    //         $data = [
    //             'username' => trim($_POST['username']),
    //             'password' => trim($_POST['password']),
    //             'username_err' => '',
    //             'password_err' => '',
    //         ];
    
    //         // Validate Username
    //         if (empty($data['username'])) {
    //             $data['username_err'] = 'Please enter username';
    //         }
    //         // Validate Password
    //         if (empty($data['password'])) {
    //             $data['password_err'] = 'Please enter password';
    //         }
    
    //         //CHECK FOR ADMIN
    //         if ($this->adminModel->findAdminByUsername($data['username'])) {
    //             //ADMIN FOUND
    //         } else {
    //             //ADMIN NOT FOUND
    //             $data['username_err'] = 'No admin found';
    //         }
    
    //         // Make sure errors are empty
    //         if (empty($data['username_err']) && empty($data['password_err'])) {
    //             // Validated
    //             // Check and set logged in admin
    //             $loggedInAdmin = $this->adminModel->login($data['username'], $data['password']);
    
    //             if ($loggedInAdmin) {
    //                 // Create Session or do whatever actions are needed for admin login
    //                 // For example, setting up admin session, redirecting to admin dashboard, etc.
    //                 $_SESSION['admin_id'] = $loggedInAdmin->admin_id; // Assuming you have an admin_id in your admin table
    //                 $_SESSION['admin_username'] = $loggedInAdmin->admin_username; // Assuming you have an admin_username in your admin table
    //                 header("Location: " . URLROOT . "/admins/dashboard");
    //                 exit();
    //             } else {
    //                 $data['password_err'] = 'Incorrect Password ';
    //                 $this->view('admins/admin_login', $data);
    //             }
    //         } else {
    //             // Load view with errors
    //             $this->view('admins/admin_login', $data);
    //         }
    //     } else {
    //         // Init data
    //         $data = [
    //             'username' => '',
    //             'password' => '',
    //             'username_err' => '',
    //             'password_err' => '',
    //         ];
    
    //         // Load view
    //         $this->view('admins/admin_login', $data);
    //     }
    // }
    public function index()
    {
        
       header("Location: " . URLROOT . "/admins/place_order");
       exit();
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
    
            // Sanitize POST data    
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => '',
            ];
    
            // Validate Username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
    
            //CHECK FOR ADMIN
            $admin = $this->adminModel->findAdminByUsername($data['username']);
            if ($admin) {
                // Admin found
                if ($admin->admin_password === $data['password']) {
                    // Password verification successful
                    $_SESSION['admin_id'] = $admin->admin_id;
                    $_SESSION['admin_username'] = $admin->admin_username;
                    header("Location: " . URLROOT . "/admins/dashboard");
                    exit();
                } else {
                    // Password verification failed
                    $data['password_err'] = 'Incorrect Password';
                    $this->view('admins/admin_login', $data);
                }
            } else {
                // Admin not found
                $data['username_err'] = 'No admin found';
                $this->view('admins/admin_login', $data);
            }
        } else {
            // Load view
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
            $this->view('admins/admin_login', $data);
        }
    }
    
    public function dashboard()
    {
        $this->view('admins/dashboard');
    }
    
    /*---------------------------------*/
    
    public function commonlogin(){
        $data = [];

        $this->view('admin/commonlogin', $data);
    }
    public function edit_purchaseorder(){
        $data = [];
    
        $this->view('admin/edit_purchaseorder', $data);
    }
//     public function login()
// {
//     $data = [];

//     $this->view('admin/login', $data);
// }

    

public function notifications(){
$data = [];

$this->view('admin/notifications', $data);
}
public function place_order(){
$data = [];

$this->view('admin/place_order', $data);
}
public function stock_overview(){
 $data = [];

 $this->view('admin/stock_overview', $data);
 }
 public function view_inquiries(){
    $data = [];

    $this->view('admin/view_inquiries', $data);
    }
    public function view_purchaseorder(){
        $data = [];
    
        $this->view('admin/view_purchaseorder', $data);
        }
    }


    
    

?>
