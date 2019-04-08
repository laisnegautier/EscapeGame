"use strict"

// JAVASCRIPT FUNCTIONS USED DURING A PLAY

// RECOMMANDED BY W3C
function createXHRequest() { return new XMLHttpRequest(); }

// Called when answering a riddle
function CheckAnswerRiddle(waitedAnswer, step, lastStepValidated, totalRiddles, idGamestate) {
  let answer = document.getElementById("answer").value;
  let validationRiddle = document.getElementById("validationRiddle");

  if(answer.toLowerCase() == waitedAnswer.toLowerCase()) {
    validationRiddle.innerHTML = '<div id="display" class="validationRiddle" style="color: rgb(19, 112, 167);">Bonne réponse !</div>';
    UpdateComponentNextRiddleValidated(step);
    setTimeout(function(){document.getElementById("display").style.display="none";},5000);
    UpdateVictory(lastStepValidated, totalRiddles, idGamestate);
  }
  else {
    validationRiddle.innerHTML = '<div id="display" class="validationRiddle" style="color: brown;">Mauvaise réponse !</div>';
    setTimeout(function(){document.getElementById("display").style.display="none";},2000);
  }
}

// Trigger on keyboard to get rid of a button that may be annoying 
function PressEnter() {
  document.getElementById("answer")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
      document.getElementById("sendAnswer").click();
    }
  });
}

// Called when loading the page then each second
function ComponentTimer() {
  let xhr = createXHRequest();

  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("timerComponent").innerHTML = this.responseText;
    }
  };

  xhr.open("GET", "index.php?action=play&timer=", true);
  xhr.send();
}

// Called only once : with the first page loading
// It's an issue actually
function ComponentMusic() {
  let xhr = createXHRequest();

  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("musicComponent").innerHTML = this.responseText;
    }
  };

  xhr.open("GET", "index.php?action=play&music=", true);
  xhr.send();   
}