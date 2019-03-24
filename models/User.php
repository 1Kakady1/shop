<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 27.06.2018
 * Time: 15:10
 */

class User
{

    private static  $massgeHeader = "";
    private static  $massgeFooter = "";
    private static  $massgeContent = "";

    public static function register($name, $usname, $email, $password) {

        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();


        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $password = md5($setting['key1'].md5($setting['key2'].$password.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));


        $sql = 'INSERT INTO '.$userTab.' (name, usname, email, password) VALUES (:name, :usname, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':usname', $usname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function edit($flag,$id, $name, $password,$usname, $email, $img)
    {
        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();

switch ($flag){

case 0: $sql = "UPDATE $userTab SET name = :name WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();break;

case 1: $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);
        $new_password = md5($setting['key1'].md5($setting['key2'].$password.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));
        $sql = "UPDATE $userTab SET password = :password WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $new_password , PDO::PARAM_STR);
        return $result->execute();break;

case 2: $sql = "UPDATE $userTab SET email = :email WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();break;

case 3: $sql = "UPDATE $userTab SET usimg = :usimg WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':usimg', $img, PDO::PARAM_STR);
        return $result->execute();break;

}

    }


    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $userTab=Db::dbTableName('users');

        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $sql = "SELECT usname FROM $userTab WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();

        $usname = $result->fetch();
        $password_code = md5($setting['key1'].md5($setting['key2'].$password.$setting['key3']).md5($setting['key4'].$usname['usname'].$setting['key5']));
        $sql = "SELECT * FROM $userTab WHERE email = :email AND password = :password";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password_code, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function checkUserRestore($email, $usname)
    {
        $db = Db::getConnection();
        $userTab=Db::dbTableName('users');

        $sql = "SELECT * FROM $userTab WHERE email = :email AND usname= :usname";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':usname', $usname, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function newUserPasword($usname,$email){

        $db = Db::getConnection();
        $userTab=Db::dbTableName('users');

        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $String="";
        $Char = '0123456789abcdefghijklmnopqrstuvwxyz';
        for ($i = 0; $i < 11; $i ++) $String .= $Char[rand(0, strlen($Char) - 1)];

        $password = md5($setting['key1'].md5($setting['key2'].$String.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));

        $sql = "UPDATE $userTab SET password = :password WHERE usname = :usname";
        $result = $db->prepare($sql);
        $result->bindParam(':usname', $usname, PDO::PARAM_INT);
        $result->bindParam(':password', $password , PDO::PARAM_STR);
        $result->execute();

        $messageRestore = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="background: #fff; min-height: 100%;">
  <head>
    <title>Email</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <!-- Link to the email\'s CSS, which will be inlined into the email-->
    <style>
@media only screen and (max-width:596px) {
  .small-float-center {
    margin: 0 auto !important;
    float: none !important;
  }
  .small-float-center,.small-text-center {
    text-align: center !important;
  }
  .small-text-left {
    text-align: left !important;
  }
  .small-text-right {
    text-align: right !important;
  }
}


@media only screen and (max-width:596px) {
  table.body table.container .hide-for-large {
    display: block !important;
    width: auto !important;
    overflow: visible !important;
  }
}


@media only screen and (max-width:596px) {
  table.body table.container .row.hide-for-large {
    display: table !important;
    width: 100% !important;
  }
  table.body table.container .show-for-large {
    display: none !important;
    width: 0;
    mso-hide: all;
    overflow: hidden;
  }
}


@media only screen and (max-width:596px) {
  table.body img {
    height: auto !important;
  }
  table.body center {
    min-width: 0 !important;
  }
  table.body .container {
    width: 95% !important;
  }
  table.body .column,table.body .columns {
    height: auto !important;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding-left: 16px !important;
    padding-right: 16px !important;
  }
  table.body .collapse .column,table.body .collapse .columns,table.body .column .column,table.body .column .columns,table.body .columns .column,table.body .columns .columns {
    padding-left: 0 !important;
    padding-right: 0 !important;
  }
  .body .column td.small-1,.body .column th.small-1,.body .columns td.small-1,.body .columns th.small-1,td.small-1,td.small-1 center,th.small-1,th.small-1 center {
    display: inline-block !important;
    width: 8.33333% !important;
  }
  .body .column td.small-2,.body .column th.small-2,.body .columns td.small-2,.body .columns th.small-2,td.small-2,td.small-2 center,th.small-2,th.small-2 center {
    display: inline-block !important;
    width: 16.66667% !important;
  }
  .body .column td.small-3,.body .column th.small-3,.body .columns td.small-3,.body .columns th.small-3,td.small-3,td.small-3 center,th.small-3,th.small-3 center {
    display: inline-block !important;
    width: 25% !important;
  }
  .body .column td.small-4,.body .column th.small-4,.body .columns td.small-4,.body .columns th.small-4,td.small-4,td.small-4 center,th.small-4,th.small-4 center {
    display: inline-block !important;
    width: 33.33333% !important;
  }
  .body .column td.small-5,.body .column th.small-5,.body .columns td.small-5,.body .columns th.small-5,td.small-5,td.small-5 center,th.small-5,th.small-5 center {
    display: inline-block !important;
    width: 41.66667% !important;
  }
  .body .column td.small-6,.body .column th.small-6,.body .columns td.small-6,.body .columns th.small-6,td.small-6,td.small-6 center,th.small-6,th.small-6 center {
    display: inline-block !important;
    width: 50% !important;
  }
  .body .column td.small-7,.body .column th.small-7,.body .columns td.small-7,.body .columns th.small-7,td.small-7,td.small-7 center,th.small-7,th.small-7 center {
    display: inline-block !important;
    width: 58.33333% !important;
  }
  .body .column td.small-8,.body .column th.small-8,.body .columns td.small-8,.body .columns th.small-8,td.small-8,td.small-8 center,th.small-8,th.small-8 center {
    display: inline-block !important;
    width: 66.66667% !important;
  }
  .body .column td.small-9,.body .column th.small-9,.body .columns td.small-9,.body .columns th.small-9,td.small-9,td.small-9 center,th.small-9,th.small-9 center {
    display: inline-block !important;
    width: 75% !important;
  }
  .body .column td.small-10,.body .column th.small-10,.body .columns td.small-10,.body .columns th.small-10,td.small-10,td.small-10 center,th.small-10,th.small-10 center {
    display: inline-block !important;
    width: 83.33333% !important;
  }
  .body .column td.small-11,.body .column th.small-11,.body .columns td.small-11,.body .columns th.small-11,td.small-11,td.small-11 center,th.small-11,th.small-11 center {
    display: inline-block !important;
    width: 91.66667% !important;
  }
  table.menu td,table.menu th,td.small-12,th.small-12 {
    display: inline-block !important;
    width: 100% !important;
  }
  .column td.small-12,.column th.small-12,.columns td.small-12,.columns th.small-12 {
    display: block !important;
    width: 100% !important;
  }
  table.body td.small-offset-1,table.body th.small-offset-1 {
    margin-left: 8.33333% !important;
    Margin-left: 8.33333% !important;
  }
  table.body td.small-offset-2,table.body th.small-offset-2 {
    margin-left: 16.66667% !important;
    Margin-left: 16.66667% !important;
  }
  table.body td.small-offset-3,table.body th.small-offset-3 {
    margin-left: 25% !important;
    Margin-left: 25% !important;
  }
  table.body td.small-offset-4,table.body th.small-offset-4 {
    margin-left: 33.33333% !important;
    Margin-left: 33.33333% !important;
  }
  table.body td.small-offset-5,table.body th.small-offset-5 {
    margin-left: 41.66667% !important;
    Margin-left: 41.66667% !important;
  }
  table.body td.small-offset-6,table.body th.small-offset-6 {
    margin-left: 50% !important;
    Margin-left: 50% !important;
  }
  table.body td.small-offset-7,table.body th.small-offset-7 {
    margin-left: 58.33333% !important;
    Margin-left: 58.33333% !important;
  }
  table.body td.small-offset-8,table.body th.small-offset-8 {
    margin-left: 66.66667% !important;
    Margin-left: 66.66667% !important;
  }
  table.body td.small-offset-9,table.body th.small-offset-9 {
    margin-left: 75% !important;
    Margin-left: 75% !important;
  }
  table.body td.small-offset-10,table.body th.small-offset-10 {
    margin-left: 83.33333% !important;
    Margin-left: 83.33333% !important;
  }
  table.body td.small-offset-11,table.body th.small-offset-11 {
    margin-left: 91.66667% !important;
    Margin-left: 91.66667% !important;
  }
  table.body table.columns td.expander,table.body table.columns th.expander {
    display: none !important;
  }
  table.body .right-text-pad,table.body .text-pad-right {
    padding-left: 10px !important;
  }
  table.body .left-text-pad,table.body .text-pad-left {
    padding-right: 10px !important;
  }
  table.menu td,table.menu th {
    width: auto !important;
  }
  table.menu.small-vertical td,table.menu.small-vertical th,table.menu.vertical td,table.menu.vertical th {
    display: block !important;
  }
  table.body img,table.menu[align=center] {
    width: auto !important;
  }
  table.button.expand,table.menu {
    width: 100% !important;
  }
}
</style>
  </head>
  <body style="-ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; box-sizing: border-box; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;">
    <table class="body" style="Margin: 0; background: #fff; border-collapse: collapse; border-spacing: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; height: 100%; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
      <tbody>
        <tr style="padding: 0; text-align: left; vertical-align: top;">
          <td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
            <center data-parsed style="min-width: 580px; width: 100%;">
              <table align="center" class="container float-center" style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                <table valign="middle" class="row header-email" style="background: #343a40; border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                  <th class="custom-pb small-6 large-6 columns first" valign="middle" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 8px; text-align: left; width: 274px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                    <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="5px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 5px; font-weight: 400; hyphens: auto; line-height: 5px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> <img class="header-email__logo" alt="logo" src="../img/logo.png" style="-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: 0; text-decoration: none; width: 20% !important;">
                  </th></tr></table></th>
                  <th class="custom-pb small-6 large-6 columns last" valign="middle" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 16px; text-align: left; width: 274px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                    <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="5px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 5px; font-weight: 400; hyphens: auto; line-height: 5px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                    <p class="header-email__title text-right" style="Margin: 0; Margin-bottom: 10px; color: #fff !important; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;">Восстановление пароля</p>
                  </th></tr></table></th>
                </tr></tbody></table>
              </td></tr></tbody></table>
              <table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="50px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 50px; font-weight: 400; hyphens: auto; line-height: 50px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
              <table class="info float-center" align="center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;">
                <tbody>
                  <tr style="padding: 0; text-align: left; vertical-align: top;">
                    <td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                      <table align="center" class="container" style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                          <th class="info-column small-12 large-12 columns first last" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 16px; text-align: left; width: 564px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                            <h2 class="info-column__usname" style="Margin: 0; Margin-bottom: 0; color: inherit; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: left; word-wrap: normal;">Name:</h2>
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="5px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 5px; font-weight: 400; hyphens: auto; line-height: 5px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                            <p class="info-column__msg" style="Margin: 0; Margin-bottom: 10px; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">Ваш новый пароль: '.$String.'</p><a class="info-column__link" href="#" style="Margin: 0; color: #13750f; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">Перейти: TopShop</a>
                          </th>
<th class="expander" style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
                        </tr></tbody></table>
                      </td></tr></tbody></table>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="50px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 50px; font-weight: 400; hyphens: auto; line-height: 50px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
              <table align="center" class="float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;">
                <tbody>
                  <tr style="padding: 0; text-align: left; vertical-align: top;">
                    <td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                      <table align="center" class="container" style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <table class="row footer" style="background: #343a40; border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                          <th class="info-column small-12 large-12 columns first" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 16px; padding-right: 8px; text-align: left; width: 564px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="8px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 8px; font-weight: 400; hyphens: auto; line-height: 8px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                            <h3 class="footer-title" style="Margin: 0; Margin-bottom: 0; color: #fff !important; font-family: Arial,sans-serif; font-size: 14px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: left; word-wrap: normal;">Связь с нами:</h3>
                          </th>
<th class="expander" style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
                          <th class="info-column small-12 large-12 columns" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 8px; text-align: left; width: 564px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="8px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 8px; font-weight: 400; hyphens: auto; line-height: 8px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                            <h2 class="footer__email text-right" style="Margin: 0; Margin-bottom: 0; color: #fff !important; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: right; word-wrap: normal;">topShop@gamil.com</h2>
                          </th>
<th class="expander" style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
                          <th class="info-column small-12 large-12 columns last" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 16px; text-align: left; width: 564px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="8px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 8px; font-weight: 400; hyphens: auto; line-height: 8px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                            <p class="footer-phone text-right" style="Margin: 0; Margin-bottom: 10px; color: #fff !important; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;">+3222</p>
                            <p class="footer-phone text-right" style="Margin: 0; Margin-bottom: 10px; color: #fff !important; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;">+3113</p>
                          </th>
<th class="expander" style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
                        </tr></tbody></table>
                      </td></tr></tbody></table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </center>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>';

       // mail($email, 'Востановление пароля', 'Новый пароль: '.$String." После входа не забудьте сменить его нановый.", 'From: '.$setting['MyEmail'].'');
        mail($email, 'Востановление пароля', $messageRestore, 'From: '.$setting['MyEmail'].'');
        return true;



    }

    public static function auth($userId,$userEmail)
    {   //session_start();
        $_SESSION['user'] = $userId;
        //$_SESSION['email'] = $userEmail;
    }

    public static function checkLogged()
    {
        //session_start();
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function oldPassword($oldPasswordDB,$oldPassword,$usname) {

        $paramsPath = ROOT.'/config/config_site.php';
        $setting = include ($paramsPath);

        $password_code = md5($setting['key1'].md5($setting['key2'].$oldPassword.$setting['key3']).md5($setting['key4'].$usname.$setting['key5']));

        if($password_code == $oldPasswordDB)
        {
            return true;
        }

        return false;

    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email) {

        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM $userTab WHERE email = :email";

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkUnameExists($usname) {

        $userTab=Db::dbTableName('users');
        $db = Db::getConnection();

        $sql = "SELECT COUNT(*) FROM $userTab WHERE usname = :usname";

        $result = $db->prepare($sql);
        $result->bindParam(':usname', $usname, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {
        if ($id) {

            $userTab=Db::dbTableName('users');
            $db = Db::getConnection();

            $sql = "SELECT * FROM $userTab WHERE id = :id";

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

    public static function loadImage($email,$path)
    {

        //function LoadImg($path,$connection2,$users_tab_my)
            $types = array('image/gif', 'image/png', 'image/jpeg','image/jpg');
            $exp_tupe_array = array('gif','png','jpeg','jpg' );
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if (!in_array($_FILES['picture']['type'], $types))
                {return 5;} //msg error
                $typeImg= explode(".",$_FILES['picture']['name']);
               // var_dump($typeImg);
                for($i=0;$i<count($exp_tupe_array);$i++)
                {
                    if($typeImg[count($typeImg)-1] == $exp_tupe_array[$i])
                    {
                        $byfType=$exp_tupe_array[$i];
                        break;
                    }
                    $byfType = null;
                }

                if($byfType == null )
                {
                    return 6;
                }

                $name_file = md5($typeImg[0].$email).'.'.$byfType;
                $_FILES['picture']['name'] =$name_file;
                if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
                    return 3;//msg bad type
                else
                    return $name_file;//msg ok!
            }
    }
        public static function sendActiveUsMail($id,$email)
        {
            $paramsPath = ROOT.'/config/config_site.php';
            $setting = include ($paramsPath);
            $String= null;
            $Char = '0123456789abcdefghijklmnopqrstuvwxyz';
            for ($i = 0; $i < 11; $i ++) {$String .= $Char[rand(0, strlen($Char) - 1)];}

            $userTab=Db::dbTableName('users');
            $db = Db::getConnection();

            $sql = "UPDATE $userTab SET code = :code WHERE email = :email";
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_INT);
            $result->bindParam(':code', $String, PDO::PARAM_STR);
            $result->execute();

            $Code= md5($setting['key1'].$String.md5($setting['key2'].$email.$setting['key3']))."j".$id;
            $Code=base64_encode($Code);
            mail($email, 'Регистрация на cайте', 'Ссылка для активации: '.ROOT.'/user/active/'.$Code, 'From: '.$setting['MyEmail'].'');
            return true;
        }

        public static function activeAcc()
        {

            if (!empty($_SERVER['REQUEST_URI'])) {

                $link_url = trim($_SERVER['REQUEST_URI'], '/');
                $buf = explode("/", $link_url);
            }
            $code =  base64_decode(htmlspecialchars($buf[count($buf)-1]));

            $buf_c = explode("j",$code );

            $xex = $buf_c[0];

            $id=intval($buf_c[1]);

            if(strlen($xex) == 32)
            {
                echo "<br><br>".$xex;
                $paramsPath = ROOT.'/config/config_site.php';
                $setting = include ($paramsPath);

                $userTab=Db::dbTableName('users');
                $db = Db::getConnection();

                $sql = "SELECT * FROM $userTab WHERE id = :id";

                $result = $db->prepare($sql);
                $result->bindParam(':id', $id, PDO::PARAM_INT);

                // Указываем, что хотим получить данные в виде массива
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $result->execute();

                $String = array();
                $String = $result->fetch();

                $code_bd= md5($setting['key1'].$String['code'].md5($setting['key2'].$String['email'].$setting['key3']))."j".$id;
                $code = explode("j",$code_bd);

                if($xex == $code[0]) {


                    echo "<br><br>".$id;
                    $sql = "UPDATE $userTab SET active = 1 WHERE id = :id";
                    $result = $db->prepare($sql);
                    $result->bindParam(':id', $id, PDO::PARAM_INT);
                    // $result->bindParam(':active', 1, PDO::PARAM_STR);
                    $result->execute();
                    return true;

                }


            }

            return false;



        }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 8) {
            return true;
        }
        return false;
    }

}