<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Mail\Ticket;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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

    public function export()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $reviews = Order::all();
        $columns = array('ID', 'Vorname', 'Nachname', 'E-Mail', 'T-Shirt', 'Adresse', 'Handynummer',);

        $callback = function() use ($reviews, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($reviews as $review) {
                fputcsv($file, array($review->id, $review->first_name, $review->last_name, $review->email, $review->tshirt, "", ""));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
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
            'cap' => 'required',
            'hat' => 'required',
            'lighter' => 'required',
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
