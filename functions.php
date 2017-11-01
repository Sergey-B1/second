<?php


define("DIR", "upload/");
// Функция для загрузки файла с диска
function file_upload($file){
  if(!file_exists(DIR)){
      mkdir(DIR, 0777);
  };
  $FileName = DIR.$file['name'];
  $path_extension = pathinfo(DIR.$FileName);
  if(move_uploaded_file($file['tmp_name'], $FileName) && $path_extension['extension'] == "txt"){
    echo "Файл удачно загружен!";
    echo "<p><div>  <form action='index.php'>
        <input type='submit' value='На главную'>
        </form>
      </div>
    </p>";
};}
//Функция для занесения строки id, title, comment в БД
function bd_record($file_b){
  $connection = mysql_connect("second", "root", ""); // Подкл. к серверу БД
  mysql_select_db("bd_1", $connection);
  $bd_file = mysql_query("INSERT INTO biblioteka (title, comment) VALUES ('$file_b', 'нет комментариев)");
  if ($bd_file){
    echo "Информация занесена в базу данных";
  } else {
    echo "Не удалось занести информацию в базу данных"; print_r($_FILES);
  }
}
// Функция для открытия файла
function file_open($FileOpen){
      $path_extension = pathinfo(DIR.$FileOpen);
      if (file_exists(DIR.$FileOpen) && $path_extension['extension'] == "txt")
      {echo file_get_contents(DIR.$FileOpen);
      };
    }
// Функция для удаления файла
function file_delete($FileDelete){
        if (!isset($FileDelete)){
        return false;
        }
        if (file_exists(DIR.$FileDelete)){
        unlink(DIR.$FileDelete);
        };
        }
// Следующие три функции служат для переименования файла:
function name_error($OldName, $NewName){
    if(!isset($OldName)) {
    return false;}
    if (file_exists(DIR.$OldName) && $OldName == $NewName) {
       echo "Файл с таким именем уже существует";
        };
        }
function file_rename($OldName, $NewName){
  if (file_exists(DIR.$OldName) && $OldName != $NewName){
    rename(DIR.$OldName, DIR.$NewName.".txt");
    };
    }
function name_edit($OldName, $NewName){
      if (!name_error ($OldName, $NewName)){
      file_rename($OldName, $NewName);
      };
      }
// Функция для редактирования содержимого файла
function content_edit($OldName2, $NewContent){
  if(!isset($OldName2, $NewContent)) {
    return false;}
    elseif (file_get_contents(DIR.$OldName2) == $NewContent) {
      echo "Вы не изменили файл!";
      exit;
    };
  file_put_contents(DIR.$OldName2, $NewContent);
}
// Функция для внесения комментария в БД
function comment_record($Comment, $OldName3, $result){
  if ($result != $Comment){
  mysql_connect("second", "root", "");
  mysql_query(" INSERT INTO biblioteka (comment) VALUES ($Comment) ");
//  mysqli_real_escape_string($rec);
};
}
