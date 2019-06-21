<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    public function getOrders() {
        $orders = Order::get();
        var_dump($orders->toArray());die;
    }
}
