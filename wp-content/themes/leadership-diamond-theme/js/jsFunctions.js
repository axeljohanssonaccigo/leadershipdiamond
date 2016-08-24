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
page.on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function () {
    page.stop();
});

/**
 * This part handles the highlighting functionality.
 * We use the scroll functionality again, some array creation and 
 * manipulation, class adding and class removing, and conditional testing
 */
var aChildren = $("nav li").children(); // find the a children of the list items
var aArray = []; // create the empty aArray
for (var i = 0; i < aChildren.length; i++) {
    var aChild = aChildren[i];
    var ahref = $(aChild).attr('href');
    aArray.push(ahref);
} // this for loop fills the aArray with attribute href values

$(window).scroll(function () {
    var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
    var windowHeight = $(window).height(); // get the height of the window
    var docHeight = $(document).height();

    for (var i = 0; i < aArray.length; i++) {
        var theID = aArray[i];
        var divPos = $(theID).offset().top; // get the offset of the div from the top of page
        var divHeight = $(theID).height(); // get the height of the div in question
        if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
            $("a[href='" + theID + "']").addClass("nav-active");
        } else {
            $("a[href='" + theID + "']").removeClass("nav-active");
        }
    }

    if (windowPos + windowHeight == docHeight) {
        if (!$("nav li:last-child a").hasClass("nav-active")) {
            var navActiveCurrent = $(".nav-active").attr("href");
            $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
            $("nav li:last-child a").addClass("nav-active");
        }
    }
});