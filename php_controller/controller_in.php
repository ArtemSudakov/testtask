<?php
$er_msg = 1;
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

    $result = mysql_query("SELECT * FROM  `users` WHERE mail = '$mail' ",$db);
    $myrow = mysql_fetch_array($result);

if($result && $myrow[mail] == $mail && $myrow['pass'] == $pass){
    
    session_start();
    $_SESSION['login'] = $mail;
    $_SESSION['pass'] = $pass;
    
    setcookie("login", $mail, time()+3600*24*7);
    setcookie("pass", $pass, time()+3600*24*7);
    
    
    echo "<meta http-equiv=\"refresh\" content=\"0; URL='index.php'\" />";
    exit();
}
else {
    echo "<meta http-equiv=\"refresh\" content=\"0; URL='reg.php?er_msg=Ошибка при входе'\" />";
}


?>