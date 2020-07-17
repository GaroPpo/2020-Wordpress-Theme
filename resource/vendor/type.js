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
