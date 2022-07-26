
<aside class="main-sidebar sidebar-dark-primary elevation-4">




    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->


        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin.client.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Clients
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.culture.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Cultures
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.fertilizer.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Fertilizers
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </div>

</aside>
