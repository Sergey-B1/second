<?php require_once 'main.php';

  ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="css/bootstrap.css">
  <title>Сайт</title>
</head>
<body>
<div style="width:600px; margin:auto">
    <div style="width:200px; margin:auto"><h3><span>Библиотека</span></h3></div>
    <form style="width:400px; margin:auto" action="controller.php" method="post" enctype="multipart/form-data">
      <input class="" type="file" name="file">
      <input class="btn btn-outline-success" type="submit" value="Загрузить" name="download">
    </form>
    <div >
    <?php

     unset($files[0], $files[1]);
        foreach ($files as $value) {?>
        <div style="width:380px; margin:auto">
            <div style="display: inline-block; width:100px">
              <a href='open.php?open=<?php echo $value ?>' class="badge badge-light"><?php echo $value ?></a>
            </div>
            <div style="display: inline-block; width:100px">
              <a href='edit.php?edit=<?php echo $value ?>' class="badge badge-secondary">Редактировать</a>
            </div>
            <div style="display: inline-block; width:70px">
              <a href='delete.php?delete=<?php echo $value ?>' class="badge badge-danger">Удалить</a><br>
            </div>
            <div style="display: inline-block; width:70px">
              <a href='comment.php?comment=<?php $result ?>' class="badge badge-light">Комментарии</a><br>
            </div>
        </div>
  <?php } ?>
    </div>
</div>
</body>
</html>
