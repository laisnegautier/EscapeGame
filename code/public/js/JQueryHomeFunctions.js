"user strict"

// PARALLAX EFFECTS
$("#bigContainer").mousemove(function(e) {
  parallaxIt(e, ".escapeWord", -200);
  parallaxIt(e, ".greatWord", -180);
  parallaxIt(e, ".wavesReturned", -70);
  parallaxIt(e, ".waves", -140);
  parallaxIt(e, ".wavesCastle", -30);
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