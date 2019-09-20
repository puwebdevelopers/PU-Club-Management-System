function passwordVerify() {

    var pass1 = document.getElementById("inputPassword1").value;
    var pass2 = document.getElementById("inputPassword2").value;

    if (pass1 != pass2) {
        document.getElementById("passwordError").innerHTML = "Password do not match";
        document.getElementById("passwordError").style.backgroundColor = "red";
        document.getElementById("passwordError").style.color = "white";
        document.getElementById("btnReg").disabled = true;
    } else {
        document.getElementById("passwordError").innerHTML = "Passwords match";
        document.getElementById("passwordError").style.backgroundColor = "green";
        document.getElementById("passwordError").style.color = "white";
        document.getElementById("btnReg").disabled = false;
    }
}