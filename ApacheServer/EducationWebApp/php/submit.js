function submit() {
    var name=document.getElementById('username').value;
    var pass=document.getElementById('password').value;
    var email=document.getElementById('email').value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("display").innerHTML = this.responseText;
        }
    }
    // xmlhttp.open("POST", "login.php?username=" + name + "&password=" + pass + "&email=" + email, true);
    xmlhttp.open("GET", "login.php", true);
    xmlhttp.send();
}
