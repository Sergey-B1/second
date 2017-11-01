<?php require_once 'main.php';
$OldName = $_GET['edit'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Просмотр</title>
</head>
<body>

  <p>Изменение файла </p>
  <p><?php echo $OldName; ?></p>

 <p>Здесь можно изменить имя файла </p>
 <form action="controller.php" method="post">
 <input type="hidden" name="OldName" value="<?php echo $OldName; ?>">
 <input type="text" name="NewName"> <br>
 <input type="submit" value="Изменить" name="name_edit_yes"/>
 </form>

 <p>Здесь можно изменить содержимое файла</p>
 <form action="controller.php" method="post">
 <input type="hidden" name="OldName2" value="<?php echo $OldName; ?>">
 <textarea rows="5" cols="15" name="NewContent"><?php echo file_get_contents(DIR.$OldName); ?></textarea><br>
 <input type="submit" value="Изменить" name="content_edit_yes"/>
 </form>

 <p>Здесь можно оставить комментарий</p>
 <form action="controller.php" method="post">
 <input type="hidden" name="OldName3" value="<?php echo $OldName; ?>">
 <textarea rows="5" cols="15" name="Comment"><?php bd_result($OldName, $array_result); ?></textarea><br>
 <input type="submit" value="Изменить" name="comment_edit_yes"/>
 </form>

 <form action="index.php" method="post">
 <input type="submit" value="Отмена"/>
 </form>


 </body>
</html>
