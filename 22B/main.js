//variavel do quiz
var quiz = document.getElementById("quiz");
//variavel do enunciado
var ques = document.getElementById("question");
// variaveis das alternativas
var opt1 = document.getElementById("option1");
var opt2 = document.getElementById("option2");
var opt3 = document.getElementById("option3");
var opt4 = document.getElementById("option4");
// variavel resultado
var res = document.getElementById("result");
//botoes pra sair e proxima pergunta
var nextbutton = document.getElementById("next");
var q = document.getElementById('quit');
// variavel com a quantidade de perguntas
var tques = questions.length;
// varaivel com o valor de acertos
var score=0;
// variavel contadora com a pegunta atual
var quesindex=0;

function quit(){
    quiz.style.display='none';
    result.style.display='';
    q.style.display="none";
    var f = score/tques;
    result.textContent="SCORE ="+f*100;    
}

function give_ques(quesindex){
    ques.textContent=quesindex+1+". "+questions[quesindex][0];
    opt1.textContent=questions[quesindex][1];
	opt2.textContent=questions[quesindex][2];
	opt3.textContent=questions[quesindex][3];
	opt4.textContent=questions[quesindex][4];
	 return;// body...

}