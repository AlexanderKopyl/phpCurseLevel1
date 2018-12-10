<?php
/**
 * Created by PhpStorm.
 * User: alexandr.kopyl
 * Date: 04.12.2018
 * Time: 14:46
 */
session_start();
unset($_SESSION['is_auth']);
header('Location: index.php');
exit;
