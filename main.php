<?php
require_once 'functions.php';
mb_internal_encoding("UTF-8");
$files = scandir(DIR, 0);

//$NewContent = $_POST['NewContent'];
//$OldName2 = $_POST['OldName2'];

$connection = mysql_connect("second", "root", ""); // Подкл. к серверу БД
$db = mysql_select_db("bd_1", $connection); // Выбор нужной БД

if (!$connection or !$db){  // Вывод ошибки, если нет соединения
  exit(mysql_error());
}

// Запрос в БД - запись в переменную
$result = mysql_query(" SELECT * FROM biblioteka ");

 $array_result = (mysql_fetch_row($result));

function bd_result($OldName, $array_result){
  if($OldName == $array_result[1]){
    echo $array_result[2];
  };
}



?>
