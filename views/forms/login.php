<?php include_once ROOT.'/views/header.php'?>

<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<body class="bg-light">

<form class="form-signin" id="login-form" action="#" method="post">
    <div id="flex_center">
        <img class="mb-4"  id="flex_center" src="/template/images/logo.png" alt="">
    </div>
    <div id="flex_center">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
    </div>
    <div id="flex_center">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
    </div>


    <div class="checkbox mb-3" id="flex_center">
        <label>
            <input type="checkbox" name="checkbox" value="remember-me"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Запомни меня
                </font></font></label>
    </div>

    <div id="flex_center">
        <button class="btn btn-lg btn-primary btn-block"  type="submit" name="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">войти в систему</font></font></button>
    </div>
</form>

<div>
    <a href="/user/register/">Регистрация</a>
</div>

<script>
    document.body.style.backgroundImage = 'url(/template/images/bg3.jpg)';
</script>

<?php include_once ROOT.'/views/footer.php';?>
