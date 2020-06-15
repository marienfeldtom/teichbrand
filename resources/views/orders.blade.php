@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bestellungen</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Vorname</th>
                                    <th scope="col">Nachname</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Option</th>
                                    <th scope="col">T-Shirt?</th>
                                    <th scope="col">Bezahlt</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @foreach ($orders as $order)
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->first_name}}</td>
                                    <td>{{$order->last_name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->option}}</td>
                                    <td>{{$order->tshirt ? 'Ja' : 'Nein'}}</td>
                                    <td>{{$order->paid ? 'Ja' : 'Nein'}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
