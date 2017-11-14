@extends('layouts.app')

@section('content')
    <!-- Notifications area -->
    <section class="full-width container-notifications">
        <div class="full-width container-notifications-bg btn-Notification"></div>
        <section class="NotificationArea">
            <div class="full-width text-center NotificationArea-title tittles">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
            <a href="#" class="Notification" id="notifation-unread-1">
                <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle"></i>
                        <strong>New User Registration</strong> 
                        <br>
                        <small>Just Now</small>
                    </p>
                </div>
                <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification as UnRead</div> 
            </a>
            <a href="#" class="Notification" id="notifation-read-1">
                <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o"></i>
                        <strong>New Updates</strong> 
                        <br>
                        <small>30 Mins Ago</small>
                    </p>
                </div>
                <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-1">Notification as Read</div>
            </a>
            <a href="#" class="Notification" id="notifation-unread-2">
                <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle"></i>
                        <strong>Archive uploaded</strong> 
                        <br>
                        <small>31 Mins Ago</small>
                    </p>
                </div>
                <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-2">Notification as UnRead</div>
            </a> 
            <a href="#" class="Notification" id="notifation-read-2">
                <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o"></i>
                        <strong>New Mail</strong> 
                        <br>
                        <small>37 Mins Ago</small>
                    </p>
                </div>
                <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-2">Notification as Read</div>
            </a>
            <a href="#" class="Notification" id="notifation-read-3">
                <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
                <div class="Notification-text">
                    <p>
                        <i class="zmdi zmdi-circle-o"></i>
                        <strong>Folder delete</strong> 
                        <br>
                        <small>1 hours Ago</small>
                    </p>
                </div>
                <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-3">Notification as Read</div>
            </a>  
        </section>
    </section>
    <!-- navBar -->
    <div class="full-width navBar">
        <div class="full-width navBar-options">
            <i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>  
            <div class="mdl-tooltip" for="btn-menu">Menu</div>
            <nav class="navBar-options-list">
                <ul class="list-unstyle">
                    <li class="btn-Notification" id="notifications">
                        <i class="zmdi zmdi-notifications"></i>
                        <!-- <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> -->
                        <div class="mdl-tooltip" for="notifications">Notifications</div>
                    </li>
                    <li class="btn-exit" id="btn-exit">
                        <i class="zmdi zmdi-power"></i>
                        <div class="mdl-tooltip" for="btn-exit">LogOut</div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li class="text-condensedLight noLink" ><small>{{ Auth()->user()->firstname }}</small></li>
                    <li class="noLink">
                        <figure>
                            <img src="{{ asset('assets/img/avatar-male.png') }}" alt="Avatar" class="img-responsive">
                        </figure>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- navLateral -->
    <section class="full-width navLateral">
        <div class="full-width navLateral-bg btn-menu"></div>
        <div class="full-width navLateral-body">
            <div class="full-width navLateral-body-logo text-center tittles">
                <i class="zmdi zmdi-close btn-menu"></i> Inventorio 
            </div>
            <figure class="full-width" style="height: 77px;">
                <div class="navLateral-body-cl">
                    <img src="{{ asset('assets/img/avatar-male.png') }}" alt="Avatar" class="img-responsive">
                </div>
                <figcaption class="navLateral-body-cr hide-on-tablet">
                    <span>
                        {{ Auth()->user()->name }}<br>
                        <small>{{ Auth()->user()->role }}</small>
                    </span>
                </figcaption>
            </figure>
            <div class="full-width tittles navLateral-body-tittle-menu">
                <i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; DASHBOARD</span>
            </div>
            @include('menus/derecho')
        </div>
    </section>
    <!-- pageContent -->
    
    @if ($_SERVER['REQUEST_URI'] == '/home')        
        @include('menus.principales')
    @else
        @yield('desktop')
    
    @endif
@endsection
