$(window).on("load", function() {
    "use strict";


    $(".menu-btn").on("click", function(){
      $(this).toggleClass("active");
      $("nav").toggleClass("active");
    });

    $("html").on("click", function() {
      $("nav").removeClass("active");
      $(".menu-btn").removeClass("active");
    });
    $(".menu-btn, nav").on("click", function(e) {
      e.stopPropagation();
    });
    

});


