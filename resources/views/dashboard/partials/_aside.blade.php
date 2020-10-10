<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
{{--                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image"--}}>
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" class="nav-link {{ Str::is('dashboard.index.*',Route::currentRouteName()) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>الرئيسية</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.users.index')}}" class="nav-link {{ Str::is('dashboard.users.*',Route::currentRouteName())? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>الاعضاء</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.roles.index')}}" class="nav-link {{ Str::is('dashboard.roles.*',Route::currentRouteName()) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>الصلاحيات</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.tables.index')}}" class="nav-link {{ Str::is('dashboard.tables.*',Route::currentRouteName()) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>الطاولات</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.categories.index')}}" class="nav-link {{ Str::is('dashboard.categories.*',Route::currentRouteName())? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>قوائم الطعام</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.meals.index')}}" class="nav-link {{ Str::is('dashboard.meals.*',Route::currentRouteName())? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>الوجبات</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.ourteams.index')}}" class="nav-link {{ Str::is('dashboard.ourteams.*',Route::currentRouteName()) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>فريق الطبخ</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('dashboard.aboutus.index')}}" class="nav-link {{ Str::is('dashboard.aboutus.*',Route::currentRouteName()) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>من نحن</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('dashboard.contactus.index')}}" class="nav-link {{ Str::is('dashboard.contactus.*',Route::currentRouteName()) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>اتصل بنا</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
