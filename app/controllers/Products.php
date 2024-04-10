<?php
class Products extends Controller
{
    public $product;

    public function __construct(){
        $this->product = $this->model('Product');
    }

    public function getAllProducts(){
        return $this->product->getAllProducts();
    }

    public function fetchProductData() {
        // Call the existing method to fetch product data
        $products = $this->getAllProducts();
    
        // Prepare data in JSON format
        $productData = [];
        foreach ($products as $product) {
            $productData[] = [
                'name' => $product['name'],
                'quantity' => $product['quantity']
            ];
        }
    
        // Set response header to indicate JSON content
        header('Content-Type: application/json');
    
        // Output JSON data
        echo json_encode($productData);
    }
    

    
}
?>
