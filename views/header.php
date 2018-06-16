<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 21:21
 */


function print_st_link(){

    if(!empty($_SERVER['REQUEST_URI'])){
        $link_url=trim($_SERVER['REQUEST_URI'],'/');
    } else { $link_url= "";}

    $post_id = explode("/", $link_url);
    $lg = count($post_id );
    $stringUriID=$post_id[0]."/".(int)$post_id[$lg-1];

    echo $stringUriID;

    switch ($link_url){
        case "":        echo '<link href="../template/css/carousel.css" rel="stylesheet">';break;
        case "news":    echo '<link href="../template/css/jumbotron.css" rel="stylesheet">';break;
        case $stringUriID:    echo '<link href="../template/css/carousel.css" rel="stylesheet">';
                              echo '<link href="../template/css/my-style.css.css" rel="stylesheet">';
                              break;
        case "product": echo '<link href="../template/css/album.css" rel="stylesheet">';
                        echo '<link href="../template/css/font-awesome.min.css" rel="stylesheet">';
                        echo '<link href="../template/css/prettyPhoto.css" rel="stylesheet">';
                        echo '<link href="../template/css/price-range.css" rel="stylesheet">';
                        echo '<link href="../template/css/animate.css" rel="stylesheet">';
                        echo '<link href="../template/css/main.css" rel="stylesheet">';
                        echo '<link href="../template/css/responsive.css" rel="stylesheet">';
                        break;
    }
}

?>
<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.1/examples/album/ -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Album example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../template/css/bootstrap.min.css" rel="stylesheet">
    <!-- подключать на нужной стр -->

    <?php print_st_link(); ?>

    <link type="text/css" rel="stylesheet" charset="UTF-8" href="../template/css/translateelement.css">
    <link type="text/css" rel="stylesheet" charset="UTF-8" href="../template/css/my-style.css">
</head>

  <body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Carousel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Info</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>