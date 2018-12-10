<?php
/**
 * Created by PhpStorm.
 * User: alexandr.kopyl
 * Date: 27.11.2018
 * Time: 10:14
 */

$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';


//Данные для кук
$ProductID = $_GET['product_id'];
$historyProduct = array();
$arrayHistoryProduct = json_decode($_COOKIE['historyProduct']);


//Данные для времени
date_default_timezone_set('Europe/Moscow');

$ts = time();
$ny_date = strtotime("November 27  2018 00:00:00");
$toNextday = $ny_date - $ts;
$timeToEnd = date("H:i:s", mktime(0, 0, $toNextday));


$array_category = array("Доски и лыжи","Крепления","Ботинки","Одежда","Инструменты","Разное");
$array_product = array(
    array("Name" => "2014 Rossignol District Snowboard", "category" => "Доски лыжи", "price" => 1099, "url" => "img/lot-1.jpg"),
    array("Name" => "DC Ply Mens 2016/2017 Snowboard", "category" => "Доски лыжи", "price" => 159999, "url" => "img/lot-2.jpg"),
    array("Name" => "Крепление Union Contact Pro 2015 года размер L/XL", "category" => "Крепление", "price" => 8000, "url" => "img/lot-3.jpg"),
    array("Name" => "Ботинки для сноуборда DC Multiny Charocal", "category" => "Ботинки", "price" => 1099, "url" => "img/lot-4.jpg"),
    array("Name" => "Куртка для сноуборда DC Mutiny Charocal", "category" => "Одежда", "price" => 7500, "url" => "img/lot-5.jpg"),
    array("Name" => "Маска Oakley Canopy", "category" => "Разное", "price" => 5400, "url" => "img/lot-6.jpg")

);
