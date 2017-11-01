<?php require_once 'main.php';
   $FileOpen = $_GET['open']; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Просмотр</title>
</head>
<body>

<div style="width:400px; margin:auto">
 <form class="form-group" action="controller.php" method="post">
   <div style="width:200px; margin:auto"><h5>Режим просмотра</h5> <br>
   <?php echo $FileOpen; ?></div>
     <textarea rows="10" cols="53" ><?php file_open($FileOpen); ?></textarea>
   <p><input type="submit" value="На главную" name="return"/></p>
</form>
</div>

 </body>
</html>
