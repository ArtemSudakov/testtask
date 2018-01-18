var auth_in = document.querySelector("#auth_in");

auth_in.onclick = function(){
        var auth_login = document.querySelector("#auth_login").value;
        var auth_pass = document.querySelector("#auth_pass").value;

        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php_controller/auth.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
            
        var params_obj_menu = {
            login: auth_login,
            pass: auth_pass
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
                    document.cookie = "login="+auth_login;
                    document.cookie = "pass="+auth_pass;
                    
                    var load_admin = document.createElement("script");
                    
                    load_admin.setAttribute("asynk","");
                    load_admin.setAttribute("src","js/load_admin.js");
                    document.body.appendChild(load_admin);
                    
                    var auth_form = document.querySelector("#auth_form");
                    auth_form.setAttribute("hidden","");
                }
                else {
                    alert("Не верный логин или пароль!");
                }
            }
        }
}



function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}