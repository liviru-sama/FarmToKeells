<?php
class CcmModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

   public function insertAdminCredentials($adminUsername, $hashedPassword, $email,$collectioncenter) {
    // Prepare the SQL query
    $this->db->query('INSERT INTO ccm (admin_username, admin_password, email,collectioncenter) VALUES (:adminUsername, :hashedPassword, :email,:collectioncenter)');

    // Bind the parameters
    $this->db->bind(':adminUsername', $adminUsername);
    $this->db->bind(':hashedPassword', $hashedPassword);
    $this->db->bind(':email', $email);
    $this->db->bind(':collectioncenter', $collectioncenter);


    // Execute the query
    if ($this->db->execute()) {
        return true; // Insert successful
    } else {
        // If there's an error, print it
        echo "Error: " . $this->db->error(); 
        return false; // Insert failed
    }
}


    public function validateLogin($adminUsername, $adminPassword) {
        $this->db->query('SELECT * FROM ccm WHERE admin_username = :adminUsername');
        $this->db->bind(':adminUsername', $adminUsername);
        $row = $this->db->single();

        if ($row) {
            $storedPassword = $row->admin_password;
            // Compare the user-provided password with the stored hashed password
            if (password_verify($adminPassword, $storedPassword)) {
                return $row; // Return the admin object
            }
        }
        return false; // Invalid username or password
    }

    public function getUsers($tableName) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function isEmailExists($email) {
        $this->db->query('SELECT  admin_id FROM ccm WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
    
        return $this->db->rowCount() > 0;
    }
    
    // Check if the username already exists in the database
    public function isUsernameExists($admin_username) {
        $this->db->query('SELECT  admin_id FROM ccm WHERE admin_username = :admin_username');
        $this->db->bind(':admin_username', $admin_username);
        $this->db->execute();
    
        return $this->db->rowCount() > 0;
    }

    public function updateResetToken($adminId, $token) {
        $this->db->query('UPDATE ccm SET reset_token = :token, reset_token_expire = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE admin_id = :adminId');
        $this->db->bind(':token', $token);
        $this->db->bind(':adminId', $adminId);
    
        return $this->db->execute();
    }
    
    public function updatePasswordByResetToken($token, $password) {
        $this->db->query('UPDATE ccm SET admin_password = :password, reset_token = NULL, reset_token_expire = NULL WHERE reset_token = :token');
        $this->db->bind(':password', $password);
        $this->db->bind(':token', $token);
    
        return $this->db->execute();
    }
    
    public function getCCMByEmail($email) {
        $this->db->query('SELECT * FROM ccm WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }
    
    public function getCCMByResetToken($token) {
        $this->db->query('SELECT * FROM ccm WHERE reset_token = :token AND reset_token_expire > NOW()');
        $this->db->bind(':token', $token);
        return $this->db->single();
    }
    
    
}
?>
