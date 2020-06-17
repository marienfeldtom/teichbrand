
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <style>
        html {
            height: 100%;
        }
        * {
            margin: 0;
            padding: 0;
        }

        body {
            /*You can use any kind of background here.*/
            background: transparent;
            overflow: hidden;
            height: 100%;
        }

        canvas {
            display: none;
            position: absolute;
            zindex: 1;
            pointer-events: none;
        }

        .buttonContainer {
            display: inline-block;
        }

        button {
            padding: 5px 10px;
            font-size: 20px;
        }

    </style>
</head>

<body class="antialiased text-gray-900  bg-no-repeat bg-center bg-cover" style="background-image: url(https://www.campstar.com/trends/wp-content/uploads/2019/05/krists-luhaers-582238-unsplash-1170x780.jpg)" >

<canvas id="canvas"></canvas>

<div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8 mx-auto">
    <div class="title">
        <h1 class="font-bold text-center">Teichbrand Ticket bestellen &#128525;</h1>
    </div>


    <div class="form mt-4">
        <div class="flex flex-col text-sm">
            <label for="first_name" class="font-bold mb-2">Vorname</label>
            <input id="first_name" name="first_name" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Gib deinen Vornamen ein">
        </div>

        <div class="flex flex-col text-sm">
            <label for="last_name" class="font-bold mb-2">Nachname</label>
            <input id="last_name" name="last_name" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Gib deinen Nachnamen ein">
        </div>

        <div class="flex flex-col text-sm">
            <label for="email" class="font-bold mb-2">E-Mail</label>
            <input id="email" name="email" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="email" placeholder="Gib deine E-Mail ein">
        </div>


    </div>
    <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
        <p class="w-1/2 mb-2 md:mb-0">Ticketoption </p>
        <select id="option" name="option" class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
            <option value="weekend">Wochenendticket</option>
            <option value="daily">Tagesticket</option>
        </select>
    </div>

    <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
        <p class="w-1/2 mb-2 md:mb-0">T-Shirt? (20€) <br><small>Shirt Entwurf:</small><button onclick="showTshirt()" type="button" class="btn btn-outline-primary"><svg class="bi bi-eye-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></button></p>
        <select id="tshirt" name="tshirt" class="w-full border border-gray-200 p-2 focus:outline-none focus:border-gray-500">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
            <option value="Nein">Kein T-Shirt</option>
        </select>
    </div>



    <div class="submit">
        <button onclick="createOrder()" class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Bestellen</button>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{!! asset('js/confetti.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function createOrder() {
    axios.post('/orders', {
        first_name: document.getElementById("first_name").value,
        last_name: document.getElementById("last_name").value,
        email: document.getElementById("email").value,
        option: document.getElementById("option").value,
        tshirt: document.getElementById("tshirt").value
    })
        .then(function (response) {
            console.log(response);
            document.getElementById("canvas").style.display = "block";
            Swal.fire({
                icon: 'success',
                title: 'Hurra, du bist dabei!',
                confirmButtonText: 'Zur Bezahlung',
                text: 'Deine Bestellung wurde aufgenommen!',
                allowOutsideClick: false
            }).then(function() {
                window.location.href = "/payment/"+ response.data.token;
            })
        })
        .catch(function (error) {
            console.log(error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anscheinend hast du etwas falsch ausgefüllt!',
            })
        });
    }

    function showTshirt(){
        Swal.fire({
            title: 'T<span class="text-xs" style="line-height: 4rem">eichbrand</span>-Shirt!',
            text: 'Zum richtigen Festivalerlebnis gehört auch das passende Outfit! (Quanta costa? 20 Euronen). T-Shirt fällt kleiner aus.',
            imageUrl: '/tshirt3.jpg',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'T-Shirt',
        })
    }

</script>
</body>
</html>


