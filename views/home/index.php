<?php include_once ROOT . '/views/header.php'; ?>

    <main role="main">

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
                <h1><?php echo $newsList[0]['title']?></h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1><?php echo $newsList[1]['title']?></h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1><?php echo $newsList[2]['title']?></h1>
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


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

         <?php $i=0; foreach ($latestProducts as $product): ?>
            <?php if( $i < 3) { $product_sub = substr($product['description'], 0, 802);?>
                <div class="row featurette">

                  <?php if($i == 1) { ?>
                      <div class="col-md-5">
                          <img class="featurette-image img-fluid mx-auto" src="/template/images/shop/<?php echo $product['image']?>" alt="500x500" style="width: 500px; height: 500px;"  data-holder-rendered="true">
                      </div>
                    <div class="col-md-7">
                      <a href="/product/<?php echo $product['id']?>"><h2 class="featurette-heading"><?php echo $product['name']?></a></h2>
                    <p class="lead"><?php echo $product_sub.'.....';?></p>
                  </div>


                  <?php } else {?>

                  <div class="col-md-7">
                      <a href="/product/<?php echo $product['id']?>"><h2 class="featurette-heading"><?php echo $product['name']?></a></h2>
                    <p class="lead"><?php echo $product_sub.'.....';?></p>
                  </div>
                  <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="/template/images/shop/<?php echo $product['image']?>" alt="500x500" style="width: 500px; height: 500px;"  data-holder-rendered="true">
                  </div>

                  <?php }?>

                </div>
                <hr class="featurette-divider">
            <?php } else {break;}?>
        <?php $i++;endforeach; ?>

        <!-- /END THE FEATURETTES -->

          <!-- Three columns of text below the carousel -->
          <div class="row">
              <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Heading</h2>
                  <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                  <p><a class="btn btn-secondary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">View details »</a></p>
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Heading</h2>
                  <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                  <p><a class="btn btn-secondary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">View details »</a></p>
              </div><!-- /.col-lg-4 -->
              <div class="col-lg-4">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                  <h2>Heading</h2>
                  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                  <p><a class="btn btn-secondary" href="https://getbootstrap.com/docs/4.1/examples/carousel/#" role="button">View details »</a></p>
              </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->

      </div><!-- /.container -->
<?php include_once ROOT . '/views/footer.php' ?>