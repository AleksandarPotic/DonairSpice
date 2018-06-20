
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/profile.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@yield('Dashboard')"><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="@yield('Order') @yield('Fulfilled Orders') treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('Order')"><a href="{{ route('orders.index') }}"><i class="fa fa-circle-o"></i> Orders</a></li>
                    <li class="@yield('Fulfilled Orders')"><a href="{{ route('fulfilled_order.index') }}"><i class="fa fa-circle-o"></i> Fulfilled Orders</a></li>
                </ul>
            </li>

            <li class="@yield('Analytics')"><a href="{{ route('analytics.index') }}"><i class="fa fa-signal"></i> <span>Analytics</span></a></li>
            <li class="@yield('Products')"><a href="{{ route('products.index') }}"><i class="fa fa-folder-o"></i> <span>Products</span></a></li>
            <li class="@yield('Admins')"><a href="{{ route('admins.index') }}"><i class="fa fa-user"></i> <span>Admins</span></a></li>
            <li class="@yield('Customers')"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Customers</span></a></li>
            <li class="@yield('Coupons')"><a href="{{ route('coupons.index') }}"><i class="fa fa-ticket"></i> <span>Coupons</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>