<?php
class Product {
    private $productId;
    private $name;
    private $price;
    private $quantity;

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    // Métodos Getters
    public function getProductId() {
        return $this->productId;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->quantity;
    }
}
