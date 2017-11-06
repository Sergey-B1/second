<?php
require_once 'functions.php';
mb_internal_encoding("UTF-8");
$files = scandir(DIR, 0);


$connection = mysqli_connect("second", "root", ""); // Подкл. к серверу БД
$db = mysqli_select_db($connection, "bd_1"); // Выбор нужной БД

if (!$connection or !$db){  // Вывод ошибки, если нет соединения
  exit(mysqli_error());
}

// Запрос в БД - запись в переменную
$result = mysqli_query($connection, "SELECT * FROM biblioteka");

$array_result = mysqli_fetch_all($result);
$row = mysqli_fetch_array($result);

function comment_view($array_result, $OldName){
  foreach ($array_result as $value){
    if ($OldName == $value[1]){
      echo $value[2];
    };
  };
}
