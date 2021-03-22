
<div class="header"  id="myHeader" style="background: linear-gradient(to right, #ff9b44 0%, #fc6075 100%);
    border-bottom: 1px solid transparent;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);color: white">

            <!-- Logo -->
            <div class="header-left">
                <a href="{{url('/home')}}" class="logo">
                    <img src="{{asset('img/ArSoftware..gif')}}" width="50" height="50" alt="" style=" background-size: cover;border-radius:100% ">
                </a>
            </div>
            <!-- /Logo -->

            <a id="toggle_btn" href="javascript:void(0);" >
                <i class="fa fa-bars " style="color: white"></i>
            </a>

            <!-- Header Title -->
            <div class="page-title-box">
                <h3 style="color:#fff;">{{env("APP_NAME")}}</h3>
            </div>
            <!-- /Header Title -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars" style="color: white"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">

                <!-- Search -->
                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                       </a>
                        <form action="search">
                            <input class="form-control" type="text" placeholder="Search here" >
                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <!-- /Search -->

                <!-- Flag -->
                <li class="nav-item dropdown has-arrow flag-nav" >
                    <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" >
                        <img src="{{asset('img/flags/sa.png')}}" alt="" height="20"> <span class="text-white" style="color:#fff;">العربيه</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="{{asset('img/flags/us.png')}}" alt="" height="16"> English
                        </a>

                    </div>
                </li>
                <!-- /Flag -->

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-bell-o text-white"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title ">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">

                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- Message Notifications -->
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fa fa-comment-o text-white"></i> <span class="badge badge-pill">8</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Messages</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">

                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="chat">View all Messages</a>
                        </div>
                    </div>
                </li>
                <!-- /Message Notifications -->

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="{{asset('img/profiles/avatar-21.jpg')}}" alt="">
                        <span class="status online"></span></span>
                        <span style="color:#fff;"> Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li class="nav-item menu-items">
                                <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <span class="menu-icon">
                                    <i class="mdi mdi-speedometer"></i>
                                </span>
                                <span class="menu-title">Logout</span>
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile">My Profile</a>
                    <a class="dropdown-item" href="settings">Settings</a>
                    <a class="dropdown-item" href="">Logout</a>
                </div>
            </div>
            <!-- /Mobile Menu -->

        </div>
