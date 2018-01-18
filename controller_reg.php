<?php
$er_msg = 1;
if(isset($_POST['name']) && !empty($_POST['name'])){
    $name = stripcslashes(htmlspecialchars(trim($_POST['name'])));
}
else{
    $er_msg = "Пожалуйста заполните поле имя";
}
if(isset($_POST['lname']) && !empty($_POST['lname'])){
    $lname = stripcslashes(htmlspecialchars(trim($_POST['lname'])));
}
else{
    $er_msg = "Пожалуйста заполните поле фамилия";
}

if(isset($_POST['mail']) && !empty($_POST['mail'])){
    $mail = stripcslashes(htmlspecialchars(trim($_POST['mail'])));
}
else{
    $er_msg = "Пожалуйста заполните поле имейл";
}

if(isset($_POST['pass']) && !empty($_POST['pass'])){
    $pass = stripcslashes(htmlspecialchars(trim($_POST['pass'])));
}
else{
    $er_msg = "Пожалуйста заполните поле пароль";
}

if($er_msg != 1){
    $location = 'Location: reg.php?er_msg='.$er_msg;
    header($location);
    exit();
}

include "inc/dbconnect.php";

$result = mysql_query("INSERT INTO users (`name`, `lname`, `mail`, `pass`) 
VALUES ('$name', '$lname', '$mail', '$pass')",$db);

if($result){
    
    session_start();
    $_SESSION['login'] = $mail;
    $_SESSION['pass'] = $pass;
    
    setcookie("login", $mail, time()+3600*24*7);
    setcookie("pass", $pass, time()+3600*24*7);
    
    
    echo "<meta http-equiv=\"refresh\" content=\"0; URL='index.php'\" />";
    exit();
}
else {
    echo "<meta http-equiv=\"refresh\" content=\"0; URL='reg.php?er_msg=Ошибка при регистрации'\" />";
}


?>