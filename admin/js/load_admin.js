function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

var login = getCookie("login");
var pass = getCookie("pass");

var from = 0;    
var wrapper = document.querySelector("body");
var load_more = document.createElement("a");



        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php_controller/get_admin_content.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
            
        var params_obj_menu = {
            login: login,
            pass: pass,
            from: 0
        }
        
        var json_params_menu = JSON.stringify(params_obj_menu);
        var params = 'params=' + encodeURIComponent(json_params_menu);
        xhr.send(params);
        
        var add_btn = document.querySelector("#add_btn");
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;
            if (xhr.status != 200){
                alert(xhr.status + ': ' + xhr.statusText);      
            } 
            else {
                if(xhr.responseText != "false"){
                   /* var div = document.createElement("div");
                    div.innerHTML = xhr.responseText;
                    
                    document.body.appendChild(div);*/
                    var div = document.createElement("div");
                    div.innerHTML = xhr.responseText;
                    wrapper.appendChild(div);
                    
                    from +=10;
                    
                    load_more.setAttribute("class","get_more");
                    load_more.setAttribute("onclick","more("+from+");");
                    load_more.innerHTML = "Загрузить ещё";
                    wrapper.appendChild(load_more);
                    
                    
                    var auth_form = document.querySelector("#auth_form");
                    auth_form.setAttribute("hidden","");
                    
                    
                    
                    add_btn.removeAttribute("hidden");
                    
                }
                else {
                    alert("Не верный логин или пароль!");
                    var auth_form = document.querySelector("#auth_form");
                    auth_form.removeAttribute("hidden");
                }
            }
        }
        
        
        var cancel_add = document.querySelector("#cancel_add");
        cancel_add.onclick = function(){
            send_news_form.setAttribute("hidden","");
        }
        
        var send_news_form = document.querySelector("#send_news_form");
        add_btn.onclick = function() {
            send_news_form.removeAttribute("hidden");    
        }
        
        
        
        
        function more(from_){
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'php_controller/get_admin_content.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
                
            var params_obj_menu = {
                from: from_,
                login: login,
                pass: pass
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
                    if(xhr.responseText != "false"){
                        var div = document.createElement("div");
                        div.innerHTML = xhr.responseText;
                        wrapper.insertBefore(div,load_more);
                    }
                    else {
                        load_more.innerHTML = "Записей больше нет";
                    }
                }
            }    
            from = from + 10;
            load_more.setAttribute("onclick","more("+from+");");
                
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        function delete_news(id){
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'php_controller/delete.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
                
            var params_obj_menu = {
                login: login,
                pass: pass,
                news_id: id
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
                    if(xhr.responseText == "true"){
                        alert("Запись Удалена");
                        
                    }
                    else {
                        alert("Произошла ошибка");
                    }
                }
            }    
            from = from + 10;
            load_more.setAttribute("onclick","more("+from+");");
                
        }
        
        document.body.onclick = function(e){
            e = e.target;
            if(e.className == "read_more delete"){var e_parent = e.parentNode; e_parent.setAttribute("hidden","");}
        }



        
              
        
        
        
        
        
        
        
        function close_upd(){
            var close_upd = document.querySelector("#close_upd").parentNode;
            close_upd.setAttribute("hidden","");
        }
        
        
        var upd = document.createElement("div");
        function update_news(id){
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'php_controller/update.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
                
            scrollTo(0,0);
                
            var params_obj_menu = {
                login: login,
                pass: pass,
                news_id: id
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
                    if(xhr.responseText != "false"){
                        upd.innerHTML = xhr.responseText;
                        document.body.appendChild(upd);
                    }
                    else {
                        alert("Произошла ошибка");
                    }
                }
            } 
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        function update_(id){
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'php_controller/update_db.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
                
                
            var title = document.querySelector("#upd_title_"+id).value;
            var text = document.querySelector("#upd_text_"+id).value;
            
                
                
            var params_obj_menu = {
                login: login,
                pass: pass,
                news_id: id,
                title: title,
                text: text
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
                    if(xhr.responseText == "true"){
                        upd.innerHTML = xhr.responseText;
                        document.body.appendChild(upd);
                        alert("Запись обновлена!");
                        location.reload();
                    }
                    else {
                        alert("Произошла ошибка");
                    }
                }
            } 
        }
        
        