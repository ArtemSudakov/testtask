function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}



function get_coment(){
    var news_com_id = document.querySelector("#news_com_id").value;
    var com_text = document.querySelector("#com_text").value;
    
    var login = getCookie("login");
    var pass = getCookie("pass");

    if(login && pass){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php_controller/add_comment.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
            
        var params_obj_menu = {
            login: login,
            pass: pass,
            news_id: news_com_id,
            text: com_text 
        }
        
        var json_params_menu = JSON.stringify(params_obj_menu);
        var params = 'params=' + encodeURIComponent(json_params_menu);
        xhr.send(params);
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;
            if (xhr.status != 200){
                alert(xhr.status + ': ' + xhr.statusText);      
            } 
            else {
                var div = document.createElement("div");
                div.innerHTML = xhr.responseText;
                
                var com_text_area = document.querySelector("#com_text");
                if(xhr.responseText != "false"){
                    var all_coment = document.querySelector("#all_coment");
                    all_coment.appendChild(div);
                    com_text_area.value = "Комментарий добавлен!";    
                }
                else {
                    com_text_area.value = "Ошибка.";
                }
                
                
                
                
                
            }
            
        }   
    }
    else{
        var com_text_area = document.querySelector("#com_text");
        com_text_area.value = "Зарегистрируйтесь, чтобы оставить комментарий.";
    }
}