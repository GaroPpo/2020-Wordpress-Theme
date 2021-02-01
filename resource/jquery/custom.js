$(function(){
    "use strict";

    /* Hamburger Menu & Mobile Push menu
    =========================================================================*/
    $(".hamburger-menu, .main-nav ul li a").on( 'click', function() {
        $(".header").toggleClass("pushed");
        $(".main-content").toggleClass("main-pushed");
        $('.bar').toggleClass('animate');
    });
});

/* Pre Loader Stop
==================================================================*/
$(document).ready(function() {
	setTimeout(function(){
		$('body').addClass('loaded');
	}, 2000);
});

/* Scroll to Top https://github.com/seanmacentee/scroll-to-top-button
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
    $("html, body").animate({ scrollTop: 0 }, 1500);
    return false;
  });
});

/* Hide Mobile Header
==================================================================*/
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('.visible-sm').outerHeight();

$(window).scroll(function(event){
  didScroll = true;
});

setInterval(function() {
  if (didScroll) {
    hasScrolled();
    didScroll = false;
  }
}, 250);

function hasScrolled() {
  var st = $(this).scrollTop();

  // Make sure they scroll more than delta
  if(Math.abs(lastScrollTop - st) <= delta)
  return;

  // If they scrolled down and are past the navbar, add class .MagicMenu-up.
  // This is necessary so you never see what is "behind" the navbar.
  if (st > lastScrollTop && st > navbarHeight){
    // Scroll Down
    $('.visible-sm').fadeOut(500);
    } else {
      // Scroll Up
      if(st + $(window).height() < $(document).height()) {
        $('.visible-sm').fadeIn(500);
      }
    }
    lastScrollTop = st;
}

/* PopUp Social Sharing
==================================================================*/
function popitup(url) {
	newwindow=window.open(url,'name','height=400,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}
