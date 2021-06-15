<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        html {
            height: 100%;
        }

        * {
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        .gradient {
            background: linear-gradient(90deg, #B54B6E 10%, #FFB45A 90%);
        }

        body {
            /*You can use any kind of background here.*/
            background: transparent;
            overflow-x: hidden;
            height: 100%;
            background-attachment: fixed;
        }

        .toggle {
            margin: 0 0 0 2rem;
            position: relative;
            display: inline-block;
            width: 3rem;
            height: 1.7rem;
        }

        .toggle input {
            display: none;
        }

        .roundbutton {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            background-color: #33455e;
            display: block;
            transition: all 0.3s;
            border-radius: 3.4rem;
            cursor: pointer;
        }

        .roundbutton:before {
            position: absolute;
            content: "";
            height: 1.4rem;
            width: 1.4rem;
            border-radius: 100%;
            display: block;
            left: 0.1rem;
            bottom: 0.2rem;
            background-color: white;
            transition: all 0.3s;
        }

        input:checked+.roundbutton {
            background-color: green;
        }

        input:checked+.roundbutton:before {
            transform: translate(1.4rem, 0);
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

<body class="antialiased text-gray-900  bg-no-repeat bg-center bg-cover"
    style="background-image: url(https://www.campstar.com/trends/wp-content/uploads/2019/05/krists-luhaers-582238-unsplash-1170x780.jpg)">

    <canvas id="canvas"></canvas>




    <div class="card bg-white xl:w-2/3 w-10/12 p-10 md:rounded-lg my-8 mx-auto">
        <div class="title">
            <h1 class="font-bold text-center">Teichbrand Ticket bestellen &#128525;</h1>
        </div>


        <div class="form mt-4">
            <div class="flex flex-col text-sm">
                <label for="first_name" class="font-bold mb-2">Vorname</label>
                <input onchange="updateValue()" id="first_name" name="first_name"
                    class=" appearance-none border border-gray-600 p-2 focus:outline-none focus:border-gray-800"
                    type="text" placeholder="Gib deinen Vornamen ein">
            </div>

            <div class="flex flex-col text-sm">
                <label for="last_name" class="font-bold mb-2">Nachname</label>
                <input onchange="updateValue()" id="last_name" name="last_name"
                    class=" appearance-none border border-gray-600 p-2 focus:outline-none focus:border-gray-800"
                    type="text" placeholder="Gib deinen Nachnamen ein">
            </div>

            <div class="flex flex-col text-sm">
                <label for="email" class="font-bold mb-2">E-Mail</label>
                <input onchange="updateValue()" id="email" name="email"
                    class=" appearance-none border border-gray-600 p-2 focus:outline-none focus:border-gray-800"
                    type="email" placeholder="Gib deine E-Mail ein">
            </div>


        </div>
        <div class="options md:flex md:space-x-6 text-sm items-center text-gray-700 mt-4">
            <p class="w-1/2 mb-2 md:mb-0">Ticketoption </p>
            <select onchange="updateValue()" id="option" name="option"
                class="w-full border border-gray-600 p-2 focus:outline-none focus:border-gray-800">
                <option value="weekend">Wochenendticket</option>
                <option value="daily">Tagesticket</option>
            </select>
        </div>
        <h2 class="w-full my-2 mt-3 text-2xl font-bold underline leading-tight text-center text-gray-800">Merch:</h2>
        <div class="grid mt-8 gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
            <div class="flex flex-col ">
                <div class="bg-white shadow-md  rounded-3xl p-4">
                    <div class="flex-none lg:flex">
                        <div class=" h-full w-full lg:h-48 lg:w-64   lg:mb-0 mb-3">
                            <img src="/tshirt_2021.png" alt="Just a flower"
                                class=" w-full  object-scale-down lg:object-contain  lg:h-48 rounded-2xl">
                        </div>
                        <div class="flex-auto ml-3 justify-evenly py-2">
                            <div class="flex flex-wrap ">
                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                    "Was zieh ich an!?"
                                </div>
                                <h2 class="flex-auto text-lg font-medium">Turbulentes T-Shirt</h2>
                            </div>
                            <p class="mt-3"></p>
                            <div class="flex py-4  text-sm text-gray-600">
                                <div class="flex-1 inline-flex items-center">
                                    <div class="flex py-4  text-sm text-gray-600">
                                        <div class="flex-1 inline-flex items-center">
                                            <i class="fas fa-tags"></i>
                                            <p class="ml-2"> 20,- €</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <label for="tshirt" class="mr-1">T-Shirt?: </label>
                                <select onchange="updateValue()" id="tshirt" name="tshirt"
                                    class="border rounded-lg border-gray-600 p-2 focus:outline-none focus:border-gray-800">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L" selected>L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="Nein">Kein T-Shirt</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col ">
                <div class="bg-white shadow-md  rounded-3xl p-4">
                    <div class="flex-none lg:flex">
                        <div class=" h-full w-full lg:h-48 lg:w-64   lg:mb-0 mb-3">
                            <img src="/feuerzeug.JPG"
                                class=" w-full  object-scale-down lg:object-contain  lg:h-48 rounded-2xl">
                        </div>
                        <div class="flex-auto ml-3 justify-evenly py-2">
                            <div class="flex flex-wrap ">
                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                    Lungenbrötchen?
                                </div>
                                <h2 class="flex-auto text-lg font-medium">Elegantes Elektrofeuerzeug</h2>
                            </div>
                            <p class="mt-3"></p>
                            <div class="flex py-4  text-sm text-gray-600">
                                <div class="flex-1 inline-flex items-center">
                                    <div class="flex py-4  text-sm text-gray-600">
                                        <div class="flex-1 inline-flex items-center">
                                            <i class="fas fa-tags"></i>
                                            <p class="ml-2"> 2,- €</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <label for="lighter" class="mr-1">Anzahl Feuerzeuge: </label>
                                <select onchange="updateValue()" id="lighter" name="lighter"
                                    class="border border-gray-600 p-2 rounded-lg focus:outline-none focus:border-gray-800">
                                       <option value="0">0</option>
            @for ($i = 1; $i < 11; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col ">
                <div class="bg-white shadow-md  rounded-3xl p-4">
                    <div class="flex-none lg:flex">
                        <div class=" h-full w-full lg:h-48 lg:w-64   lg:mb-0 mb-3">
                            <img src="/fischerhut.JPG" alt="Just a flower"
                                class=" w-full  object-scale-down lg:object-contain  lg:h-48 rounded-2xl">
                        </div>
                        <div class="flex-auto ml-3 justify-evenly py-2">
                            <div class="flex flex-wrap ">
                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                    Leidenschaftlicher Angler?
                                </div>
                                <h2 class="flex-auto text-lg font-medium">Flotter Fischerhut</h2>
                            </div>
                            <p class="mt-3 text-sm">(Farbe/Design kann stark abweichen)</p>
                            <div class="flex py-4  text-sm text-gray-600">
                                <div class="flex-1 inline-flex items-center">
                                    <div class="flex py-4  text-sm text-gray-600">
                                        <div class="flex-1 inline-flex items-center">
                                            <i class="fas fa-tags"></i>
                                            <p class="ml-2"> 13,- €</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <label for="hat" class="mr-1">Fischerhut? </label>
                                <select onchange="updateValue()" id="hat" name="hat"
                                    class="border border-gray-600 p-2 rounded-lg focus:outline-none focus:border-gray-800">
                                    <option value="Ja">Ja</option>
                                    <option value="Nein" selected>Nein</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col ">
                <div class="bg-white shadow-md  rounded-3xl p-4">
                    <div class="flex-none lg:flex">
                        <div class=" h-full w-full lg:h-48 lg:w-64   lg:mb-0 mb-3">
                            <img src="/cappy.JPG" alt="Just a flower"
                                class=" w-full  object-scale-down lg:object-contain  lg:h-48 rounded-2xl">
                        </div>
                        <div class="flex-auto ml-3 justify-evenly py-2">
                            <div class="flex flex-wrap ">
                                <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                    Für die Checker
                                </div>
                                <h2 class="flex-auto text-lg font-medium">Charmante Cap</h2>
                            </div>
                            <p class="mt-3 text-sm">(Farbe/Design kann stark abweichen)</p>
                            <div class="flex py-4  text-sm text-gray-600">
                                <div class="flex-1 inline-flex items-center">
                                    <div class="flex py-4  text-sm text-gray-600">
                                        <div class="flex-1 inline-flex items-center">
                                            <i class="fas fa-tags"></i>
                                            <p class="ml-2"> 18€</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <label for="cap" class="mr-1">Cap? </label>
                                <select onchange="updateValue()" id="cap" name="cap"
                                    class="border border-gray-600 p-2 rounded-lg focus:outline-none focus:border-gray-800">
                                    <option value="Ja">Ja</option>
                                    <option value="Nein" selected>Nein</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="submit">
            <button onclick="createOrder()" id="bestellen"
                class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Bestellen</button>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://teichbrand.beugelbuddel.de/js/confetti.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"
        integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        function createOrder() {
            axios.post('/orders', {
                first_name: document.getElementById("first_name").value,
                last_name: document.getElementById("last_name").value,
                email: document.getElementById("email").value,
                option: document.getElementById("option").value,
                cap: document.getElementById("cap").value,
                hat: document.getElementById("hat").value,
                lighter: document.getElementById("lighter").value,
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
                    }).then(function () {
                        window.location.href = "/payment/" + response.data.token;
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

        function showTshirt() {
            Swal.fire({
                title: 'T<span class="text-xs" style="line-height: 4rem">eichbrand</span>-Shirt!',
                text: 'Zum richtigen Festivalerlebnis gehört auch das passende Outfit! (Quanta costa? 20 Euronen). T-Shirt fällt kleiner aus.',
                imageUrl: '/tshirt3.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'T-Shirt',
            })
        }

        function updateValue() {
            console.log("test");
            var inputButton = document.getElementById("bestellen");
            var value = 0;
            var option = document.getElementById("option").value;
            var cap = document.getElementById("cap").value;
            var hat = document.getElementById("hat").value;
            var lighter = document.getElementById("lighter").value;
            var tshirt = document.getElementById("tshirt").value;

            if(option=="weekend") {
                value += 30;
            }
            if(option=="daily") {
                value += 10;
            }
            if(hat=="Ja") {
                value += 13;
            }
            if(tshirt!="Nein") {
                value += 20;
            }
            if(cap=="Ja") {
                value += 18;
            }
            if(lighter!=0) {
                value += lighter*2;
            }


            inputButton.innerHTML= "Bestellen (" +  value + "€)";
        }
    </script>
</body>

</html>