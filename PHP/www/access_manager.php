<?php

//супер глобальные массивы, доступные из любой
// точки PHP  (в функциях не нужно дописыввать global)

// echo "<pre>";
//print_r($_SERVER);
$path = $_SERVER ['REQUEST_URI'];
$path_parts  = explode('/', $path);
//  echo "<pre>";
//  print_r($path_parts);
include "_layout.php";