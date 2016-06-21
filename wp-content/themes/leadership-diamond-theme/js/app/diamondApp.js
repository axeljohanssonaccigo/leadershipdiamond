'use strict'

var diamondApp = angular.module('diamondApp', ['ngAnimate', 'ngTouch', 'ui.bootstrap']);

//used for calls to api
var baseUrl =  location.href.substr(0, location.href.length - 3);

jQuery(document).ready(function () {
    angular.bootstrap(document.getElementById("headerContainer"), ['diamondApp']);
});
