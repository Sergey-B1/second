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
  $connection = mysqli_connect("second", "root", ""); // Подкл. к серверу БД
  mysqli_select_db($connection, "bd_1");
  $bd_file = mysqli_query($connection, "INSERT INTO `biblioteka` (`title`, `comment`) VALUES ('$file_b', 'нет комментариев');");
  if ($bd_file){
    echo "Информация занесена в базу данных";
  } else {
    echo "Не удалось занести информацию в базу данных";
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
// Функция для удаления соответствующих данных из БД при удалении файла
function bd_delete($FileDelete){
  $connection = mysqli_connect("second", "root", ""); // Подкл. к серверу БД
  mysqli_select_db($connection, "bd_1");
  $bd_file = mysqli_query($connection, "DELETE FROM `biblioteka` WHERE `title`= '$FileDelete';");
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
function comment_record($Comment, $OldName3){
  $connection = mysqli_connect("second", "root", "");
  mysqli_select_db($connection, "bd_1");
  $rec = mysqli_query($connection, "UPDATE `biblioteka` SET `comment`='$Comment' WHERE `title`='$OldName3';");
  mysqli_real_escape_string($connection, $rec);
  }
// Функция для создания файла вручную
function file_create($NewFileName, $NewFileContent){
  if (preg_match("/(^[a-zA-Z0-9]+([a-zA-Z\_0-9\.-]*))$/" , $NewFileName)){
    file_put_contents(DIR.$NewFileName.".txt", $NewFileContent);
  }else {
    echo "В имени файла присутствуют недопустимые символы, или, вы ввели имя файла кириллицей<br>
    Пожалуйста, введите корректное имя файла!<br>
    <p><div>  <form action='create.php'>
        <input type='submit' value='Вернуться'>
        </form>
      </div>
    </p>";
  };
}



// CОЗДАЮТСЯ НОВЫЕ СТРОКИ С КОММЕНТАРИЯМИ, НАДО ЧТОБЫ МЕНЯЛ СУЩЕСТВУЮЩИЕ, он
// ссылается на удаленный файл в бд и тянет из него комментарий, поэтому в окне их несколько
