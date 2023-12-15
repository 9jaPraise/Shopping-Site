<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    //

    public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()){//To check if the user is logged in or not
            $prod_check = Post::where('id', $product_id)->first(); //To check if the product Id exist

            if($prod_check){ //To check if a product has be added to cart already
                if(Cart::where('post_id',$product_id)->where('user_id', Auth::id())->exists()){ //it checks if the product with the user id already exist
                    return response()->json(['status'=> $prod_check->title." Already Added to Cart Successfully"]);
                }else{
                    $cartItem = new Cart();
                    $cartItem->post_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();

                    return response()->json(['status'=>$prod_check->title." Added to cart Successfully"]);
                }
            }
        }else{
            return response()->json(['status' => 'Login to Continue']);
        }
    }

    public function view(){
        $cartItems=Cart::where('user_id', Auth::id())->latest()->get();
        return view('productPosts.view-cart', compact('cartItems'));
    }

    public function updateCart(Request $request){
        $post_id = $request->input('post_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check()){
          if(Cart::where('post_id',$post_id)->where('user_id', Auth::id())->exists()){

              $cart = Cart::where('post_id',$post_id)->where('user_id', Auth::id())->first();
              $cart->prod_qty = $product_qty;
              $cart->update();
              return response()->json(['status' => 'Qunatity Successfully Update']);

          }

        }

      }

    public function deleteCart(Request $request){

        if(Auth::check()){
            $post_id = $request->input('post_id');
            if(Cart::where('post_id',$post_id)->where('user_id', Auth::id())->exists()){

                $cart = Cart::where('post_id',$post_id)->where('user_id', Auth::id())->first();
                $cart->delete();
                return response()->json(['status' => 'Product Successfully Deleted']);
            }

        }else{
           return response()->json(['status'=> 'Login to Continue']);
        }

    }

}
