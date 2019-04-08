"use strict"

// JAVASCRIPT FUNCTIONS USED DURING A PLAY
// FOCUSED ON THE COMPONENTS AND XMLHTTPREQUESTS

// RECOMMANDED BY W3C
function createXHRequest() { return new XMLHttpRequest(); }

function UpdateComponentNumberRiddle(step) {
  let xhr = createXHRequest();
    
  xhr.open("GET", "index.php?action=play&numberRiddle="+step, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("numberRiddle").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function UpdateComponentPreviousRiddle(step) {
    let xhr = createXHRequest();
    let previousStep = step - 1;

  if(step == 1) xhr.open("GET", "index.php?action=play&previousRiddleFirst="+previousStep, true);
  else xhr.open("GET", "index.php?action=play&previousRiddle="+previousStep, true);

  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("previousRiddle").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function UpdateComponentNextRiddle(step) {
  let nextStep = parseInt(step) + 1;
  let xhr = createXHRequest();

  xhr.open("GET", "index.php?action=play&nextRiddle="+nextStep, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("nextRiddle").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function UpdateComponentNextRiddleValidated(step) {
  let nextStep = parseInt(step) + 1;
  let xhr = createXHRequest();

  xhr.open("GET", "index.php?action=play&nextRiddleValidate="+nextStep, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("nextRiddle").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function UpdateComponentAnswerForm(step) {
  let xhr = createXHRequest();

  xhr.open("GET", "index.php?action=play&answerForm="+step, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("answerForm").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function UpdateComponentValidationRiddle(step) {
  let xhr = createXHRequest();
    
  xhr.open("GET", "index.php?action=play&validationRiddle="+step, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("validationRiddle").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function UpdateComponentTip(step) {
  let xhr = createXHRequest();

  xhr.open("GET", "index.php?action=play&tip="+step, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tipComponent").style.display="none";
      document.getElementById("tipComponent").innerHTML = this.responseText;
      // DISPLAY ONLY IF 1 MINUTE PASSED
      setTimeout(function(){document.getElementById("tipComponent").style.display="block";}, 60000);
    }
  };
  xhr.send();   
}

function UpdateLastStep(step) {
  let xhr = createXHRequest();

  xhr.open("GET", "index.php?action=play&updateLastStep="+step, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.send();   
}

function UpdateResolution(step) {
  let xhr = createXHRequest();

  xhr.open("GET", "index.php?action=play&updateResolution="+step, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.send();   
}

function UpdateVictory(lastStepValidated, totalRiddles, idGamestate) {
  if(lastStepValidated == totalRiddles - 1) window.location.replace("index.php?action=play&victory="+idGamestate);
}

function RedirectChronoEnded(idGamestate) { window.location.replace('index.php?action=play&timerEnd='+idGamestate); }

function UpdateAllComponents(step, lastStepValidated) {
  step = parseInt(step);
  lastStepValidated = parseInt(lastStepValidated);

  UpdateComponentValidationRiddle(step);
  UpdateLastStep(step);

  UpdateComponentNumberRiddle(step);
  UpdateComponentPreviousRiddle(step);

  if(step <= lastStepValidated) UpdateComponentNextRiddleValidated(step);
  else {
    UpdateComponentNextRiddle(step);
    UpdateResolution(step);
  }

  UpdateComponentAnswerForm(step);
  UpdateComponentTip(step);
}