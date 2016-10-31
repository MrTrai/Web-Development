var questionAnswer;
var score = 0;

function generateQuestion() {
    var questionsNum = questions.length;
    var questionDiv = document.getElementById("Questions");
    var index = Math.floor( Math.random() * questionsNum);

    questionDiv.innerText = index;
    questionDiv.innerText = questions[index].question;
    questionAnswer = questions[index].answer;
    // questions.splice( index, 1 );
}

function checkAnswer(i) {
    var chosenAnswer = document.getElementById(i);
    var scoreAnswer = document.getElementById("score");

    if ( i == questionAnswer) {
        score++;
        scoreAnswer.innerText = "Score: " + score;
        generateQuestion();
        document.getElementByClass("inline").style.display = "block";
    } else {
        chosenAnswer.style.display = "none";
    }
}

