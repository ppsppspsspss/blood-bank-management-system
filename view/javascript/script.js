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

function checkEmailExist(){
    let emailErr = document.getElementById('emailError');
    let email = document.getElementById('email').value;
    if(email.length == 0) {
        email.innerHTML = "";
        return;
    }
    
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/email-validation-controller.php?email='+email, true);
    xhttp.send();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == 'This email already belongs to another account<br>'){
                emailErr.innerHTML = "";
                
            }
            else{
                emailErr.innerHTML = "No account found with this Email<br>";
            }
        }
    }
}