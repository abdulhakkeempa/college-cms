import './bootstrap';

function loginValidate(form){
    if(form.email.value!="" & form.password.value!=""){
        var div = invalidButton.parentElement;
        setTimeout(function(){ 
            div.style.opacity = "1";
            div.style.display = "block"; 
        }, 600);
    }
}

var loginForm = document.getElementById("login-form")
loginForm.onsubmit = function(event) {
    event.preventDefault();
    loginValidate(loginForm)
}; 

var invalidButton = document.getElementById("closebtn")
invalidButton.addEventListener("click", function() {
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
});