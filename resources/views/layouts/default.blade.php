<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Lang" content="nl">
    <meta name="author" content="R.F. Laan">
    <meta name="keywords" content="">
    <meta name="creation-date" content="03/22/2017">
    <meta name="revisit-after" content="60 days">
    <meta name="google" content="translate">
    <meta name="robots" content="noodp, noarchive">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>Forum</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('js/ckeditor/plugins/prism/lib/prism/prism_patched.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forum.css') }}">
</head>

<body>

<ul id="slide-out" class="side-nav">
    <li><div class="userView">
            @if(Auth::check())
            <div class="background">
                <img src="{{ asset('img/backgroundprofile.jpg') }}" style="height: 100%; width: 100%;">
            </div>
            <a href=""><img class="circle" src="/uploads/avatars/{{ Auth::user()->avatar }}"></a>
            <a href="#"><span class="white-text name">{{ Auth::user()->username }}@if(Auth::check() && Auth::user()->isAdmin())<i class="material-icons verified">verified_user</i>@elseif(Auth::check() && Auth::user()->isModerator())<i class="material-icons mod">supervisor_account</i>@endif</span></a>
            <span class="white-text email"></span>
            @endif
        </div></li>
    <li><a href="{{ url('user/profile') }}"><i class="material-icons">perm_identity</i>Profile</a></li>

    @if(Auth::check() && Auth::user()->isAdmin())
    <li><a href="{{ url('manage') }}"><i class="material-icons">comments</i>Manage</a></li>
    <li><a href="{{ url('theme/create') }}"><i class="material-icons">forum</i>New theme</a></li>
    @endif

    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="{{ url('user/settings') }}"><i class="material-icons">settings</i>Settings</a></li>
    <li><a class="waves-effect" href="{{ url('/logout') }}"><i class="material-icons">power_settings_new</i>Logout</a></li>
</ul>
<!--EIND SIDE NAV-->



<!--BEGIN NAVBAR-->
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="{{ route('home') }}" class="brand-logo">Forum</a>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    @if(Auth::guest())
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        <li><a href="{{ url('/login') }}">Sign in</a></li>
                    @else
                        <li><a class="dropdown-button" href="#" data-activates="dropdown1"><img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="circle" style="height: 32px;width: 32px;position: relative;right: 10px;top: 9px;">{{ Auth::user()->username }}<i class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="{{ route('showprofile', ['username' => Auth::user()->username]) }}"><i class="medium material-icons left">perm_identity</i>Profile</a></li>
                        @if(Auth::check() && Auth::user()->isAdmin() || Auth::user()->isModerator())
                            <li><a href="#"><i class="material-icons">comments</i>Manage</a></li>
                            <li><a href="{{ route('createtheme') }}"><i class="material-icons">forum</i>New theme</a></li>
                        @endif
                            <li class="divider"></li>
                            <li><a href="{{ url('user/settings') }}"><i class="medium material-icons left">settings</i>Settings</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="medium material-icons left">power_settings_new</i>Logout</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</div>

@yield('content')

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 m6">
                <h5 class="white-text">Forum</h5>
                <p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad asperiores atque, dolorem, esse expedita hic inventore laudantium libero numquam officia soluta suscipit vero voluptates? Blanditiis doloremque earum nihil non quae!</p>
            </div>
            <div class="col l4 offset-l2 m6">
                <h5 class="white-text">Social Media links</h5>
                <ul class="footer-links">
                    <li><a class="grey-text text-lighten-3" href="https://github.com/Rainieren">
                            <i class="fa fa-github footer-icon" aria-hidden="true"></i> Github</a>
                    </li>
                    <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/rainier.laan">
                            <i class="fa fa-facebook-square footer-icon" aria-hidden="true"></i> Facebook</a>
                    </li>
                    <li><a class="grey-text text-lighten-3" href="https://www.linkedin.com/in/rainier-laan-736ab4bb/">
                            <i class="fa fa-linkedin-square footer-icon" aria-hidden="true"></i> LinkedIn</a>
                    </li>
                    <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/rainier_laan/">
                            <i class="fa fa-instagram footer-icon" aria-hidden="true"></i> Instagram</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright" style="background-color: #37474f;">
        <div class="container">
            &copy; 2017 Rainier laan, All Rights Reserverd
            <a class="grey-text text-lighten-4 right" href="#modal1";>License Agreement</a>
        </div>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>License Agreement</h4>
            <p>Het promoten van deze website is ten trengste verboden en mag alleen gedaan worden met toestemming van de eigenaar.
                De foto's die gepost zijn op deze website O.A achtergrond foto's staat een licencie achter en mag alleen gebruikt worden met toestemming van de Autheur.
                Het posten van threads en comments is compleet gratis en mag gedaan worden zonder de <a href="">regels</a> te overtreden. </p>
            Wilt u de eigenaar bereiken en heeft u vragen. Email dan naar <br>
            <a href="">Rainier.laan@home.nl</a><br><br>
            Ik weet verder niet wat er in een License Agreement moet staan. Vandaar dit opvul verhaal. Doei
        </div>
        <div class="modal-footer">
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('js/ckeditor/plugins/prism/lib/prism/prism_patched.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/vue.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/forum.js') }}"></script>

@yield('scripts')


</body>
</html>


