function live(str){
    if(str==""){
        document.getElementById('message').innerHTML="Please enter a username";
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