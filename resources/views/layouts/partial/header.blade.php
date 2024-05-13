<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light  "
    style="background-color: #FFFFFF; padding-top: 10px; padding-bottom: 10px; ">
    <div class="container-fluid">
        <!-- Nuevo contenedor para los elementos del navbar -->

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-1 mr-2 d-flex align-items-center">
                <div class="image mr-2">
                    <i class="far fa-user fa-1x"></i>
                </div>
                <div class="info">
                    @if(Auth::check())
                    <p class="d-block text-dark fw-bold mb-0">{{ Auth::user()->name }}</p>
                    @endif
                </div>
            </div>

            <style>
            .small-image {
                width: 40px;
                /* Ajusta el tamaño según tus necesidades */
                height: auto;
                /* Mantiene la proporción original */
            }
            </style>
            <div class="image">
                <img src="{{asset('backend\dist\img\cerrar sesion.png')}}" role="button"
                    class="dropdown-item small-image" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                </img>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </ul>

    </div> <!-- Fin del contenedor fluido -->
</nav>
<!-- /.navbar -->