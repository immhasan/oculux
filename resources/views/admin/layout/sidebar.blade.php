
    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="index.html"><img src="{{asset('assets/images/icon.svg')}}" alt="Oculux Logo" class="img-fluid logo"><span>Oculux</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="{{asset('assets/images/user.png')}}" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Louis Pierce</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>
                    {{--         <li class="active open">
                                 <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>My Page</span></a>
                                 <ul>
                                     <li class="active"><a href="index.html">My Dashboard</a></li>
                                     <li><a href="index4.html">Web Analytics</a></li>
                                     <li><a href="index5.html">Event Monitoring</a></li>
                                     <li><a href="index6.html">Finance Performance</a></li>
                                     <li><a href="index7.html">Sales Monitoring</a></li>
                                     <li><a href="{{asset('hospital/index.html')}}">Hospital Management</a></li>
                                     <li><a href="index9.html">Campaign Monitoring</a></li>
                                     <li><a href="index10.html">University Analytics</a></li>
                                     <li><a href="index11.html">eCommerce Analytics</a></li>
                                 </ul>
                             </li>--}}
                    <li><a href="{{  url('/admin') }}"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ url('/admin/settings') }}"><i class="icon-settings"></i><span>Settings</span></a></li>

                    <li><a href="{{  url('/admin/roles') }}"><i class="icon-badge"></i><span>Roles</span></a></li>
                    <li><a href="{{  url('/admin/users') }}"><i class="icon-users"></i><span>Users</span></a></li>
                    <li><a href="{{  url('/admin/clients') }}"><i class="icon-users"></i><span>Clients</span></a></li>



                    <li><a href="{{ url('/admin/products') }}"><i class="icon-handbag"></i><span>Products</span></a></li>
                    <li><a href="{{ url('/admin/category') }}"><i class="icon-bar-chart"></i><span>Category</span></a></li>
                    <li><a href="{{ url('/admin/sub_category') }}"><i class="icon-bar-chart"></i><span>Sub Category</span></a></li>

                    <li><a href="{{ url('/admin/contacts') }}"><i class="icon-note"></i><span>Contacts</span></a></li>
                    <li><a href="{{ url('/admin/messages') }}"><i class="icon-speech"></i><span>Messages</span></a></li>
                    <li><a href="{{ url('/admin/newsletters') }}"><i class="icon-envelope"></i><span>Newsletter</span></a></li>
                  </ul>
            </nav>
        </div>
    </div>
