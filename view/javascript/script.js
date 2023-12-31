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

function validateSignUpForm(form){
    let firstName = form.firstName.value;
    let lastName = form.lastName.value;
    let phone = form.phone.value;
    let email = form.email.value;
    let gender;
    if(form.gender1.checked) gender = "Male";
    if(form.gender2.checked) gender = "Female";
    if(form.gender3.checked) gender = "Other";
    let dob = form.dob.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    let flag = true;

    document.getElementById("firstNameError").innerHTML = "";
    document.getElementById("lastNameError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("genderError").innerHTML = "";
    document.getElementById("dobError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("cpasswordError").innerHTML = "";

    if(!firstName) {

        document.getElementById("firstNameError").innerHTML = "Please enter your first name<br>";
        flag = false;

    }
    if(!lastName) {

        document.getElementById("lastNameError").innerHTML = "Please enter your last name<br>";
        flag = false;

    }
    if(!phone) {

        document.getElementById("phoneError").innerHTML = "Please enter your phone<br>";
        flag = false;

    }
    if(!email) {

        document.getElementById("emailError").innerHTML = "Please enter your email<br>";
        flag = false;

    }
    if(!gender) {

         document.getElementById("genderError").innerHTML = "<br>Please enter your gender<br>";
         flag = false;

    }
    if(!dob) {

        document.getElementById("dobError").innerHTML = "<br>Please enter your date of birth<br>";
        flag = false;

    }
    if(!password) {

        document.getElementById("passwordError").innerHTML = "Please enter your password<br>";
        flag = false;

    }
    if(!cpassword) {

        document.getElementById("cpasswordError").innerHTML = "Please re type your password<br>";
        flag = false;

    }

    return flag;


}

function validateEditInfoForm(form){

    
    let firstName = form.firstName.value;
    let lastName = form.lastName.value;
    let phone = form.phone.value;
    let email = form.email.value;
    let gender;
    if(form.gender1.checked) gender = "Male";
    if(form.gender2.checked) gender = "Female";
    if(form.gender3.checked) gender = "Other";
    let dob = form.dob.value;
    let flag = true;

    document.getElementById("firstNameError").innerHTML = "";
    document.getElementById("lastNameError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("genderError").innerHTML = "";
    document.getElementById("dobError").innerHTML = "";

    if(!firstName) {

        document.getElementById("firstNameError").innerHTML = "Please enter your first name<br>";
        flag = false;

    }
    if(!lastName) {

        document.getElementById("lastNameError").innerHTML = "Please enter your last name<br>";
        flag = false;

    }
    if(!phone) {

        document.getElementById("phoneError").innerHTML = "Please enter your phone<br>";
        flag = false;

    }
    if(!email) {

        document.getElementById("emailError").innerHTML = "Please enter your email<br>";
        flag = false;

    }
    if(!gender) {

         document.getElementById("genderError").innerHTML = "<br>Please enter your gender<br>";
         flag = false;

    }
    if(!dob) {

        document.getElementById("dobError").innerHTML = "<br>Please enter your date of birth<br>";
        flag = false;

    }

    return flag;

}

function validateUpdatePasswordForm(form){

    
    let prevpassword = form.prevpassword.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    
    let flag = true;

    document.getElementById("prevPasswordError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("cpasswordError").innerHTML = "";

    if(!prevpassword) {

        document.getElementById("prevPasswordError").innerHTML = "Please enter your previous password<br>";
        flag = false;

    }
    if(!password) {

        document.getElementById("passwordError").innerHTML = "Please enter a new password<br>";
        flag = false;

    }
    if(!cpassword) {

        document.getElementById("cpasswordError").innerHTML = "Please re enter your password<br>";
        flag = false;

    }

    return flag;

}