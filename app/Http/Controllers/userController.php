<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

class userController extends Controller
{
    //

    public function index(){

        $orders=Order::where('user_id', Auth::id())->latest()->get();
        return view('order.index', compact('orders'));
    }

    public function view($id){
        $orders=Order::where('id', $id)->where('user_id', Auth::id())->latest()->first();
        return view('order.view', compact('orders'));
    }
}
