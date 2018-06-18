<?php include_once ROOT . '/views/header.php';
    $paramsPath = ROOT.'/config/config_site.php';
    $setting = include ($paramsPath);
?>

<?php //print_r($randId); ?>

<?php //var_dump($setting); ?>
    <main role="main">

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


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
          <div class="row featurette">
              <div class="col-md-7">
                  <a href="/product/<?php echo $latestProducts[$randId[0]]['id']?>"><h2 class="featurette-heading"><?php echo $latestProducts[$randId[0]]['name']?></h2></a>
                  <p class="lead"><?php $string = substr($latestProducts[$randId[0]]['description'], 0, 800); echo $string."..." ?></p>
              </div>
              <div class="col-md-5">
                  <img class="featurette-image img-fluid mx-auto" src="/template/images/shop/<?php echo $latestProducts[$randId[0]]['image']?>" alt="Generic placeholder image">
              </div>
          </div>

          <hr class="featurette-divider">

          <div class="row featurette">
              <div class="col-md-7 order-md-2">
                  <a href="/product/<?php echo $latestProducts[$randId[1]]['id']?>"><h2 class="featurette-heading"><?php echo $latestProducts[$randId[1]]['name']?></h2></a>
                  <p class="lead"><?php $string = substr($latestProducts[$randId[1]]['description'], 0, 800); echo $string."..." ?></p>
              </div>
              <div class="col-md-5 order-md-1">
                  <img class="featurette-image img-fluid mx-auto" src="/template/images/shop/<?php echo $latestProducts[$randId[1]]['image']?>" alt="Generic placeholder image">
              </div>
          </div>

          <hr class="featurette-divider">

          <div class="row featurette">
              <div class="col-md-7">
                  <a href="/product/<?php echo $latestProducts[$randId[2]]['id']?>"><h2 class="featurette-heading"><?php echo $latestProducts[$randId[2]]['name']?></h2></a>
                  <p class="lead"><?php $string = substr($latestProducts[$randId[2]]['description'], 0, 800); echo $string."..." ?> </p>
              </div>
              <div class="col-md-5">
                  <img class="featurette-image img-fluid mx-auto" src="/template/images/shop/<?php echo $latestProducts[$randId[2]]['image']?>" alt="Generic placeholder image">
              </div>
          </div>
        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
<?php include_once ROOT . '/views/footer.php' ?>