<?php

if(isset($_POST['params'])){
    $params = $_POST['params'];

    $params = str_replace("\\", "", $params); // вырезаем из джейсон строки обратныые слеши
    $params = json_decode($params,true); // декодируем джейсон строку в массив
    
    $login =  stripcslashes(htmlspecialchars(trim($params['login'])));
    $pass = stripcslashes(htmlspecialchars(trim($params['pass'])));

    include "../../inc/dbconnect.php";

    $result = mysql_query("SELECT * FROM  `users` WHERE mail = '$login' ",$db);
    $myrow = mysql_fetch_array($result);

    if($result && $myrow['mail'] == $login && $myrow['pass'] == $pass && $myrow['role'] == "admin"){
        $auth = 1;
    }
    else {
        echo "false";
        exit();
    }
}
else {
    echo "false";
    exit();
}

if($auth){
    
    
    $news_id = stripcslashes(htmlspecialchars(trim($params['news_id'])));
    $result = mysql_query("DELETE FROM `news` WHERE `id` = '$news_id'",$db);
    if($result){
        echo "true";
    }
    else {
        echo "false";
    }
    
    
    
    
    
}
else {
    echo "false";
}

?>