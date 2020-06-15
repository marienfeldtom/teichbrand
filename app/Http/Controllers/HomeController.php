<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller {


    public function index()
    {
        return view('home');
    }

public function payment($token)
{
    $order = Order::where('token', $token)->first();
    return view('payment')->with('order', $order);
}
}
