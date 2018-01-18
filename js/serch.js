function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

var serch_go = document.querySelector("#serch_go");


serch_go.onclick = function(){
    var request_text = document.querySelector("#request_text");
    request_text = request_text.value;
    
    
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php_controller/serch.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');    
            
        var params_obj_menu = {
            request: request_text
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
                wrapper.innerHTML = "";
                wrapper.appendChild(div);
                
            }
            
        }    
}