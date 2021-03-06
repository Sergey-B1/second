<?php
require_once 'functions.php';

// Для удаления файла
if (isset($_POST['FileDelete'])){
  $FileDelete = $_POST['FileDelete'];
  if (isset($_POST['delete_no'])){
  header ('Location: index.php');
    exit;
  }
if (isset($_POST['delete_yes'])){
    file_delete($FileDelete);
    bd_delete($FileDelete);
    header ('Location: index.php');
    exit;
}
}
// Для открытия файла
if (isset($_POST['FileOpen'])){
  $FileOpen= $_POST['FileOpen'];
  exit;
  }
if (isset($_POST['return'])){
    header ('Location: index.php');
    exit;
}
// Для переименования файла
if (isset($_POST['name_edit_yes'])){
if (isset($_POST['OldName']) && isset($_POST['NewName'])){
  $OldName = $_POST['OldName'];
  $NewName = $_POST['NewName'];
  name_edit($OldName, $NewName);
  header ('Location: index.php');
  exit;
  }
}
// Для изменения содержимого файла
if (isset($_POST['content_edit_yes'])){
if (isset($_POST['OldName2']) && isset($_POST['NewContent'])){
  $OldName2= $_POST['OldName2'];
  $NewContent= $_POST['NewContent'];
  content_edit($OldName2, $NewContent);
  header ('Location: index.php');
  exit;
  }
}
// Для внесения в БД комментария соответственно нужному файлу
if (isset($_POST['comment_edit_yes'])){
  if (isset($_POST['Comment']) && isset($_POST['OldName3'])){
    $Comment = ($_POST['Comment']);
    $OldName3 = ($_POST['OldName3']);
    comment_record($Comment, $OldName3);
  }
  exit;
}

// Для загрузки файла
if (isset($_FILES['file'])) {
  $file = $_FILES['file'];
  $file_b = $file['name'];
  file_upload($file);
    if ($file['name'] != ""){;
      bd_record($file_b);
    }
  exit;
}

// Для создания файла вручную
if (isset($_POST['create_file'])){
  if (($_POST['NewFileName']) and ($_POST['NewFileContent'])){
    $NewFileName = $_POST['NewFileName'];
    $NewFileContent = $_POST['NewFileContent'];
    file_create($NewFileName, $NewFileContent);
    bd_record($NewFileName.".txt");
  };
}

// Для просмотра комментария к файлу
