<?php
class Cart {

public function add(Product $product){
    $inCart = false;
    $this->setTotal($product);

    if(count($this->getCart()) > 0){
        foreach($this->getCart() as $productInCart){
            if($productInCart->getProductId() === $product->getProductId()){
                $quantity = $productInCart->getQuantity() + $product->getQuantity();
                $productInCart->setQuantity($quantity);
                $inCart = true;
                break;
            }
        }
    }

    if(!$inCart){
        $this->setProductsinCart($product);
    }
}

private function setProductsinCart($product){
    $_SESSION['cart']['products'][] = $product;
}

private function setTotal(Product $product){
    $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity(); //mudar aqui pois está sempre somando
}

public function remove(int $id) {
    $product = $this->getProductById($id);

    if ($product) {
        $quantity = $product->getQuantity();
        print_r($quantity);
        $this->setTotal($product, -$quantity);

        // Remova o produto do carrinho
        unset($_SESSION['cart']['products'][$id]);
    }
}

private function getProductById(int $id) {
    $products = $this->getCart();
    return $products[$id] ?? null;
}


public function getCart(){
    return $_SESSION['cart']['products'] ?? [];
}

public function getTotal(){
    return $_SESSION['cart']['total'] ?? 0;
}
}
