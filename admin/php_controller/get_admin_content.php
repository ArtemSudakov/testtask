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
    
    
    
    
    
    
$from =  stripcslashes(htmlspecialchars(trim($params['from'])));
if(!$from){
    $from = 0;
}
    
$result = mysql_query("SELECT `id`, `title`, SUBSTRING(`text`, 1, 300) AS `text`, `img`, `author`, `date` FROM  `news` ORDER BY `id` DESC LIMIT $from , 10",$db);
$myrow = mysql_fetch_array($result);
$count = mysql_num_rows($result);


if($myrow){    
    do{
        printf('
        
        <div class="content">
            <div class="img">
                <img src="../%s">
            </div>
            <div class="title">%s</div>
            <div class="description">
                %s ...
            </div>
            <div class="author">%s</div>
            <div class="date_pub">%s</div>
            <div class="clear"></div>
            
            <a class="read_more" onclick="update_news(%s);">Редактировать</a>
            <a class="read_more delete" onclick="delete_news(%s);">Удалить</a>
        </div>
        
        
        ',$myrow['img'],$myrow['title'],$myrow['text'],$myrow['author'],$myrow['date'],$myrow['id'],$myrow['id'],$myrow['id']);
    }
    while($myrow = mysql_fetch_array($result));
    
}
else {
    echo "false";
}

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}








?>