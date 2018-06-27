<?php include_once ROOT.'/views/header.php'?>

  <body class="bg-light">

    <div class="container" style="margin-bottom: calc(11vw + 3vw);">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="/template/images/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>


            <?php if ($result): ?>
                <p>Вы зарегистрированы!</p>
            <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
        <?php endif; ?>

      <div class="row">

        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate="" action="#" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">ФИО</label>
                <input type="text" name="name"  class="form-control" id="firstName" placeholder="" value="<?php echo $name; ?>" required="">
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Password</label>
                <input type="password" name="password" class="form-control" id="lastName" placeholder="" value="<?php echo $password; ?>" required="">
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" name="usname" class="form-control" id="username" placeholder="Username" value="<?php echo $usname; ?>" required="">
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="you@example.com">
            </div>
              <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Регистрация" />
          </form>
        </div>

      </div>
    </div>
    <script>

        document.body.style.backgroundImage = 'url(/template/images/bg3.jpg)';


      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  
<?php include_once ROOT.'/views/footer.php';?>