<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 10.07.2018
 * Time: 11:49
 */
include_once ROOT.'/views/header.php';
?>

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
    <div class="bg-wrap">
        <div id="flex_center">
            <img class="mb-4"  id="flex_center" src="/template/images/logo.png" alt="">
        </div>
        <div id="flex_center">
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Ваш Email" required="" autofocus="">
        </div>
        <div id="flex_center">
            <input type="text" name="usname" id="inputPassword" class="form-control" placeholder="Никнейм" required="">
        </div>

        <div id="flex_center">
            <button class="btn btn-lg btn-primary btn-block"  type="submit" name="submit">Восстановить пароль</button>
        </div>
        <div id="flex_center" style="margin-top: 1vw">
            <a href="/user/register/" style="padding-right: 6vw;">Регистрация</a>
            <a href="/user/login/">Вход</a>
        </div>
    </div>


</form>

<script>
    document.body.style.backgroundImage = 'url(/template/images/bg3.jpg)';
    document.body.style.backgroundRepeat= 'round';
</script>

<?php include_once ROOT.'/views/footer.php';?>
