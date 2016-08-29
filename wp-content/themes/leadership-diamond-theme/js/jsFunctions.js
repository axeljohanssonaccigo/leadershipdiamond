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

//page.on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function () {
//    //If mousedown on scroll
//    console.log("first page on");
//    page.on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function () {
//        //    if (document.documentMode === undefined) {
//        console.log("2nd page on");
//
//        //page.stop();
//        //    }
//    });
//});


/**
 * This part handles the highlighting functionality.
 * We use the scroll functionality again, some array creation and 
 * manipulation, class adding and class removing, and conditional testing
 */
var aChildren = jQuery("nav li").children(); // find the a children of the list items
var aArray = []; // create the empty aArray
for (var i = 0; i < aChildren.length; i++) {
    var aChild = aChildren[i];
    var ahref = jQuery(aChild).attr('href');
    aArray.push(ahref);
} // this for loop fills the aArray with attribute href values

jQuery(window).scroll(function () {
    var windowPos = jQuery(window).scrollTop(); // get the offset of the window from the top of page
    var windowHeight = jQuery(window).height(); // get the height of the window
    var docHeight = jQuery(document).height();

    for (var i = 0; i < aArray.length; i++) {
        var theID = aArray[i];
        var divPos = jQuery(theID).offset().top; // get the offset of the div from the top of page
        var divHeight = jQuery(theID).height(); // get the height of the div in question
        if ((windowPos + 62) >= divPos && (windowPos + 62) < (divPos + divHeight)) {
            jQuery("a[href='" + theID + "']").addClass("nav-active");
        } else {
            jQuery("a[href='" + theID + "']").removeClass("nav-active");
        }
    }

    if (windowPos + windowHeight == docHeight) {
        if (!jQuery("nav li:last-child a").hasClass("nav-active")) {
            var navActiveCurrent = jQuery(".nav-active").attr("href");
            jQuery("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
            jQuery("nav li:last-child a").addClass("nav-active");
        }
    }
});