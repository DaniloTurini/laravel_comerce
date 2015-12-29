<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{

    private $orders;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->paginate(8);

        return view('admin.orders.index', compact('orders'));
    }

    public function update($id, Request $request)
    {
        $order = $this->order->find($id);

        if ($order->status == 0){
            $order->status = 1;
        } else {
            $order->status = 0;
        }

        $order->save();

        return redirect()->route('admin.orders.index');
    }


}
