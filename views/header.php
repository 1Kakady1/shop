<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 21:21
 */
include_once ROOT.'/models/Functions.php';

$link_url = new Functions();
$linkUrl = $link_url->print_url_link();

$title = new Functions();
$titleSite = $title->print_title();
?>
<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.1/examples/album/ -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/template/images/icons.png">

    <title><?php echo $titleSite  ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- подключать на нужной стр -->
    <link href="/template/css/main.css" rel="stylesheet">
    <?php  if ( "product" == $linkUrl ) : ?>
        <link href="/template/css/album.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">
    <?php endif ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" charset="UTF-8" href="../template/css/translateelement.css">

</head>

  <body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <img src="/template/images/logo.png" alt="logo" id="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="#">Категория товаров</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/product">Все товары</a></li>
                            <?php  foreach ($cat as $catItem): ?>
                            <li> <a href="/product/cat/<?php echo $catItem['id'] ?>"><?php echo $catItem['name']; ?></a></li>
                            <?php endforeach;  ?>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>

                <div class="shop-menu  pull-right">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="#"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                        <li class="nav-item"><a href="#"><i class="fa fa-user"></i> Аккаунт</a></li>
                        <li class="nav-item"><a href="#"><i class="fa fa-lock"></i> Вход</a></li>
                    </ul>
                </div>

                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Введите что нужно найти" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                </form>
            </div>
        </nav>
    </header>