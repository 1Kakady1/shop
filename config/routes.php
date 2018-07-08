<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 19:08
 */

return array(
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',


    'product/([0-9]+)' => 'product/view/$1',
    'product/cat/([0-9]+)/page-([0-9]+)' => 'product/cat/$1/$2',
    'product/cat/([0-9]+)' => 'product/cat/$1',
    'product/page-([0-9]+)' => 'product/index/$1',
    'product' => 'product/index',

    'cart/check' => 'cart/check',
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAdd в CartController
    'cart' => 'cart/index', // actionIndex в CartController

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'user/active' => 'user/active',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'contact' => 'contact/index',

    '' => 'home/index',
);