"use strict"

// XMLHTTPREQUESTS FOCUS ON MESSAGE COMPONENTS
// FOR THE GAMEMASTER

// RECOMMANDED BY W3C
function createXHRequest() { return new XMLHttpRequest(); }

function ClearHelpForm(textarea) { textarea.value = ''; }

// GM
function HelpMessagesGM(idGamestate) {
  if(idGamestate != null) {
    let xhr = createXHRequest();
  
    xhr.open("GET", "gamemaster.php?action=help&idGamestate="+idGamestate+"&helpMessages=", true);
    xhr.setRequestHeader("cache-control", "no-cache");
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("helpMessagesGM").innerHTML = this.responseText;
      }
    };
    xhr.send();  
  } 
}

function HelpFormGM(idGamestate) {
  if(idGamestate == null) document.getElementById("helpFormGM").innerHTML = "";
  else {
    let xhr = createXHRequest();
  
    xhr.open("GET", "gamemaster.php?action=help&idGamestate="+idGamestate+"&helpForm=", true);
    xhr.setRequestHeader("cache-control", "no-cache");
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("helpFormGM").innerHTML = this.responseText;
      }
    };
    xhr.send();   
  } 
}

function SendAnswerGM(idGamestate) {
  let sendAnswer = document.getElementById("answer");
  let xhr = createXHRequest();
    
  xhr.open("GET", "gamemaster.php?action=help&idGamestate="+idGamestate+"&sendAnswer="+sendAnswer.value, true);
  xhr.setRequestHeader("cache-control", "no-cache");
  xhr.send();   
}