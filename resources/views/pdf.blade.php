<html>
<head>
    <style>
        body{height:297mm;width:210mm;}

        @media print{
            .bg-gray-200 {
                background-color:#EDF2F7!important;
            }
        }
    </style>
</head>
<body style="position: relative; height:100%;">
<img src="{{public_path('/headerpdf.png')}}">



    <div class="grid grid-cols-2 gap-4">
        <div style="padding: 10px;" class="bg-gray-200 m-5 p-2">
            <h2 class="text-red-500 font-bold text-2xl">{{$order->first_name}}'s <small>{{$order->option}}-</small>Ticket fürs Teichbrand</h2>
            <p class="m-4">Moin {{$order->first_name}}, wir hoffen du hast schon genau so viel Bock aufs Teichbrand wie wir! Wir haben eine kleine Packliste für dich zusammengestellt damit du nichts vergisst. Und ohne Regeln gehlt leider auch nicht alles. Wir freuen uns auf dich :-)</p>

            </div>
        <div style="padding: 10px;" class="bg-gray-200 m-5 p-2">
            <h2 class="text-red-500 font-bold text-2xl">Packliste</h2>
            <ul class="m-4 list-disc">
                <li>Zelt</li>
                <li>Verpflegung</li>
                <li>Getränke</li>
                <li>Klamotten</li>
                <li>Dein Ticket</li>
                <li>Gute Laune</li>
                <li>Keine Gäste</li>
                <li>...</li>

            </ul>
        </div>

</div>

    <div style="padding: 10px;" class="bg-gray-200 m-5 p-2">
        <h2 class="text-red-500 font-bold text-2xl">Regeln</h2>
        <p class="m-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
    </div>

<img style="margin-left: auto; margin-right: auto; margin-top: 50px; display: block;" class="bottom-0" src="data:image/png;base64,{{DNS1D::getBarcodePNG($order->token, 'EAN13')}}" alt="barcode"   />

    <img style="float:right; width: 400px;" src="{{public_path('/footerpdf.png')}}">
</body>
</html>


