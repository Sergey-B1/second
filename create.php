<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Просмотр</title>
</head>
<body>

<? require_once 'main.php'; ?>

<form action="main.php" method="post">
 <p>Создание файла <br><? //// ?></p><br>
 <p>Введите имя файла</p>
 <input type="text" name="NewFileName"><br>
  <p>Введите содержимое файла</p>
 <textarea rows="10" cols="20" name="NewFileContent"></textarea>
 <p><input type="submit" value="Создать файл"/></p>
</form>


 </body>
</html>
