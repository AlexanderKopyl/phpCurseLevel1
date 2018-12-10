<?php
/**
 * Created by PhpStorm.
 * User: alexandr.kopyl
 * Date: 04.12.2018
 * Time: 09:43
 */
session_start();
require_once "functions.php";
require_once "data.php";



echo render('login', array('user_name' =>$user_name,'user_avatar' =>$user_avatar));
