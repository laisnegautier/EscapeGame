"use strict"

// JQUERY FUNCTIONS USED DURING A PLAY

// MY JQUERY FUNCTIONS
// Load modal directly when loading the page
$(window).on('load',function(){
  $('#help').hide();
});

// Exit the modal
$('#launchButton').click(function() {
  $('#launchModal').modal('hide');
});

// Help appearance and disappearance
$('#helpButton').click(function() {
  $('#help').toggle();
});

// PARALLAX EFFECTS
$("#bigContainer").mousemove(function(e) {
  parallaxIt(e, ".mainBox", -100);
  parallaxIt(e, ".lensParallax", -60);
  parallaxIt(e, ".backgroundParallax", -30);
});
  
function parallaxIt(e, target, movement) {
  var $this = $("#bigContainer");
  var relX = e.pageX - $this.offset().left;
  var relY = e.pageY - $this.offset().top;
  
  TweenMax.to(target, 1, {
    x: (relX - $this.width() / 2) / $this.width() * movement,
    y: (relY - $this.height() / 2) / $this.height() * movement
  });
}

