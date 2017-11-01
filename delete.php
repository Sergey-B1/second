<?php require_once 'main.php';
 $FileDelete = $_GET['delete'];?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Предупреждение</title>
</head>
<body>

<form action="controller.php" method="post">
  <p>Вы действительно хотите удалить файл <?php echo $FileDelete; ?>?</p> <br>
     <input type="hidden" value="<?php echo $FileDelete; ?>" name="FileDelete"/>
  <p><input type="submit" value="Нет" name="delete_no"/></p>
  <p><input type="submit" value="Да" name="delete_yes"/></p>
</form>

 </body>
</html>
