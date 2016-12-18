// Create option tags on fly while running
// Manipulate html while webpage is running
for (var i = 0, len = Things.length; i < len; i++) {
    var opt = document.createElement("option");//create <option>
    opt.value = question[i].answer; //assign value
    opt.innerText = questions[i].answer; //assign text
    answerText.appendChild(opt);
}
