<!DOCTYPE HTML>
<html ng-app= "myQuiz">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Test Your Knowledge: Saturn</title>
		<link rel="stylesheet" type="text/css" href="css/quiz.css">
	</head>
	<body>

		<div id="myQuiz" ng-controller="QuizController">
            <div class="progress">
                <div class="
                         {{($index===activeQuestion)?'on':'off'}}   {{(myQuestion.questionState==='answered')?'answered':'unanswered'}}
                         {{(myQuestion.correctness==='correct')?'correct':'incorrect'}}" 
                     ng-repeat="myQuestion in myQuestions"></div>
            </div>
            <div class="intro {{(activeQuestion>-1)?'inactive':'active'}}">
                <h2>Welcome</h2>
                <p>click begin to test your knowledge</p>
                <p class="btn" ng-click="activeQuestion=0">Begin</p>
            </div>
            <div class="question {{($index===activeQuestion)?'active':'inactive'}} {{(myQuestion.questionState==='answered')?'answered':'unanswered'}}"
                 ng-repeat="myQuestion in myQuestions">
               <p class="txt">{{myQuestion.question}}</p>
               <p class="ans"
                 ng-click="selectAnswer($parent.$index,$index)"
                  ng-class="{
                            image:Answer.image,
                            selected:isSelected($parent.$index,$index),
                            correct:isCorrect($parent.$index,$index)
                            }"
                  ng-style="{'background-image':'url({{Answer.image}})'}"
                  ng-repeat="Answer in myQuestions[$index].answers">{{Answer.text}}
                </p>
               <div class="feedback">
                   <p ng-show="myQuestion.correctness==='correct'">You are <strong>Correct</strong></p>
                   <p ng-show="myQuestion.correctness==='incorrect'">Oops! That is incorrect</p>
                   <p>{{myQuestion.feedback}}</p>
                   <div class="btn" ng-click="selectContinue()">Continue</div>
                </div>
            </div>
            <div class="results {{(totalQuestions===activeQuestion)?'active':'inactive'}}">
                <h3>Results</h3>
                <p>You scored {{percentage}}% by correctly answering {{score}} of the total {{totalQuestions}} questions</p>
                <p>Use the link below to challange your friends</p>
                <div class="share">
                    <a class="btn email" href="#">Email</a>
                    <a class="btn twitter" href="#">Tweet</a>
                </div>
            </div>
        </div>
        <script src="js/angular.js" type="text/javascript"></script>
        <script src="js/quiz.js" type="text/javascript"></script>
	</body>
</html>