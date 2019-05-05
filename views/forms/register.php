<?php include_once ROOT.'/views/header.php'?>

  <body class="bg-light">

    <div class="container bg-wrap" style="margin-bottom: calc(11vw + 3vw);">
        <div id="flex_center" class="py-5 text-center">
            <img class="mb-4"  id="flex_center" src="/template/images/logo.png" alt="">
        </div>
      <div class="py-5 text-center">
        <h2>Регистрация</h2>
        <p class="lead">Нажав кнопку регистрация, Вы соглашаетсесь на обработку введеных данных.</p>
      </div>


            <?php if ($result): ?>
    <div class="animated slideInLeft"><p class="msg-send"> <p>Вы зарегистрированы!</p></div>
            <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                    <div class="animated slideInLeft">
                         <ul class="msg-send-error">
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
        <?php endif; ?>

      <div class="row">

        <div class="col-md-12 order-md-1">
          <form class="needs-validation" novalidate="" action="#" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">ФИО</label>
                <input type="text" name="name"  class="form-control" id="firstName"  value="<?php echo $name; ?>" required="">
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Пароль</label>
                <input type="password" name="password" class="form-control" id="lastName"  value="<?php echo $password; ?>" required="">
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Никнейм</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" name="usname" class="form-control" id="username" value="<?php echo $usname; ?>" required="">
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
            </div>
              <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Регистрация" />
          </form>
        </div>

      </div>
    </div>
    <script>
        document.body.style.backgroundImage = 'url(/template/images/bg3.jpg)';
        document.body.style.backgroundRepeat= 'round';
    </script>
  
<?php include_once ROOT.'/views/footer.php';?>