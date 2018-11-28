<?php
/**
 * Created by PhpStorm.
 * User: alexandr.kopyl
 * Date: 23.11.2018
 * Time: 16:48
 */
function formatSumm($arg = 0){

    $price = ceil($arg);

    if($price < 1000){
        $price = ceil($arg);
    }else{
        $price = number_format($price, 0, ',', ' ') . " ₽";
    }

    return $price;
}

function render($pathTofile,$array = array()){
    if(file_exists('templates/' . $pathTofile . '.php')){
        ob_start();
        extract($array);
            require 'templates/' . $pathTofile . '.php';
        return ob_get_clean();
    }


}
