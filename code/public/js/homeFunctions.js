"use strict"

// RECOMMANDED BY W3C
function createXHRequest() { return new XMLHttpRequest(); }

// CHECK IF PASSWORDS ARE THE SAME DURING INSCRIPTION
function validateInscriptionForm() {
    let password = document.forms['inscriptionForm']["passwordTeam"].value;
    let passwordConfirm = document.forms['inscriptionForm']["passwordTeamConfirm"].value;

    if(password != passwordConfirm) {
        document.getElementById("errorPasswords").innerHTML = '<div style="text-align: left; border: none; background: none; margin-top: -100px;" role="alert"><span style="background-color: rgba(102, 19, 19, 0.767); color: whitesmoke; padding: 20px 30px; border-radius: 3px;">Les mots de passe ne sont pas identiques !</span></div>';
        return false;
    }
    
    return true;
}

// CREATE INPUT TO ADD A NEW PLAYER DURING INSCRIPTION
var i = 1;
function addPlayer() {
    if(i < 5)   // max 5 players
    {
        let input = document.createElement('input');
        
        input.setAttribute('class','form-control');
        input.setAttribute('style','margin-bottom: 16px');
        input.setAttribute('type','text');
        input.setAttribute('maxlength','25');
        input.setAttribute('name','players[]');
        input.setAttribute('placeholder','Nom du joueur '+(i+1));
    
        document.getElementById('players').appendChild(input);
          
        i++
    }
}

// LOCATE THE LOADING COMPONENT WHEN WAITING FOR A GAMEMASTER TO ACCEPT THE GAME
function WaitGM() {
    let xhr = createXHRequest();
    
    xhr.open("GET", "index.php?action=waitGM&validation=", true);
    xhr.setRequestHeader("cache-control", "no-cache");
      
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("waitGM").innerHTML = this.responseText;
        }
    };
  
    xhr.send();  
}