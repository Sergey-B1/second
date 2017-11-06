<?php require_once 'main.php';
   $comment = $_GET['comment']; ?>
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

  <div style="width:200px; margin:auto"><h5>Режим просмотра комментариев</h5> <br>
  <h6><?php echo $comment; ?></h6></div>
    <div class="form-group">
     <form class="form-group" action="index.php" method="post">
          <textarea class="form-control"><?php comment_view($array_result, $comment); ?></textarea><br>
       <p><input class="btn btn-primary" type="submit" value="На главную"/></p>
     </form>
   </div>
</div>

 </body>
</html>
