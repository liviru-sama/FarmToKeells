
<?php

class InventoryHistory {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Method to fetch inventory history data for a given date range
    public function getInventoryHistoryByDateRangeAndProductName($startDate, $endDate, $productName) {
        // Prepare the SQL query with optional product name filter
        $sql = 'SELECT * FROM inventory_history WHERE change_date BETWEEN :start_date AND :end_date';
        if ($productName) {
            $sql .= ' AND product_name = :product_name';
        }
        $this->db->query($sql);
        
        // Bind parameters
        $this->db->bind(':start_date', $startDate);
        $this->db->bind(':end_date', $endDate);
        if ($productName) {
            $this->db->bind(':product_name', $productName);
        }
        
        // Execute query and return result set
        return $this->db->resultSet();
    }
    

   
    
    
}
