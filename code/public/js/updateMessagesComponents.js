"use strict"

// XMLHTTPREQUESTS FOCUS ON MESSAGE COMPONENTS
// FOR THE PLAYERS

// Every second all the messages are actualized
window.onload(HelpForm(), setInterval(function() { HelpMessages(); }, 1000));

function HelpMessages() {
  let xhr = createXHRequest();
  
  xhr.open("GET", "index.php?action=play&helpMessages=", true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("helpMessages").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function HelpForm() {
  let xhr = createXHRequest();
  
  xhr.open("GET", "index.php?action=play&helpForm=", true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("helpForm").innerHTML = this.responseText;
    }
  };
  xhr.send();   
}

function SendQuestion() {
  let sendQuestion = document.getElementById("question");
  let xhr = createXHRequest();

  xhr.open("GET", "index.php?action=play&sendQuestion="+sendQuestion.value, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.send();   
}

// When the message has been sent
function ClearHelpForm(textarea) { textarea.value = ''; }
