<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MundoColor </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- Styles -->
    <style>
        * {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal;
        }

        body {
            margin: 0;
            line-height: inherit;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }

        .ml-4 {
            margin-left: 1rem;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mr-1 {
            margin-right: 0.25rem;
        }

        .flex {
            display: flex;
        }

        .inline-flex {
            display: inline-flex;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .text-center {
            text-align: center;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-gray-600 {
            color: rgb(75 85 99 / var(--tw-text-opacity));
        }

        .text-gray-900 {
            color: rgb(17 24 39 / var(--tw-text-opacity));
        }

        .text-red-500 {
            color: #ef4444;
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline;
        }

        body {
            background-color: white;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            position: relative;
            width: 8.56cm;
            height: 5.4cm;
            overflow: hidden;
            border-radius: 15px;
            filter: url(#natural-shadow-filter);
        }

        .border {
            position: absolute;
            width: 200%;
            height: 200%;
            top: 50%;
            left: 50%;
            transform-origin: center;
            transform: translate(-50%, -50%);
            animation: rotate 12s linear 1s infinite;
            background: conic-gradient(red, yellow, lime, aqua, blue, magenta, red);
        }

        @keyframes rotate {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .card-details {
            position: absolute;
            width: 8.06cm;
            height: 4.9cm;
            border-radius: 12px;
            z-index: 2;
            background-color: black;
            top: 50%;
            left: 50%;
            transform-origin: center;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            box-sizing: border-box;
            color: white;
        }

        .card-header {
            display: flex;
            align-items: center;
        }

        .card-info {
            display: flex;
            flex-direction: column;
        }

        .card-info>* {
            margin-bottom: 10px;
        }

        .custom-button {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid red;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-button:hover {
            background-color: red;
            color: white;
        }

        .custom-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 0, 0, 0.5);
        }

        .card-holder {
            text-align: center;
            /* Centra el texto horizontalmente */
            font-size: 1rem;
            /* Ajusta el tamaño de la fuente */
            font-weight: bold;
            /* Opcional: hace que el texto sea negrita */
            margin: 20px 0;
            /* Añade márgenes arriba y abajo */
        }
    </style>

</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/home') }}" class="custom-button font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
            <a href="{{ route('login') }}" class="custom-button font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="custom-button ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>


    <div class="container">
        <svg width="0" height="0" style="position:absolute;z-index:-1;">
            <filter id="natural-shadow-filter" x="-20%" y="-20%" width="160%" height="160%">
                <feOffset in="SourceGraphic" dx="3" dy="3" />
                <feGaussianBlur stdDeviation="12" result="blur" />
                <feMerge>
                    <feMergeNode in="blur" />
                    <feMergeNode in="SourceGraphic" />
                </feMerge>
            </filter>
        </svg>
        <div class="border"></div>
        <div class="card-details">
            <div class="card-header">
                <div class="card-logo">
                    <!-- <img src="https://blog.codepen.io/wp-content/uploads/2022/01/codepen-wordmark-display-inside-white@10x.png" width="100%"> -->
                </div>
                <div class="card-holder ">MundoColor</div>
            </div>
            <div class="card-info">
                <div class="card-tel">&#9990; +57 3142634596</div>
                <div class="card-email">&#9993; @piñateria_mundo_color</div>
                <div class="card-web">www.example.com</div>
            </div>
        </div>
    </div>



</body>




</html>