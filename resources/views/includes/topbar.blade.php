<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div style="background:#fff" class="topbar-left">
        <a href="{{ ('dashboard') }}" class="logo">
            <span>
                <img src="{{ asset('images/logoM.svg') }}" width="50px" heigth="50px">
            </span>
            <span style="color: #4d4d80; font-size:25px">
                Gest Espaço
            </span>
        </a>
    </div>
    <!--end logo-->

    <!-- Navbar -->
    <nav class="navbar-custom Cabecalho">    
        <ul class="list-unstyled topbar-nav float-right mb-0"> 
            <!--<li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="ti-bell noti-icon"></i>
                    <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                    <h6 class="dropdown-item-text">
                        Notifications (18)
                    </h6>
                    <div class="slimscroll notification-list">
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                        </a>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li>-->

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('images/users/user.jpg') }}" alt="profile-user" class="rounded-circle" /> 
                    <span class="ml-1 nav-user-name hidden-sm">{{Auth::user()->name}} - 
                        @if(Auth::user()->tipo==0) 
                            Administrador 
                        @elseif(Auth::user()->tipo==1)
                            Portaria 
                        @elseif(Auth::user()->tipo==2)
                            Secretaria Geral
                        @elseif(Auth::user()->tipo==3)
                            Secretaria Departamental
                        @endif
                    <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('logout') }}"><i class="ti-power-off text-muted mr-2"></i> Sair</a>
                </div>
            </li>
        </ul><!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">                        
            <li>
                <button class="button-menu-mobile nav-link waves-effect waves-light">
                    <i class="ti-menu nav-icon"></i>
                </button>
            </li>
            <!--<li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Pesquisar..." class="form-control">
                    <a href="#"><i class="ti-search"></i></a>
                </form>
            </li>-->
        </ul>
    </nav>
    <!-- end navbar-->
</div>
<!-- Top Bar End -->