<?php
if(isset($_POST['params'])){
    $params = $_POST['params'];

    $params = str_replace("\\", "", $params); // вырезаем из джейсон строки обратныые слеши
    $params = json_decode($params,true); // декодируем джейсон строку в массив
    
    $login =  stripcslashes(htmlspecialchars(trim($params['login'])));
    $pass = stripcslashes(htmlspecialchars(trim($params['pass'])));
    $text = stripcslashes(htmlspecialchars(trim($params['text'])));
    $news_id = stripcslashes(htmlspecialchars(trim($params['news_id'])));
}
else {
    echo "false";
    exit();
}




if($login && $pass && $text && $news_id){
 
    include "../inc/dbconnect.php";
    
    $result = mysql_query("SELECT * FROM  `users` WHERE mail = '$login' ",$db);
    $myrow = mysql_fetch_array($result);
    
    
    if($result && $myrow[mail] == $login && $myrow['pass'] == $pass){
        
            $user = $myrow['name']." ".$myrow['lname'];
            $date = date("Y-m-d");
            
            $result = mysql_query("INSERT INTO `testtask`.`comments` (`news_id`, `author`, `text`, `date`) VALUES ('$news_id', '$user', '$text','$date');",$db);
            if($result){
                 printf('
                        <div class="comments">
                            <div class="coment">
                                <p class="name">%s</p>
                                <p class="comment_text">%s</p>
                                <p class="com_date">%s</p>
                            </div>
                        </div>
                 
                 ',$user,$text,$date);
            }
        
    }
    else {
        echo "false";
    }
}
else {
    echo "false";
}
?>

