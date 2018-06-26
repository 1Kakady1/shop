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

    'product/page-([0-9]+)' => 'product/index//$1',
    'product' => 'product/index',
    '' => 'home/index',
);