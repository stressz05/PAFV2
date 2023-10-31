var toggle = document.getElementById('checkboxPwd');
var text = document.getElementById('MostrarPwd');
toggle.addEventListener("click", checkPwd);

function checkPwd(event) {
    if (toggle.checked) {
        text.style.fontWeight = "bold";
        text.style.color = "black";
        password.type = "text";
        cPassword.type = "text";
    } else {
        text.style.fontWeight = "normal";
        text.style.color = "rgb(168, 168, 168)";
        password.type = "password";
        cPassword.type = "password";
    }
}