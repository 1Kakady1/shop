<?php include_once ROOT . '/views/header.php'; ?>

    <main role="main" style="margin-top: -0.6vw;">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron" id="cont-w" style="background: url(/template/images/background-news.jpg);background-size: 100% 100%;">
        <div class="container">
          <h1 class="display-3"><?php echo $newsList[$randNewsId[0]]['title']?></h1>
          <p><?php echo $newsList[$randNewsId[0]]['content']?></p>
          <p><a class="btn btn-primary btn-lg" href="/news/<?php echo $newsList[$randNewsId[0]]['id']?>" role="button">Learn more »</a></p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
        <?php foreach ($newsList as $newsItem): ?>
          <div class="col-md-4">
            <h2><?php echo $newsItem['title'] ?></h2>
            <p><?php echo $newsItem['short_content'] ?> </p>
            <p><a class="btn btn-secondary" href="/news/<?php echo $newsItem['id'] ?>" role="button">View details »</a></p>
          </div>

        <?php endforeach; ?>
        </div>

        <hr>

      </div> <!-- /container -->

    </main>
<?php include_once ROOT . '/views/footer.php' ?>