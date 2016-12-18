var correctAnswer;
var guessCount=0;
var questionCount = 0;
var totalNumOfQuestions = questions.length;

function generateQuestion(){
    var questionBox = document.getElementById( "questionBox" );
    var presentNumOfQuestions = questions.length;
    var thisQuestionNum = Math.floor( Math.random() * presentNumOfQuestions );

    questionBox.innerText = questions[thisQuestionNum].question;
    correctAnswer = questions[thisQuestionNum].answer;
    questions.splice( thisQuestionNum,1 );
    questionCount++;
}

function generateAnswerOptions(){
    var answerText = document.getElementById( "answerText" );

    for( var i = 0; i<questions.length; i++){
        var opt = document.createElement( "option" );
        opt.value = questions[i].answer;
        opt.innerText = questions[i].answer;
        answerText.appendChild(opt); 
    }
}

function checkAnswer(){
    var answerMsg = document.getElementById( "answerMsg" );
    var answerText = document.getElementById( "answerText" );
    var pageMsgBox = document.getElementById("pageMsgBox");
    var pageMsg = document.getElementById("pageMsg");
    var header = document.getElementById("header");
    var qRem = totalNumOfQuestions - questionCount;
    var thisEmoji = questionCount % correctEmojis.length;

    if( answerText.options[answerText.selectedIndex].value.toLowerCase() == correctAnswer ){

        guessCount = 0;
        
        if( questionCount < totalNumOfQuestions ){
            pageMsg.innerHTML = correctEmojis[thisEmoji].txt;
            pageMsgBox.style.backgroundImage = "url( ../img/" + correctEmojis[thisEmoji].emoji + ")";
            pageMsgBox.style.visibility = "visible"; 

            header.style.height = "100vh";

            setTimeout(
                function(){
                    header.style.height="10vh"; 
                    answerMsg.innerHTML = qRem + " more question" + ((qRem==1) ? "" : "s") + " to go.";
                    answerText.value = "";
                    generateQuestion();
                }, 2000);
        } else {
            header.style.height = "100vh";
            pageMsg.style.fontSize = "4vh";
            pageMsg.innerHTML = "You Have Completed This Practice Session!! <br> Refresh the Page to Practice Again.";
            pageMsgBox.style.backgroundImage = "url( ../img/party.png)";
            pageMsgBox.style.visibility = "visible"; 
        }    
            
    } else {
        guessCount++;
        if( guessCount == 1 ){
            answerMsg.innerHTML = "Please try again";
        }
        if( guessCount == 2 ){
            answerMsg.innerHTML = "The correct Answer is";
            answerText.value = correctAnswer;
            answerButton.value = "";            
            
            setTimeout( 
                function(){ 
                    answerMsg.innerHTML = qRem + " more question" + ((qRem==1) ? "" : "s") + " to go.";
                    answerText.value = "";
                    generateQuestion();
                    answerButton.value = "Enter";
                },4000);
        }
    }
}
        
