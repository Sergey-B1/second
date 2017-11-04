<?php require_once 'main.php';
 $FileDelete = $_GET['delete'];?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Предупреждение</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div style="width:400px; margin:auto">

  <div class="form-group">
    <form action="controller.php" method="post">
      <br><p>Вы действительно хотите удалить файл <?php echo $FileDelete; ?>?</p> <br>
         <input type="hidden" value="<?php echo $FileDelete; ?>" name="FileDelete"/>
      <div style="width:200px; margin:auto">
        <input class="btn btn-primary" type="submit" value="Нет" name="delete_no"/>
        <input class="btn btn-primary" style="border-color:red; background-color:red" type="submit" value="Да" name="delete_yes"/>
      </div>
    </form>
  </div>

</div>
 </body>
</html>
