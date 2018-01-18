<?php

if(isset($_POST['params'])){
    $params = $_POST['params'];

    $params = str_replace("\\", "", $params); // вырезаем из джейсон строки обратныые слеши
    $params = json_decode($params,true); // декодируем джейсон строку в массив
    
    $login =  stripcslashes(htmlspecialchars(trim($params['login'])));
    $pass = stripcslashes(htmlspecialchars(trim($params['pass'])));
    $news_id = stripcslashes(htmlspecialchars(trim($params['news_id'])));


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
    
    
    
    
    
    
    
$result = mysql_query("SELECT * FROM `news` WHERE id = $news_id",$db);
$myrow = mysql_fetch_array($result);


$result_com = mysql_query("SELECT * FROM  `comments` WHERE news_id = $news_id ORDER BY id DESC",$db);
$myrow_com = mysql_fetch_array($result_com);

echo '<div style=" overflow: scroll; position: absolute; top: 5%; left: 5%; width: 80%; padding: 5%; background-color: #ffffff; box-shadow: 0 0 15px 5px #cdcdcd; border-radius: 10px;">
 <div onclick="close_upd();" id="close_upd" style="position: absolute; top: 15px; right: 15px; padding: 3px 5px; border-radius: 5px; cursor: pointer; border:  1px solid #cdcdcd;;">X</div>
';

printf('


      <div class="content">
            <div class="img">
                <img src="../%s">
            </div>
            <div class="title"><input type="text" value=" %s " id="upd_title_%s"></input></div>
            <div class="description">
            <textarea id="upd_text_%s">%s</textarea>   
            </div>
            <div class="author">%s</div>
            <div class="date_pub">%s</div>
            <div class="clear"></div>
            <a class="read_more" onclick="update_(%s);">Обновить</a>
            
            <div id="all_coment"></div>
            
            
',$myrow['img'],$myrow['title'],$myrow['id'],$myrow['id'],$myrow['text'],$myrow['author'],$myrow['date'],$myrow['id']);


if($myrow_com){    
    do{
        printf('
        
            <div class="comments">
                <div class="coment">
                    <p class="name">%s</p>
                    <p class="comment_text">%s</p>
                    <p class="com_date">%s</p>
                </div>
            </div>
            
        
        ',$myrow_com['author'],$myrow_com['text'],$myrow_com['date']);
    }
    while($myrow_com = mysql_fetch_array($result_com));
    
    
}
  echo "</div>";  
    
    
    
}
else {
    echo "false";
}



?>

