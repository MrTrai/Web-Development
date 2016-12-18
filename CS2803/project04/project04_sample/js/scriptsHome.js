function checkPassword(){
    var userid = document.getElementById("userid").value;
    var userpwd = document.getElementById("userpwd").value;
    var replyBox = document.getElementById("passwordCheckReplyBox");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            replyBox.style.visibility = "visible";
            replyBox.innerHTML = this.responseText;
            setTimeout(function(){ replyBox.style.visibility="hidden"; }, 3000);
        }
    }
    xhttp.open("GET", "checkPassword.php?userid=" + userid + "&userpwd=" + userpwd , true);
    xhttp.send();

}

function showPasswordEntry(e){
    document.getElementById("userid").value = e.id;
    document.getElementById("passwordBox").style.visibility = "visible";
    document.getElementById("userpwd").value = "";
    document.getElementById("userpwd").focus();
}
