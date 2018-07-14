<?php
$title = new Functions();
$titleSite = $title->print_title();
$active = $title->print_url_link();
?>
<!DOCTYPE html>
<!-- saved from url=(0054)https://getbootstrap.com/docs/4.1/examples/dashboard/# -->
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/template/images/icons.png">

    <title><?php echo $titleSite."- TopShop"  ?></title>
    <!-- Bootstrap core CSS -->
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<body id="bg-body">
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

    <img src="/template/images/logo.png" class="animated slideInLeft" alt="logo" id="logo">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
           <h2 style="color: #dee2e6">Панель администрирования</h2>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar" id="nav-full">
            <div class="sidebar-sticky" style="margin-top: 2vw;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <i class="fas fa-home"></i>
                            В магазин <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/setting">
                            <i class="fas fa-cog"></i>
                            Настройки
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">
                            <i class="fas fa-cart-arrow-down"></i>
                            Заказы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/prod/create">
                            <i class="fas fa-plus"></i>
                            Добавить товар
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/cat">
                            <i class="fas fa-clipboard-list"></i>
                            Категориии
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/prod">
                            <i class="fas fa-box-open"></i>
                            Товары
                        </a>
                    </li>

                </ul>
            </div>
        </nav>