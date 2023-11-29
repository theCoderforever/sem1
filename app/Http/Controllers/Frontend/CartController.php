<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use  App\Cart;
class CartController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('frontend.cart.cart');

    }
    public function addcart(Request $req, $id){
        $product = Product::find($id);
        if($product != null){
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->addcart($product, $id);
            $req->session()->put('Cart', $newcart);
        }   
        return view('frontend.cart.cart_item');
        // dd(Session('Cart'));
        // return redirect()->route('about.index')->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    public function DeleteItemCart(Request $req, $id){
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->DeleteItemCart($id);
            
            if(Count($newcart->products) > 0){
                $req->session()->put('Cart', $newcart);
            }
            else{
                $req->session()->forget('Cart');
            }
        return view('frontend.cart.cart_item');
    }
 
    public function DeleteListItemCart(Request $req, $id){
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        
        if(Count($newcart->products) > 0){
            $req->session()->put('Cart', $newcart);
        }
        else{
            $req->session()->forget('Cart');
        }
        return view('frontend.cart.list_cart_item');
    }
    public function SaveListItemCart(Request $req, $id,$quanty){
        $oldcart = Session('Cart') ? Session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->UpdateItemCart($id,$quanty);
        $req->session()->put('Cart', $newcart);
        return view('frontend.cart.list_cart_item');
    }
    public function SaveAllListItemCart(Request $req){
        foreach($req->data as $item){
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->UpdateItemCart($item['key'],$item['value']);
            $req->session()->put('Cart', $newcart);
        }
    }
    public function RemoveAllListItemCart(Request $req){
        $req->session()->put('Cart', null);
    }
    
    public function AddDetailCart(Request $req, $id, $quanty){
        // dd("ksf");
        $product = Product::find($id);
        if($product != null){
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->AddDetailCart($product, $id, $quanty);
            $req->session()->put('Cart', $newcart);
        }   
        return view('frontend.cart.cart_item');
    }
}
