





function write(messagge)
{
par  = document.getElementById("main-section");
text = document.createTextNode(messagge);
par.appendChild(text);
}



function read(){
    var xmlhttp = new XMLHttpRequest();
    
    alert("12");
    xmlhttp.open("POST", "../php/db-connection.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    alert("1e2");
    xmlhttp.onreadystatechange = function() {
        
        if (this.readyState === 4 || this.status === 200){ 
            write(this.responseText); // echo from php
            alert("23");
        }       
    };
    xmlhttp.send("id=" + id);
    alert("34");
}

function httpGetAsync(theUrl, callback)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", theUrl, true); // true for asynchronous 
    xmlHttp.send(null);
}









