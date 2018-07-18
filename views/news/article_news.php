<?php include_once ROOT . '/views/header.php';
//var_dump($newsGallery);
?>
<main role="main">
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
        	        <div class="col-md-2"><img src="/template/images/news/<?php echo $newsGList ?>" class="image" alt=""></div>
        	    <?php endforeach; ?>
        </div>

<?php endif;?>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->



    </main>

<?php include_once ROOT . '/views/footer.php' ?>
        
