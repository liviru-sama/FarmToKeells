
<?php

class InventoryHistory {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to fetch inventory history data for a given date range
    public function getInventoryHistoryByDateRange($startDate, $endDate) {
        $this->db->query('SELECT * FROM inventory_history WHERE change_date BETWEEN :start_date AND :end_date');
        $this->db->bind(':start_date', $startDate);
        $this->db->bind(':end_date', $endDate);
        return $this->db->resultSet();
    }

   
    
    
}
