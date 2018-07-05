<?php include_once ROOT . '/views/header.php';
//var_dump($newsGallery);
?>
<main role="main">

<!--
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1" class=""></li>
          <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">Browse gallery</a></p>
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
-->
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

    <?php include_once ROOT . '/views/include/banner.php' ?>

      <div class="container marketing">

        <h2 class="featurette-heading"><?php echo $newsItem['title'] ?></h2>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <p class="lead " ><?php echo $newsItem['content'] ?></p>
              <div class = "flr">
                  <p>Автор: <?php echo $newsItem['autor_name'] ?></p>

                  <span>Дата публикации: <?php echo $newsItem['date'] ?></span>

              </div>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="../template/images/news/<?php echo $newsItem['preview'] ?>" alt="500x500" style="width: 500px; height: 500px;"  data-holder-rendered="true">
          </div>
        </div>
<?php if($newsItem['gallery'] != NULL): ?>

        <div class="row gallery">
            <div class="title_gallery">
                <h1 class="featurette-heading">
                    <span class="text-muted">Gallery</span>
                </h1>
            </div>
                <?php foreach ($newsGallery as $newsGList): ?>
        	        <div class="col-md-2"><img src="../template/images/news/<?php echo $newsGList ?>" class="image" alt=""></div>
        	    <?php endforeach; ?>
        </div>

<?php endif;?>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->



    </main>

<?php include_once ROOT . '/views/footer.php' ?>
        
