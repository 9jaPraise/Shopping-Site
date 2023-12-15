<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    //

    public function index(){
        $orders = Order::where('status', '0')->latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function view(order $order){
        return view('admin.order.view-order', compact('order'));
    }

    public function update(Request $request, order $order){
        $status = $request->input('order_status');
        $order->status = $status;
        $order->update();

        return redirect(route('order.index'))->with('status', 'Order has been Updated Successfully');
    }

    public function history(){
        $orders= Order::where('status', '1')->latest()->get();
        return view('admin.order.order-history', compact('orders'));
    }
}
