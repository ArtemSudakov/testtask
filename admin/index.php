<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="admin" />

	<title>Панель администрирования</title>
    <link href="css/admin.css" rel="stylesheet">
    <link href="../css/reset.css" type="text/css" rel="stylesheet">
    <link href="../css/main.css" type="text/css" rel="stylesheet">
</head>

<body>
<div id="add_btn" hidden="">Добавить запись</div>
<?php
if(isset($_COOKIE['pass']) && isset($_COOKIE['login'])){
    
    $login =  stripcslashes(htmlspecialchars(trim($_COOKIE['login'])));
    $pass = stripcslashes(htmlspecialchars(trim($_COOKIE['pass'])));
    

    include "../inc/dbconnect.php";

    $result = mysql_query("SELECT * FROM  `users` WHERE mail = '$login' ",$db);
    $myrow = mysql_fetch_array($result);

    if($result && $myrow['mail'] == $login && $myrow['pass'] == $pass && $myrow['role'] == "admin"){
        $auth = 1;
    }
    else {
        $auth = 0;
    }
}
if(1){
 echo '<div class="send_form" id="send_news_form" hidden="">
            <form action="php_controller/add_news.php" method="POST" enctype="multipart/form-data">
                <p class="title_inp">Название новости</p>
                <input type="text" name="title">
                
                <p class="title_inp">Текст новости</p>
                <textarea name="text"></textarea>
                
                <p class="title_inp">Автор новости</p>
                <input type="text" name="author">
                
                <p class="title_inp">Выберите картинку</p>
                <input type="file" name="uploadfile">
                
                <input type="submit" value="Отправить">
                <input type="button" value="Отмена" id="cancel_add">
            </form>
        </div>
        ';   
}
?>

        <div id="auth_form">
            <p>Логин</p>
            <input type="text" id="auth_login">
            
            <p>Пароль</p>
            <input type="text" id="auth_pass">
            
            <input type="button" id="auth_in" value="Войти">
        </div>
        <script src="js/on_auth.js" async=""></script>
        <script src="js/load_admin.js" async=""></script>
        
        
        




</body>
</html>