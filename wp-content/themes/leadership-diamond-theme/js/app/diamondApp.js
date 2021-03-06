'use strict'
var diamondApp = angular.module('diamondApp', ['ngAnimate', 'ngTouch', 'ui.bootstrap']).run(['$anchorScroll', function ($anchorScroll) {
    $anchorScroll.yOffset = 250; // always scroll by 50 extra pixels
}]);
var redirectToSwedish = function () {
    //Redirect to /sv for now
    location.href = baseUrl.concat("/sv");
}

// Global variabels
var environments = {
    "dev": "http://localhost:81",
    "dev2": "http://localhost",
    "dev3": "http://localhost:8888",
    "prod": "http://www.leadershipdiamond.com",
    "test": "http://bt25-php-dev.cloudapp.net",
    "testProd": "http://leadershipdiamond.com.loopiadns.com"
};
//Setting the current environment
var currentEnvironment = "";
angular.forEach(environments, function (env) {
    if (env === location.origin) {
        currentEnvironment = env;
    };
});
//Adding a baseUrl, used in Angular services
if (currentEnvironment === environments.dev || currentEnvironment === environments.dev2 || currentEnvironment === environments.dev3 || currentEnvironment === environments.test) {
    var baseUrl = currentEnvironment.concat('/leadershipdiamond');
} else {
    baseUrl = currentEnvironment;
};
//Setting current language depending on url (Default = Swedish)
var currentLanguage = {
    "name": "Svenska",
    "url": baseUrl.concat("/sv")
};
//If English
if (location.href.search("/en") > -1) {
    var currentLanguage = {
        "name": "English",
        "url": baseUrl.concat("/en")
    };
    //redirectToSwedish();
    //If no lang is auto set
} else if (location.pathname === "/leadershipdiamond/") {
    //redirectToSwedish();
};


jQuery("#page").attr("ng-controller", "startCtrl");
//Bootstrapping the app
jQuery(document).ready(function () {
    angular.bootstrap(jQuery("body"), ['diamondApp']);
});