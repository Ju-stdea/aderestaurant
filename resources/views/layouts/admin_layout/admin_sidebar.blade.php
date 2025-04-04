<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/admin/dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">General</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Category</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><a href="{{ url('admin/add-edit-category') }}">Create Category</a></li>
                        <li><a href="{{ url('admin/categories') }}">All Categories</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bars"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><a href="{{ url('admin/add-edit-product') }}">Create Product</a></li>
                        <li><a href="{{ url('admin/products') }}">All Products</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>Orders</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        {{-- <li><a href="{{ url('admin/add-edit-order') }}">Create Order</a></li> --}}
                        <li><a href="{{ url('admin/orders') }}">All Orders</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Admins</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><a href="{{ url('admin/admins-subadmins') }}">Admins / Sub Admins</a></li>
                        {{-- <li><a href="{{ url('admin/update-admin-details') }}">Update Admin Details</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bullseye"></i>Coupons</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        <li><a href="{{ url('admin/add-edit-coupon') }}">Create Coupon</a></li>
                        <li><a href="{{ url('admin/coupons') }}">All Coupons</a></li>
                    </ul>
                </li>
                
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Customers</a>
                    <ul class="sub-menu children dropdown-menu">                            
                        {{-- <li><a href="{{ url('admin/add-edit-customer') }}">Create Customer</a></li> --}}
                        {{-- <li><a href="{{ url('admin/customers') }}">All Customer</a></li> --}}
                        <li><a href="{{ url('admin/guest-customers') }}">Guest Customer</a></li>
                        <li><a href="{{ url('admin/non-guest-customers') }}">Non Guest Customer</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list-alt"></i>Newsletters</a>
                    <ul class="sub-menu children dropdown-menu">  
                        <li><a href="{{ url('admin/newsletter-subscribers') }}">All Newsletter</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-indent"></i>Contacts</a>
                    <ul class="sub-menu children dropdown-menu">  
                        <li><a href="{{ url('admin/contacts') }}">All Contacts</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-columns"></i>Banner</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><a href="{{ url('admin/add-edit-banner') }}">Create Banner</a></li>
                        <li><a href="{{ url('admin/banners') }}">All Banners</a></li>
                    </ul>
                </li>
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Settings</a>
                    <ul class="sub-menu children dropdown-menu">  
                        <li><a href="{{ url('admin/update-password') }}">Update Password</a></li>
                        <li><a href="{{ url('admin/update-admin-details') }}">Update Admin Details</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>CMS/Blog</a>
                    <ul class="sub-menu children dropdown-menu">  
                        <li><a href="{{ url('admin/cms') }}">All Blogs</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>