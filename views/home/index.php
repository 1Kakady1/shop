<?php include_once ROOT . '/views/header.php'; ?>

    <main role="main">

      <?php include_once ROOT.'/views/include/sliderNews.php'?>


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