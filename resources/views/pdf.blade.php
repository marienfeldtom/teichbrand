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
        <div style="padding-left: 10px;" class="bg-gray-200 ml-5 p-2">
            <h2 class="text-red-500 font-bold text-2xl">{{$order->first_name}}'s <small>{{$order->option}}-</small>Ticket fürs Teichbrand</h2>
            <p class="m-4">Moin {{$order->first_name}}, wir hoffen du hast schon genau so viel Bock aufs Teichbrand wie wir! Wir haben eine kleine Packliste für dich zusammengestellt damit du nichts vergisst. Und ohne Regeln geht leider auch nicht alles. Wir freuen uns auf dich :-)</p>

            </div>
        <div style="padding-left: 10px;" class="bg-gray-200 ml-5 p-2">
            <h2 class="text-red-500 font-bold text-2xl">Packliste</h2>
            <ul class="m-4 list-disc">
                <li>Zelt</li>
                <li>Verpflegung</li>
                <li>Getränke</li>
                <li>Trink- und Waschwasser</li>
                <li>Schlafsack/Isomatte</li>
                <li>Kulturtasche</li>
                <li>Klamotten</li>
                <li>Dein Ticket</li>
                <li>Gute Laune</li>
                <li>Keine Gäste</li>

            </ul>
        </div>

</div>

    <div style="padding-left: 10px;" class="bg-gray-200 ml-5 p-2">
        <h2 class="text-red-500 font-bold text-2xl">Regeln</h2>
        <p class="m-4">Es wird nicht in den Wald gekackt und auch nicht in den See bzw. auf das Gelände gepinkelt. Gäste und Mundpropaganda sind verboten. Auch Social Media Stories o.Ä. sind untersagt. Kein Glas (vorher umfüllen), kein Feuer, keine Autos bzw. keine Parkplätze, kein Angeln. Keine eigene Musik, keine synthetischen Drogen.</p>
    </div>

<img style="margin-left: auto; margin-right: auto; margin-top: 50px; display: block;" class="bottom-0" src="data:image/png;base64,{{DNS1D::getBarcodePNG($order->token, 'EAN13')}}" alt="barcode"   />

    <img style="float:right; width: 400px;" src="{{public_path('/footerpdf.png')}}">
</body>
</html>


