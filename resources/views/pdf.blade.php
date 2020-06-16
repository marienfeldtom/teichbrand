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
            <h2 class="text-red-500 font-bold text-2xl">Dein Ticket fürs Teichbrand</h2>
            <p class="m-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

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


