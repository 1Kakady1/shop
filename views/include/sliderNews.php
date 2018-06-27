<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 27.06.2018
 * Time: 14:23
 */

$paramsPath = ROOT.'/config/config_site.php';
$setting = include ($paramsPath);

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img class="first-slide" src="/template/images/news/<?php echo $newsList[$setting['news1']]['preview']?>" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1><?php echo $newsList[$setting['news1']]['short_content']?></h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="/news/<?php echo $newsList[$setting['news1']]['id']?>" role="button">Посмотреть</a></p>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img class="second-slide" src="/template/images/news/<?php echo $newsList[$setting['news2']]['preview']?>" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $newsList[$setting['news2']]['short_content']?></h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="/news/<?php echo $newsList[$setting['news2']]['id']?>" role="button">Посмотреть</a></p>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img class="third-slide" src="/template/images/news/<?php echo $newsList[$setting['news3']]['preview']?>" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-right">
                    <h1><?php echo $newsList[$setting['news3']]['short_content']?></h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="/news/<?php echo $newsList[$setting['news3']]['id']?>" role="button">Посмотреть</a></p>
                </div>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
