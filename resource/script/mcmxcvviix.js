/* TYPING EFFECT
==================================================================*/
$(function(){
  $(".element").typed({
    strings: ["Developer", "Gamer", "Entrepreneur", "Hard Worker"],
    // typing speed
    typeSpeed: 100,
    // backspacing speed
    backSpeed: 100,
    // time before backspacing
    backDelay: 1000,
    // loop
    loop: true,
    // false = infinite
    loopCount: false,
    // show cursor
    showCursor: true,
    // character for cursor
    cursorChar: "|",
    // attribute to type (null == text)
    attr: null,
    // either html or text
    contentType: 'html'
  });
});

/* TOTOP EFFECT https://github.com/seanmacentee/scroll-to-top-button
==================================================================*/
$(document).ready(function(){
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollUpButton').fadeIn();
    } else {
      $('.scrollUpButton').fadeOut();
    }
  });
  $('.scrollUpButton').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 500);
    return false;
  });
});

/* POPUP
==================================================================*/
function popitup(url) {
	newwindow=window.open(url,'name','height=400,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}
