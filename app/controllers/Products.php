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

}