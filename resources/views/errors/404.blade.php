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

</head><!--/head-->

<body>
<div class="container text-center">
    <div class="logo-404">
        <a href="{{ url('/') }}"><img src="{{ url('public/images/home/logo.png') }}" alt=""/></a>
    </div>
    <div class="content-404">
        <img src="{{ url('public/images/home/404.png') }}" class="img-responsive" alt=""/>
        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="{{ url('/') }}">Bring me back Home</a></h2>
    </div>
</div>

<script src="{{ url('public/user/js/jquery.js') }}"></script>
<script src="{{ url('public/user/js/price-range.js') }}"></script>
<script src="{{ url('public/user/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ url('public/user/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/user/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ url('public/user/js/main.js') }}"></script>
</body>
</html>