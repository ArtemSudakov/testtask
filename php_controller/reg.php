<?php
include "inc/header.php"; 
include "inc/dbconnect.php"; 
?>
<div class="reg_wrap">
    <div class="top_text">
    Вход
    </div>
    <div class="reg_form">
    <form action="controller_in.php" method="POST">
    
        <p class="title_inp">Email</p>
        <input type="text" name="mail">
        
        <p class="title_inp">Пароль</p>
        <input type="password" name="pass">
    
        <input type="submit" value="Войти" class="reg_button">
        
        <div class="error">
        <?php if(isset($_GET['er_msg'])){$er = stripcslashes(htmlspecialchars(trim($_GET['er_msg']))); echo $er;} ?>
        </div>
        
        
    </form>
    </div>
</div>
<div class="reg_wrap">
    <div class="top_text">
    Регистрация
    </div>
    <div class="reg_form">
    <form action="controller_reg.php" method="POST">
        <p class="title_inp">Имя</p>
        <input type="text" name="name" >
        
        <p class="title_inp">Фамилия</p>
        <input type="text" name="lname">
        
        <p class="title_inp">Email</p>
        <input type="text" name="mail">
        
        <p class="title_inp">Пароль</p>
        <input type="password" name="pass">
    
        <input type="submit" value="Регистрация" class="reg_button">
        
        <div class="error">
        <?php if(isset($_GET['er_msg'])){$er = stripcslashes(htmlspecialchars(trim($_GET['er_msg']))); echo $er;} ?>
        </div>
        
        
    </form>
    </div>
</div>








<?php include "inc/futer.php"; ?>