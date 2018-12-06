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
    'product/sendMsg' => 'product/sendMsg',
    'product/ajaxLoadCom' => 'product/ajaxLoadCom',
    'product' => 'product/index',

    'cart/check' => 'cart/check',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',

    'user/restore' => 'user/restore',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'user/active' => 'user/active',

    //  news не работает
    'admin/novelty/create' => 'adminNews/create',
    'admin/novelty/update/([0-9]+)' => 'adminNews/update/$1',
    'admin/novelty/delete/([0-9]+)' => 'adminNews/delete/$1',
    'admin/novelty' => 'adminNews/index',


    'admin/prod/create' => 'adminProduct/create',
    'admin/prod/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/prod/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/prod/cat/([0-9]+)/page-([0-9]+)' => 'adminProduct/cat/$1/$2',
    'admin/prod/cat/([0-9]+)' => 'adminProduct/cat/$1',
    'admin/prod/page-([0-9]+)' => 'adminProduct/index/$1',
    'admin/prod' => 'adminProduct/index',

    'admin/cat/create' => 'adminCategory/create',
    'admin/cat/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/cat/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/cat' => 'adminCategory/index',

    'admin/order/update/([0-9]+)' => 'admin/update/$1',
    'admin/order/delete/([0-9]+)' => 'admin/delete/$1',
    'admin/order/view/([0-9]+)' => 'admin/view/$1',
    'admin/search' => 'admin/search',
    'admin/ajaxTiny/([a-zA-Z0-9]+)' => 'admin/ajaxTiny/$1',
    'admin/setting' => 'admin/setting',
    'admin' => 'admin/index',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'search' => 'search/index',

    'contact' => 'contact/index',

    '' => 'home/index',
);