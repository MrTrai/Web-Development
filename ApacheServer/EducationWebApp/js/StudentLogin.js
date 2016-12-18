/*
$(document).ready(function() {
    $("#Get-Btn").click(function() {
        $.post("getJSON.php",
            {
                username: document.getElementById('username').value,
                password: document.getElementById('password').value,
                email: document.getElementById('email').value
            },
        function(data,status){
            var obj = JSON.parse(data); for (var i = 0, len = obj.length; i < len; i++) {
                var div = document.createElement('div');
                div.innerHTML = obj[i].firstname + obj[i].lastname + obj[i].email + "<br/>";
                document.getElementById("display").appendChild(div);
            }
        });
    });
    var json;
    $("#loginbutton").click(function() {
        $.post("../php/CheckData.php",
            {
                username: document.getElementById('username').value,
                password: document.getElementById('password').value,
            },
        function(data,status){
            // console.log(data);
            json=JSON.parse(data);
            localStorage.setItem("json", json);
            window.location = "../html/StudentPage.html";
        });
    });

    var storeJson = localStorage.getItem("json");
    $("#studentname").html(storeJson[0].Username);
});

*/
