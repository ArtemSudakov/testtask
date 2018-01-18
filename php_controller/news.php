<?php
include "../inc/dbconnect.php";

if(isset($_POST['params'])){
    $params = $_POST['params'];

    $params = str_replace("\\", "", $params); // вырезаем из джейсон строки обратныые слеши
    $params = json_decode($params,true); // декодируем джейсон строку в массив
    
    $news =  stripcslashes(htmlspecialchars(trim($params['news'])));
}
else {
    $news = 0;
}


$result = mysql_query("SELECT * FROM  `news` WHERE id = $news",$db);
$myrow = mysql_fetch_array($result);


$result_com = mysql_query("SELECT * FROM  `comments` WHERE news_id = $news ORDER BY id DESC",$db);
$myrow_com = mysql_fetch_array($result_com);

printf('


      <div class="content">
            <div class="img">
                <img src="%s">
            </div>
            <div class="title">%s</div>
            <div class="description">
            %s   
            </div>
            <div class="author">%s</div>
            <div class="date_pub">%s</div>
            <div class="clear"></div>
            <div class="title_com">Коментарии</div>
            <div id="all_coment"></div>
            
',$myrow['img'],$myrow['title'],$myrow['text'],$myrow['author'],$myrow['date']);


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
else {
    $error = "Коментариев больше нет";
    echo $error;
}

echo '

            <div class="title_com">Добавить коментарий</div>
            
                <textarea name="text_comment" id="com_text"></textarea>
                <input type="hidden" name="news" value="'.$news.'" id="news_com_id">
                <input type="button" value="Отправить" class="send_com" id="send_comment" onclick="get_coment();">
            
        </div>

';



?>
