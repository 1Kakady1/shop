<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 09.06.2018
 * Time: 16:57
 */

$mail = 'test@mail.ru';
$phone = array('+3000000000','+3000000001');
$reder = 'http://top-shop.loc/';

return $setting = array(
    'prefix'=>'tr_',
    'news1'=> 0,'news2'=> 1,'news3'=> 2,
    'price' =>"₽",
    'key1'=>"Tort",'key2'=>"228",'key3'=>"wEr0",'key4'=>"sdwcc1",'key5'=>"232cAA",
    'MyEmail'=>$mail,'msg'=>"http://site.loc/admin/orders",'subject'=>"Новый заказ!",

    'EmailHeaderOrder' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
                    <p class="header-email__title text-right" style="Margin: 0; Margin-bottom: 10px; color: #fff !important; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;">Оформленный заказ</p>
                  </th></tr></table></th>
                </tr></tbody></table>
              </td></tr></tbody></table>',

    'EmailFooter' => '<table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="15px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> <table class="button float-center" style="Margin: 0 0 16px 0; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 0 16px; padding: 0; text-align: center; vertical-align: top; width: auto !important;"><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;"><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background: 0 0; border: 2px solid #13750f; border-collapse: collapse !important; color: #13750f; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;"><a href="'.$reder.'" style="-webkit-border-radius: 0; Margin: 0; border: 0 solid transparent; border-radius: 0; color: #13750f; display: inline-block; font-family: Arial,sans-serif; font-size: 16px; font-weight: 400; line-height: 1.3; margin: 0; padding: 12px 35px; text-align: left; text-decoration: none; text-transform: uppercase;">Смотреть</a></td></tr></table></td></tr></table>
              <table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="15px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 15px; font-weight: 400; hyphens: auto; line-height: 15px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
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
                            <h2 class="footer__email text-right" style="Margin: 0; Margin-bottom: 0; color: #fff !important; font-family: Arial,sans-serif; font-size: 16px; font-weight: 700; line-height: 1.3; margin: 0; margin-bottom: 0; padding: 0; text-align: right; word-wrap: normal;">'.$mail.'</h2>
                          </th>
<th class="expander" style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
                          <th class="info-column small-12 large-12 columns last" style="Margin: 0 auto; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 16px; padding-left: 8px; padding-right: 16px; text-align: left; width: 564px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #000; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="8px" style="-ms-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #000; font-family: Arial,sans-serif; font-size: 8px; font-weight: 400; hyphens: auto; line-height: 8px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
                            <p class="footer-phone text-right" style="Margin: 0; Margin-bottom: 10px; color: #fff !important; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;">'.$phone[1].'</p>
                            <p class="footer-phone text-right" style="Margin: 0; Margin-bottom: 10px; color: #fff !important; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: right;">'.$phone[0].'</p>
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
</html>'
);
