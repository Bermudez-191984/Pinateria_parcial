<aside class="main-sidebar sidebar-dark-primary elevation-5">
    <a class="brand-link" style="text-decoration: none;">
        <img src="{{asset('backend\dist\img\Logo1.jpeg')}}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MundoColor</span>
    </a>

    <!-- Sidebar -->
    < class="sidebar">


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item menu-open ">
                    <a href="{{ route('home') }}" class="nav-link active bg-danger">
                        <i class="fas fa-home"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                <li class="nav-item">
                    <!-- {if(id_rol==1){} -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Ventas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>Cliente</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{route('product.index')}}" class="nav-link">
                                <i class="fab fa-shopify"></i>
                                <p>Producto</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link">
                                <i class="fa fa-cart-plus"></i>
                                <p>Venta/Producto</p>
                            </a>

                        </li>



                    </ul>
        </nav>

        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open ">
                <li class="nav-item">
                     {if(id_rol==1){} 
                    <a href="#" class="nav-link">
                        <i class="far fa-user"></i>
                        <p>
                            Perfiles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>Administrador</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="{{route('product.index')}}" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>Cliente</p>
                            </a>
                        </li>

                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>Empleado</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>evento</p>
                            </a>
                        </li>
                    </ul>
        </nav>
        
        
        
        
        <!-- /.sidebar-menu -->
        
    </div>

    
     
    <!-- /.sidebar -->
</aside>