'use strict';
var closeMenu = function () {
    jQuery("header .menu-toggle.icon").click();
};
//function NavIsClose() {
//    jQuery("nav").addClass("is-close");
//    jQuery("nav").css("transform": "perspective(0px) scale(0.2)");
//}

//jQuery( "div:contains('Ledarskapsdiamanten')").after("<span style='font-size: 0.5em; vertical-align: super;'>®</span>" );

//STOPS SCROLL WEH ACTION IS MADE

var page = jQuery("html, body");

jQuery( "section" ).click(function(e) {

   page.on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function(){
       page.stop();
   });

   return false; 
});