<?php

include "../inc/dbconnect.php";



if(isset($_POST['params'])){
    $params = $_POST['params'];

    $params = str_replace("\\", "", $params); // вырезаем из джейсон строки обратныые слеши
    $params = json_decode($params,true); // декодируем джейсон строку в массив
    
    $request =  stripcslashes(htmlspecialchars(trim($params['request'])));
  
    $result = mysql_query("SELECT * FROM  `news` WHERE `title` LIKE '%$request%' OR `text` LIKE '%$request%' OR `author` LIKE '%$request%' LIMIT 0,15",$db);
    $myrow = mysql_fetch_array($result);
    
    $count = mysql_num_rows($result);

echo '


<div class="content">
    <div class="serch_result">Результаты поиска ('.$count.')</div>
</div>

';
    
    
if($myrow){    
    do{
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
            
            <a class="read_more" onclick="open_news(%s)">Читать</a>    
        </div>
        
        
        ',$myrow['img'],$myrow['title'],$myrow['text'],$myrow['author'],$myrow['date'],$myrow['id']);
    }
    while($myrow = mysql_fetch_array($result));
    
}
else {
    $error = "Записей нет";
}

}
?>
