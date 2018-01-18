<?php
if(isset($_COOKIE['pass']) && isset($_COOKIE['login'])){
    
    $login =  stripcslashes(htmlspecialchars(trim($_COOKIE['login'])));
    $pass = stripcslashes(htmlspecialchars(trim($_COOKIE['pass'])));
    

    include "../../inc/dbconnect.php";

    $result = mysql_query("SELECT * FROM  `users` WHERE mail = '$login' ",$db);
    $myrow = mysql_fetch_array($result);

    if($result && $myrow['mail'] == $login && $myrow['pass'] == $pass && $myrow['role'] == "admin"){
        $auth = 1;
    }
    else {
        $auth = 0;
    }
}
if($auth){
    
    
    $ok = 1;
    
    if(isset($_POST['title'])){
        $title = htmlspecialchars(stripslashes(trim($_POST['title'])));
    }
    else {$ok = 0;}
    
    if(isset($_POST['text'])){
        $text = htmlspecialchars(stripslashes(trim($_POST['text'])));
    }
    else {$ok = 0;}
    if(isset($_POST['author'])){
        $author = htmlspecialchars(stripslashes(trim($_POST['author'])));
    }
    else {$ok = 0;}
    
    $uploaddir = '../../images/';
    $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
    
    $fname = "images/".$_FILES['uploadfile']['name'];
    $date = date("Y-m-d");
    
    // Копируем файл из каталога для временного хранения файлов:
    if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
    {
    echo "<h3>Файл успешно загружен на сервер</h3>";
    }
    else {$ok = 0;}
    
    $text = str_replace("\r\n", "<br>", $text);
    
    if($ok){
        include "../../inc/dbconnect.php";
        $result = mysql_query("
        INSERT INTO `news` (`title`, `img`, `text`, `author`, `date`) VALUES ('$title', '$fname', '$text', '$author', '$date');
        ",$db);
        if($result){
            echo "<script>alert('Запись добавлена!');</script>";
            echo '<meta http-equiv="refresh" content="0; URL=\'../\'" />';
        }
    }
}
else {
    echo "<script>alert('Войдите для добавления записи!');</script>";
    echo '<meta http-equiv="refresh" content="0; URL=\'../\'" />';
}
?>