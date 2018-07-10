<?php include_once ROOT.'/views/header.php'?>

<?php if(isset($_SESSION["restore"])): unset($_SESSION["restore"]);  ?>
    <div class="animated slideInLeft"><p class="msg-send">На указаный вами Email было отправлено письмо</p></div>
<?php endif; ?>

<?php if(isset($_COOKIE['grdcvr']) && isset($_SESSION["login-restore"])): unset($_SESSION["login-restore"]);?>
    <div class="animated slideInLeft"><p class="msg-send">Вы уже делали запрос на восстановление. Проверьте свою почту</p></div>
<?php endif; ?>

<?php if (isset($errors) && is_array($errors)): ?>
<div class="animated slideInLeft">
    <ul class="msg-send-error">
        <?php foreach ($errors as $error): ?>
            <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<body class="bg-light">

<form class="form-signin" id="login-form" action="#" method="post" style="margin-bottom: 19.6vw;">
    <div id="flex_center">
        <img class="mb-4"  id="flex_center" src="/template/images/logo.png" alt="">
    </div>
    <div id="flex_center">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
    </div>
    <div id="flex_center">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required="">
    </div>


   <!-- <div class="checkbox mb-3" id="flex_center">
        <label>
            <input type="checkbox" name="remember" value="remember-me"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Запомни меня
        </label>
    </div> -->

    <div id="flex_center">
        <button class="btn btn-lg btn-primary btn-block"  type="submit" name="submit"><font style="vertical-align: inherit;">Войти</font></button>
    </div>
    <div id="flex_center" style="margin-top: 1vw">
        <a href="/user/register/" style="padding-right: 6vw;">Регистрация</a>
        <a href="/user/restore/">Восстановить пароль</a>
    </div>

</form>

<script>
    document.body.style.backgroundImage = 'url(/template/images/bg3.jpg)';
    document.body.style.backgroundRepeat= 'round';
</script>

<?php include_once ROOT.'/views/footer.php';?>
