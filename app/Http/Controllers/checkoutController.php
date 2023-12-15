<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Post;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\user;

class checkoutController extends Controller
{
    //
    public function index(){

        $oldCartItems = Cart::where('user_id', Auth::id())->get();
        foreach($oldCartItems as $item){ //To delete a product from the cart & orders table when it is out of stock
            if(!Post::where('id', $item->post_id)->where('quantity','>=',$item->prod_qty)->exists()){

                $removeItem = Cart::where('user_id', Auth::id())->where('post_id', $item->post_id)->first();
                $removeItem->delete();
            }
        }

        $cartItems = Cart::where('user_id', Auth::id())->latest()->get();
        return view('checkout.index', compact('cartItems'));
    }

    //store checkout Order
    public function store(Request $request){

        $order = new Order();
        $order -> user_id = Auth::id();
        $order -> firstname = $request->input('firstname');
        $order -> lastname = $request->input('lastname');
        $order -> email = $request->input('email');
        $order -> phone = $request->input('phone');
        $order -> addressA = $request->input('addressA');
        $order -> addressB = $request->input('addressB');
        $order -> city = $request->input('city');
        $order -> state = $request->input('state');
        $order -> country = $request->input('country');
        $order -> pincode = $request->input('pincode');
        //to save product total
        $total = 0;
        $cartTotal = Cart::where('user_id', Auth::id())->latest()->get();
        foreach($cartTotal as $prod){
            $total += $prod->posts->discountPrice * $prod->prod_qty;
        }
        $order->total_price = $total;
        $order -> tracking_no = 'SH'.rand(1111,9999);
        $order->save();

        //taking ordered item form cart model to store OrederedItems in DB
        $cartItems = Cart::where('user_id', Auth::id())->latest()->get();
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'post_id' => $item->post_id,
                'quantity' => $item->prod_qty,
                'price' => $item->posts->discountPrice,
            ]);

            //To reduce the quantity from the available stock i.e when you are having just one product qty left in db and the placve an order the product will change to zero
            $prod = Post::where('id', $item->post_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_qty;
            $prod->update();

        }

        //To update the users table if the user is placing the order for the first time
        if(Auth::user()->addressA == Null){
            $user = User::where('id', Auth::id())->first();
            $user -> name = $request->input('firstname');
            $user -> lastname = $request->input('lastname');
            $user -> phone = $request->input('phone');
            $user -> addressA = $request->input('addressA');
            $user -> addressB = $request->input('addressB');
            $user -> city = $request->input('city');
            $user -> state = $request->input('state');
            $user -> country = $request->input('country');
            $user -> pincode = $request->input('pincode');
            $user->update();
        }

        //To clear the cart
        $cartItems = Cart::where('user_id', Auth::id())->latest()->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status', "Your order has been placed Successfully");
    }
}
