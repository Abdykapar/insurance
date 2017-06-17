<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>ОАО «Государственная Страховая Организация»</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <link href="{{ asset('/new/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('/new/css/mdb.css') }}" rel="stylesheet">

    <link href="{{ asset('/new/css/style.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body class="fixed-sn red-skin">
<div class="container">
    <nav class="navbar navbar-dark primary-color-dark mobile-nofixed">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-cloud"></i>+312 00 00 00
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-envelope"></i>admin@gmail.com
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right">

            <li class="nav-item ">
                <a class="nav-link"><span class="hidden-sm-down">Кыргызча</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link"><span class="hidden-sm-down">Русский</span></a>
            </li>
        </ul>
    </nav>
    <a href="{{ route('index') }}">
         <img class="img-fluid" src="/new/img/logo.jpg">
    </a>
    <nav class="navbar navbar-dark primary-color-dark">

        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container">

            <div class="collapse navbar-toggleable-xs" id="collapseEx">
                <a class="navbar-brand" href="{{ route('index') }}">Главная</a>
                <ul class="nav navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">О компании</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('partners') }}">Наши партнеры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agent') }}">Наши агенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedback') }}">Обратная Связь</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Контакты</a>
                    </li>
                </ul>
                <form class="form-inline" method="post" action="{{ route('search') }}">
                    {{ Form::Token() }}
                    <input class="form-control" type="text" placeholder="Искать" name="search" required>
                    <button type="submit" class="btn btn-primary btn-sm">Искать</button>
                </form>

            </div>

        </div>
    </nav>
</div>
<div class="container">
    @yield('breadcrumbs')
    @yield('body')
</div>
<footer class="page-footer center-on-small-only">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-1 offset-md-1">
            </div>
            <div class="col-md-8">
                <div class="collapse navbar-toggleable-xs">
                    <a class="navbar-brand" href="{{ route('index') }}">Главная</a>

                    <ul class="nav navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">О компании</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news') }}">Новости</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partners') }}">Наши партнеры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('agent') }}">Наши агенты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('feedback') }}">Обратная Связь</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Контакты</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>


    <hr>

    <div class="social-section">
        <ul>
            <li>
                    <a href="http://profiles.tazabek.kg/company:6/oao-gosudarstvennaya-strahovaya-organizaciya" target="_blank">
                        <div style="margin-bottom: 15px">
                        <img src="/image/akipress.png" class="img text-md-center" style="height: 45px; width: 200px;"  alt="АКИpress">

                        </div>
                    </a>
            </li>
            <li>
                <button type="button" class="btn btn-fb btn-primary">
                    <a href="https://www.facebook.com/groups/988335564573931/?fref=ts" target="_blank">
                        <i class="fa fa-facebook left"></i>
                        Facebook
                    </a>
                </button>
            </li>
        </ul>
    </div>
    <div class="footer-copyright">
        <div class="container-fluid">
            Разработан <a href="http://www.maxcom.kg" target="_blank">Maxcom</a>

        </div>
    </div>

</footer>
<script type="text/javascript" src="{{ asset('/new/js/jquery-3.1.1.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/new/js/tether.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/new/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/new/js/mdb.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/new/js/tether.min.js') }}"></script>
<script>

    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 42.8756715, lng: 74.6113764},
            zoom: 16
        });
    }

</script>
<script type="text/javascript" src="{{ asset('/new/js/jquery-2.2.3.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script src="/vue/vue.js"></script>
<script src="vue/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvpqpbi0n-Ah6C3qO9x3zEsjdWH4xqd60&callback=initMap" async defer></script>
</body>

</html>
