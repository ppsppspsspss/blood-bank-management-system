function live(str){

    if(str==""){
        document.getElementById('message').innerHTML="Please enter a name";
        return;
    }
    let xhttp=new XMLHttpRequest(); 
    xhttp.open('post','../controller/search-user-controller.php',true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('name='+str);
    xhttp.onload=function(){
        document.getElementById('message').innerHTML=this.responseText;
    }

}

function checkEmailValidity(email){ 

    if(email === "") return;

    let xhttp = new XMLHttpRequest(); 
    xhttp.open('post','../controller/email-validation-controller.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('email='+email);
    xhttp.onload=function(){
        document.getElementById('emailError').innerHTML = this.responseText;
        if(this.responseText === "This email already belongs to another account<br>") document.getElementById('button').disabled = true;
        else document.getElementById('button').disabled = false;
    }

}