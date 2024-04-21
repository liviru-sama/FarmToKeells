<?php
class PaymentDetailsModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function view_payment($id) {
        $this->db->query('SELECT * FROM paymentdetails WHERE user_id = :id');
        $this->db->bind(':id', $id);
        $data = $this->db->resultSet(); // Use resultSet() to fetch multiple rows
        return $data;
    }

    public function add_payment($data) {
        $this->db->query('INSERT INTO paymentdetails (user_id, bank_account_number, account_name, bank, branch) VALUES (:user_id, :bank_account_number, :account_name, :bank, :branch)');
        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':bank_account_number', $data['bank_account_number']);
        $this->db->bind(':account_name', $data['account_name']);
        $this->db->bind(':bank', $data['bank']);
        $this->db->bind(':branch', $data['branch']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getpayment($user_id) {
        $this->db->query('SELECT * FROM paymentdetails WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);

        return $this->db->single();
    }

    public function edit_payment($user_id, $data) {
        $this->db->query('UPDATE paymentdetails SET bank_account_number = :bank_account_number, account_name = :account_name, bank = :bank, branch = :branch WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':bank_account_number', $data['bank_account_number']);
        $this->db->bind(':account_name', $data['account_name']);
        $this->db->bind(':bank', $data['bank']);
        $this->db->bind(':branch', $data['branch']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
