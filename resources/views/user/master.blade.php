<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
    <link href="{{ url('public/user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('public/user/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    @include('user.block.header')
</header>

<section id="advertisement">
    <div class="container">
        <img src="{{ url('public/images/shop/advertisement.jpg') }}" alt=""/>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('user.block.leftslidebar')
            </div>

            <div class="col-sm-9 padding-right">
                @yield('content')
            </div>
        </div>
</section>

<footer id="footer"><!--Footer-->



</footer><!--/Footer-->


<script src="{{ url('public/user/js/jquery.js') }}"></script>
<script src="{{ url('public/user/js/price-range.js') }}"></script>
<script src="{{ url('public/user/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ url('public/user/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/user/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ url('public/user/js/main.js') }}"></script>
</body>
</html>