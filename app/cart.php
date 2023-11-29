<?php
namespace App;

class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart)
    {
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }
    
    public function addCart($product, $id){
        $newproduct =
         [
            'quanty' => 0,
            'price'=> $product->price,
            'productInfo'=> $product
        ];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newproduct = $this->products[$id];
            }
        };

        $newproduct['quanty']++;
        $newproduct['price'] = $newproduct['quanty'] * $product->price;
        $this->products[$id] = $newproduct;
        $this->totalPrice += $product->price;
        $this->totalQuanty++;
    }
    public function DeleteItemCart ($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function UpdateItemCart ($id, $quanty){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
       
        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->price;

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
    }



    public function AddDetailCart($product, $id,$quanty){
        $newproduct =
         [
            'quanty' => 0,
            'price'=> $product->price,
            'productInfo'=> $product
        ];
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $newproduct = $this->products[$id];
            }
        };
        
        $newproduct['quanty'] += $quanty;
        $newproduct['price'] = $newproduct['quanty'] * $product->price;
        $this->products[$id] = $newproduct;
        $this->totalQuanty += $quanty;
        $this->totalPrice += $quanty * $product->price;
    }
};
?>


