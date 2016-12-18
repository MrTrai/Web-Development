var i = 0;
function changeFunction() {
    if (i == 1) {
        document.getElementById("demo").innerHTML = 'Hoho';
        i = 0;
    } else {
        document.getElementById("demo").innerHTML = 'Another thing';
        i = 1;
    }
}

