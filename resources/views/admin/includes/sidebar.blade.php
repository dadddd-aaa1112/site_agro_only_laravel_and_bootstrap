<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <a href="{{route('admin')}}" class="brand-link">
        <span class="brand-text font-weight-light">Административная панель</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->

        <nav class="nav">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                @if(auth()->user()->role === 1)
                    <li class="nav-item">
                        <a href="{{route('admin.client.index')}}" class="nav-link d-flex align-items-center">

                            <ion-icon class="mr-2" name="walk-outline"></ion-icon>
                            <p>
                                Клиенты
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.user.index')}}" class="nav-link d-flex align-items-center">
                            <ion-icon class="mr-2" name="people-outline"></ion-icon>
                            <p>
                                Пользователи
                            </p>

                        </a>
                    </li>

                @endif
                <li class="nav-item">
                    <a href="{{route('admin.culture.index')}}" class="nav-link d-flex align-items-center">

                        <ion-icon class="mr-2" name="flower-outline"></ion-icon>
                        <p>
                            Культуры
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.fertilizer.index')}}" class="nav-link d-flex align-items-center">
                        <ion-icon class="mr-2" name="bug-outline"></ion-icon>

                        <p>
                            Удобрения
                        </p>
                    </a>
                </li>


                @if(auth()->user()->role == 1)
                    <li class="nav-item mt-5">
                        <a href="{{route('admin.import.index')}}" class="nav-link d-flex align-items-center">
                            <ion-icon class="mr-2" name="filter-circle-outline"></ion-icon>

                            <p class="text-white">
                                Импорты данных
                            </p>
                        </a>
                    </li>
                @endif


            </ul>
            <!-- /.sidebar-menu -->
        </nav>
    </div>

</aside>
