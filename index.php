<?php

require_once 'functions.php';
require_once 'data.php';

$main = render('index',array('array_product'=> $array_product,'timer' => $timeToEnd));


echo render('layout', array(
    'array_category' => $array_category,
    'main' => $main,
    'title' => 'Главная страница',
    'is_auth' => $is_auth,
    'user_avatar'=>$user_avatar,
    'user_name' =>$user_name)
);
