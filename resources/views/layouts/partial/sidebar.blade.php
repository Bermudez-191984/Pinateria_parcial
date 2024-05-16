<aside class="main-sidebar sidebar-dark-primary elevation-5" style="background-color: #FADAF8; color: black;">
    <a class="brand-link" style="text-decoration: none;">
        <img src="{{asset('backend\dist\img\Logo1.jpeg')}}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light" style="color: black;">MundoColor</span>
    </a>

    <div class="sidebar">


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search"
                    style="background-color: white; color: black;">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                <li class="nav-item ">
                    <a href="{{ route('home') }}" class="nav-link active" style="background-color: #dd3675;">
                        <i class="fas fa-home"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                <li class="nav-item">
                    <a href="#" class="nav-link" style="color: black;">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Ventas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <!-- <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>Cliente</p>
                            </a>
                        </li> -->

                        <li class="nav-item">

                            <a href="{{route('product.index')}}" class="nav-link" style="color: black;">
                                <i class="fab fa-shopify"></i>
                                <p>Producto</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link" style="color: black;">
                                <i class="fa fa-cart-plus"></i>
                                <p>Venta/Producto</p>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" style="color: black;">
                        <i class="nav-icon fas far fa-user"></i>
                        <p>
                            Usuarios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link" style="color: black;">
                                <i class="far fa-user"></i>
                                <p>Administrador</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link" style="color: black;">
                                <i class="far fa-user"></i>
                                <p>Empleado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link" style="color: black;">
                                <i class="far fa-user"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                    </ul>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>