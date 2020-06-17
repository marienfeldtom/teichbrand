<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Mail\Ticket;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders')->with('orders', Order::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'option' => 'required',
            'tshirt' => 'required'
        ]);
        $data = $request->all();

        do
        {
            $token = rand(111111111111,999999999999);
            $user_code = Order::where('token', $token)->get();
        }
        while(!$user_code->isEmpty());
        $data['token'] = $token;
        $order = Order::create($data);
        $to = [
            [
                'email' => $order->email,
                'name' => $order->first_name . ' ' . $order->last_name,
            ]
        ];
        Mail::to($to)->send(new OrderMail($order));

       return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function ship($token)
    {
        $order = Order::where('token', $token)->first();
        $to = [
            [
                'email' => $order->email,
                'name' => $order->first_name . ' ' . $order->last_name,
            ]
        ];
        Mail::to($to)->send(new Ticket($order));
        return redirect('/orders');
    }

    public function pdf($token)
    {
        $order = Order::where('token', $token)->first();
        return view('pdf')->with('order', $order);
    }

    public function ticket($token)
    {
        $order = Order::where('token', $token)->first();
        $data["order"] = $order;
        $pdf = PDF::loadView('pdf', $data);
        return $pdf->stream('document.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function paid(Order $order)
    {
      $order->paid = true;
      $order->save();
      return $this->ship($order->token);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/orders');
    }
}
