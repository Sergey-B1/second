<? require_once 'main.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Создать файл</title>
  <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
<div style="width:500px; margin:auto">
  <h3>Создание файла</h3><br>

  <div class="form-group">
    <form action="controller.php" method="post">
     <p>Введите имя файла</p>
     <input class="form-control" type="text" name="NewFileName"><br>
     <p>Введите содержимое файла</p>
     <textarea class="form-control" name="NewFileContent"></textarea>
     <p><input class="btn btn-primary" type="submit" value="Создать файл" name="create_file"/></p>
    </form>
  </div>
</div>



 </body>
</html>
