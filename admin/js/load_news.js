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
            from: 0,
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
                var div = document.createElement("div");
                div.innerHTML = xhr.responseText;
                wrapper.appendChild(div);
                
                from +=10;
                
                load_more.setAttribute("class","get_more");
                load_more.setAttribute("onclick","more("+from+");");
                load_more.innerHTML = "Загрузить ещё";
                wrapper.appendChild(load_more);
                
            }
            
        }
        
        
        
        
        
        
        
        
        
        
        function open_news(news){
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'php_controller/news.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
                
            var params_obj_menu = {
                news: news 
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
                        wrapper.innerHTML = "";
                        wrapper.appendChild(div);
                    }
                    else {
                        load_more.innerHTML = "Ошибка";
                    }
                }
            }
        }
        
    