function checkValidation() {
    let email = document.forms["loginForm"]["email"].value;
    let password = document.forms["loginForm"]["password"].value;
    if(email === "" || password === "") {
        if(email === "") {
            document.getElementById('emailValidation').innerHTML="email giriniz";
        }else {
            document.getElementById('emailValidation').innerHTML="";
        }
        if(password === "") {
            document.getElementById('passwordValidation').innerHTML="parola giriniz";
        }else {
            document.getElementById('passwordValidation').innerHTML="";
        }
        return false;
    }

    return true;
}