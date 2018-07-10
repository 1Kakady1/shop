<?php include_once ROOT . '/views/header.php'; ?>
<section>
    <?php if ($result): ?>
    <div class="animated slideInLeft"><p class="msg-send">Данные отредактированы!</p></div>
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
    <div class="container">
        <div class="row">
                            <div class="col-md-6">
                                <div class="signup-form"><!--sign up form-->
                                    <h2>Редактирование данных</h2>
                                    <form action="#" method="post">
                                        <p>Имя:</p>
                                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>
                                        <input type="submit" name="submit-name" class="btn btn-default" value="Изменить" />
                                    </form>

                                    <form action="#" method="post">
                                        <p>Введите старй пароль:</p>
                                        <input type="password" name="password-old"/>
                                        <br/>
                                        <p>Введите новый пароль:</p>
                                        <input type="password" name="password"/>
                                        <br/>
                                        <input type="submit" name="submit-password" class="btn btn-default" value="Сохранить" />
                                    </form>

                                    <form action="#" method="post">
                                        <p>Email</p>
                                        <input type="email" name="email"/>
                                        <br/>
                                        <input type="submit" name="submit-email" class="btn btn-default" value="Сохранить" />
                                    </form>

                                </div><!--/sign up form-->
                            </div>
                            <div class="col-md-6">
                                <form method="POST" id="form1" runat="server" enctype="multipart/form-data" action="#">
                                    <div style="padding-top: 1vw;">
                                        <input type="file" class="form-control-file" data-toggle="popover" title="А Вы есть в Gravatar?"
                                               data-content="Если Вы есть в Gravatar, то можно не ставить аватарку, а продолжить регистрацию"
                                               name="picture"  id="imgInp" /><br>
                                        <div class="img-avatar" id="img-avatar">

                                        <?php if($user['usimg'] == NULL): ?>
                                            <img id="blah" class="animated bounceInUp vhImg" src="https://ru.gravatar.com/avatar/<?php echo md5($user['email'])?>?s=125" alt="your image" />
                                        <?php else: ?>
                                            <img id="blah" class="animated bounceInUp" src="/template/images/avatar/<?php echo $user['usimg']?>" alt="your image" />
                                        <?php endif; ?>
                                        </div>

                                    </div>
                                    <input type="submit" class="btn btn-default" name="submit-avatar" value="загрузить">
                                    <?php if($user['active'] == 0): ?>
                                    <div >
                                        <h3>Вы не активировали Email, сделайте это!!!!</h3>
                                        <input type="submit" class="btn btn-default" name="submit-active" value="Отправить письмо">
                                    </div>
                                    <?php endif; ?>

                                </form>



                            </div>
        </div>
    </div>
</section>

<?php include_once ROOT . '/views/footer.php' ?>