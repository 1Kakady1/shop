<?php include_once ROOT . '/views/header.php' ?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, world!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a class="btn btn-primary btn-lg" href="https://getbootstrap.com/docs/4.1/examples/jumbotron/#" role="button">Learn more »</a></p>
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