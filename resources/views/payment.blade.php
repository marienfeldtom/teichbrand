<!DOCTYPE html style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css">
</head>
<body class="bg-gray-500 bg-no-repeat bg-center bg-cover" style="background-image: url('https://ellocamping.de/wp-content/uploads/2019/09/zelt.jpg')">

<div class="flex h-screen">
    <div class="m-auto">
        <div class="max-w-sm rounded overflow-hidden bg-white shadow-lg p-5">
            <img class="w-32 ml-auto mr-auto" src="https://media0.giphy.com/media/1wX5TJZPqVw3HhyDYn/giphy.gif">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Bezahlung</div>
                <p class="text-gray-700 text-base">
                  Moin {{$order->first_name}}! Um dein Ticket zu erhalten, überweise bitte folgenden Betrag auf eins dieser Konten: <br>
                Zusätlich haben wir dir eine Mail an {{$order->email}} mit den Bezahlinformationen geschickt.
                <h2 class="font-bold">Betrag:</h2>
                <ul class="list-disc">
                    @if($order->option=="weekend")<li>+30€ Full Weekend</li>
                   @else<li>5€ Tagesticket</li>
                    @endif
                    @if($order->tshirt != "Nein")
                    <li>+20€ T-Shirt</li>
                        @endif
                        <li class="font-bold" style="text-decoration: overline">={{$order->getPrice()}} €</li>
                </ul>
<h2 class="font-bold">an</h2>
                    <ul class="list-disc">
                        <li><u>Kontoinhaber:</u> Ole Ben Schmidt</li>
                        <li><u>IBAN:</u> DE96 2175 0000 0165 4293 74</li>
                        <li><u>BIC:</u> NOLADE21NOS</li>
                        <li><u>Betrag:</u> {{$order->getPrice()}}€</li>
                </ul>
                    </p>
            </div>
            <div class="px-6 py-4">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#bock</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#auf</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#feiern</span>
            </div>
        </div>

    </div>
</div>

</body>
</html>












