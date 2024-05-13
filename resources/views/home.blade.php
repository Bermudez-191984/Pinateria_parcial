@extends('layouts.app')

@section('content')
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake rounded-circle" src="{{asset('backend/dist/img/iconohome.jpg')}}" height="250"
            width="250">
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
                Nuestra empresa inició en el año 2009, como una idea de negocio familiar, desde ahí hemos trabajado incanzablemente 
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos accusantium itaque amet ducimus, magni
                iure
                a repudiandae molestias nemo voluptatibus voluptas earum excepturi architecto, iusto necessitatibus
                sequi perferendis veritatis! Voluptatem?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos accusantium itaque amet ducimus, magni
                iure
                a repudiandae molestias nemo voluptatibus voluptas earum excepturi architecto, iusto necessitatibus
                sequi perferendis veritatis! Voluptatem?
            </p>
        </div>
    </div>

</div>
<style>
.rounded-circle {
    border-radius: 50%;
}

.preloader img {
    width: 250px;
    /* Ajusta el tamaño según lo necesites */
    height: 250px;
    /* Ajusta el tamaño según lo necesites */
}

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #FFFFFF;
    overflow-x: clip;
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
    box-shadow: 10px 10px 19px #1c1e22, -10px -10px 19px #262a2e;
    overflow: hidden;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.tabs li {
    background: rgb(36,0,34);
background: linear-gradient(90deg, rgba(36,0,34,1) 0%, rgba(168,141,166,1) 0%, rgba(174,92,175,1) 30%, rgba(216,86,188,1) 58%, rgba(214,60,175,1) 76%, rgba(212,37,164,1) 92%);
    width: 25%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
    font-family: "Poppins", sans-serif;
    transition: 0.5s;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -ms-transition: 0.5s;
    -o-transition: 0.5s;
    cursor: pointer;
}

.tabs li:hover {
    background: linear-gradient(145deg, #1e2024, #23272b);
    box-shadow: 10px 10px 19px #1c1e22, -10px -10px 19px #262a2e;
    color: #FFFFFF;
    position: relative;
    z-index: 1;
    border-radius: 10px;
}

.active {
    background: linear-gradient(145deg, #1e2024, #23272b);
    box-shadow: 10px 10px 19px #1c1e22, -10px -10px 19px #262a2e;
    color: #FFFFFF !important;
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
/* color donde va la inf */
.box {
    gap: 20px;
    background: rgb(36,0,34);
background: linear-gradient(90deg, rgba(36,0,34,1) 0%, rgba(168,141,166,1) 0%, rgba(174,92,175,1) 30%, rgba(216,86,188,1) 58%, rgba(214,60,175,1) 76%, rgba(212,37,164,1) 92%);
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    padding: 20px;
    width: 100%;
    animation: moving 1s ease;
    -webkit-animation: moving 1s ease;
}

.box img {
    width: 50%;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.box h3 {
    color: #FFFFFF;
    font-family: "Poppins", sans-serif;
    font-size: 2rem;
    margin-bottom: 20px;
}

.box p {
    color: #FFFFFF;
    opacity: 0.5;
    font-family: "Poppins", sans-serif;
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
        -webkit-transform: translateX(-50px);
        -moz-transform: translateX(-50px);
        -ms-transform: translateX(-50px);
        -o-transform: translateX(-50px);
        opacity: 0;
    }

    to {
        transform: translateX(0px);
        -webkit-transform: translateX(0px);
        -moz-transform: translateX(0px);
        -ms-transform: translateX(0px);
        -o-transform: translateX(0px);
        opacity: 1;
    }
}
</style>

<script>
"use strict";
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