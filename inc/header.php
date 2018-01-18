<?php

if(isset($_SESSION['login']) && isset($_SESSION['pass'])){
    $in = '<a class="header_link" href="reg.php?die=1">Выйти</a>';
}
else if(isset($_COOKIE['login']) && isset($_COOKIE['pass'])){
    session_start();
    $_SESSION['login'] = stripcslashes(htmlspecialchars(trim($_COOKIE['login'])));
    $_SESSION['pass'] = stripcslashes(htmlspecialchars(trim($_COOKIE['pass'])));
    $in = '<a class="header_link" href="reg.php?die=1">Выйти</a>';
}
else {
    $in = '<a class="header_link" href="reg.php">Регистрация | Вход</a>';
}

if(isset($_GET['die'])){
    $die = stripcslashes(htmlspecialchars(trim($_GET['die'])));
    if($die == 1){
        unset($_SESSION['login']);
        unset($_SESSION['pass']);  
        SetCookie("login","");
        SetCookie("pass","");
    }
}

echo '

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Test task</title>
    <link href="css/reset.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <div class="header">
            <div class="header_text">
                <p>
                    <a class="header_link" href="index.php">Главная</a>
                    '.$in.'
                </p>               
            </div>
            <div class="serch">
            
                <input type="text" class="input_text" name="request" id="request_text">
                <input type="button" value="Поиск" class="serch_button" id="serch_go">
            
            </div>
            <div class="clear"></div>
        </div>
            <div class="clear"></div>
            <div id="main"></div>
            




';

?>