@extends('layouts.app')

@section('content')
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake rounded-circle" src="{{asset('backend/dist/img/iconohome.jpg')}}" height="250" width="250">
    </div>
</div>
<ul class="tabs">
    <li class="active" data-id="0">Historia</li>
    <li data-id="1">Mision</li>
    <li data-id="2">Vision</li>
    <li data-id="3">Contactos</li>

</ul>

<div class="contents">

    <div class="box show" data-content="0">
        <img src="{{asset('backend/dist/img/historia.png')}}" alt="">
        <div>
            <h3>HISTORIA</h3>
            <p>
                Nuestra empresa inició en el año 2009, como una idea de negocio familiar, desde ahí hemos trabajado
                incanzablemente
                por lograr nuestro objetivo, de brindarle a nuestros clientes la mejor experiencia.
            </p>
        </div>
    </div>

    <div class="box hide" data-content="1">
        <img src="{{asset('backend/dist/img/mision.png')}}" alt="">
        <div>
            <h3>MISION</h3>
            <p>
                Proporcionar a nuestros clientes productos y servicios que llenen de color y alegría sus celebraciones y
                haga de ellos un día inolvidable.
            </p>

        </div>
    </div>

    <div class="box hide" data-content="2">
        <img src="{{asset('backend/dist/img/vision.png')}}" alt="">
        <div>
            <h3>VISION</h3>
            <p>
                Ser reconocidos como el referente líder en la industria de la piñatería, destacándose por nuestra
                excelencia en la gestión del inventario y las ventas. Buscamos ser la primera opción para aquellos que
                desean celebrar eventos llenos de color y alegría, ofreciendo una amplia gama de productos innovadores y
                servicios personalizados.

            </p>
        </div>
    </div>

    <div class="box hide" data-content="3">
        <img src="{{asset('backend/dist/img/contacto.png')}}" alt="">
        <div>
            <h3>Contactos</h3>
            <p>
                +57 3142634586
            </p>
        </div>
    </div>


</div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

    :root {
        --color-primary: #FADAF8;
        --color-background: #FFF5F7;
        --color-text: #bf43ba;
        --color-accent1: #8FCFFF;
        --color-accent2: #8FCFFF;
        --color-border: #bf43ba;
    }

    .rounded-circle {
        border-radius: 50%;
    }

    .preloader img {
        width: 250px;
        height: 250px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: var(--color-background);
        overflow-x: clip;
        font-family: 'Poppins', sans-serif;
        color: var(--color-text);
    }

    ul {
        list-style: none;
    }

    .tabs {
        width: 80%;
        height: 100px;
        margin: auto;
        margin-top: 50px;
        display: flex;
        align-items: center;
        box-shadow: 3px 3px 9px var(--color-border), -3px -3px 9px #FFFFFF;
        overflow: hidden;
        border-radius: 10px;
    }

    .tabs li {
        background: var(--color-primary);
        width: 25%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-text);
        transition: 0.5s;
        cursor: pointer;
    }

    .tabs li:hover {
        background: linear-gradient(145deg, var(--color-primary), var(--color-accent1));
        box-shadow: 10px 10px 19px var(--color-border), -10px -10px 19px #262a2e;
        color: #FFFFFF;
        position: relative;
        z-index: 1;
        border-radius: 10px;
    }

    .active {
        background: linear-gradient(145deg, var(--color-primary), var(--color-accent2));
        box-shadow: 10px 10px 19px var(--color-border), -10px -10px 19px black;
        color: black!important;
        position: relative;
        z-index: 1;
        border-radius: 10px;
    }

    .contents {
        width: 80%;
        margin: auto;
        margin-top: 50px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 30px;
    }

    .box {
        gap: 20px;
        background: var(--color-primary);
        border-radius: 10px;
        padding: 20px;
        width: 100%;
        animation: moving 1s ease;
    }

    .box img {
        width: 50%;
        border-radius: 10px;
    }

    .box h3 {
        color: #bf43ba;
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .box p {
        color: black;
        opacity: 0.8;
        font-size: 1rem;
    }

    .show {
        display: flex;
    }

    .hide {
        display: none;
    }

    @keyframes moving {
        from {
            transform: translateX(-50px);
            opacity: 0;
        }

        to {
            transform: translateX(0px);
            opacity: 1;
        }
    }
</style>

<script>
    const tabs = document.querySelectorAll("[data-id]");
    const contents = document.querySelectorAll("[data-content]");
    let id = 0;

    tabs.forEach(function(tab) {
        tab.addEventListener("click", function() {
            tabs[id].classList.remove("active");
            tab.classList.add("active");
            id = tab.getAttribute("data-id");
            contents.forEach(function(box) {
                box.classList.add("hide");
                if (box.getAttribute("data-content") == id) {
                    box.classList.remove("hide");
                    box.classList.add("show");
                }
            });
        });
    });
</script>







@endsection