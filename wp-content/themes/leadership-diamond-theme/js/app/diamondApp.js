'use strict'

var diamondApp = angular.module('diamondApp', ['ngAnimate', 'ngTouch', 'ui.bootstrap'])
.run(['$anchorScroll', function($anchorScroll) {
  $anchorScroll.yOffset = 150;    // always scroll by 50 extra pixels
}]);

// Global variabels
var environments = {
	"dev": "http://localhost",
	"prod": "http://www.leadershipdiamond.com"
};

//Setting the current environment
var currentEnvironment = "";
angular.forEach(environments, function(env){
	if (env === location.origin) {
		currentEnvironment = env;
	};
});

//Adding a baseUrl, used in Angular services
if (currentEnvironment === environments.dev) {
    var baseUrl = currentEnvironment.concat('/leadershipdiamond');
} else {
    baseUrl = currentEnvironment;
}

//Setting current language depending on url (Default = Swedish)
var currentLanguage = {"name": "Svenska", "url": baseUrl.concat("/sv")};
if(location.href.search("/en") > -1){
    var currentLanguage = {"name": "English", "url": baseUrl.concat("/en")};
};

//Adding controller
jQuery("#page").attr("ng-controller", "startCtrl");

//Bootstrapping the app
jQuery(document).ready(function () {
    angular.bootstrap(document.getElementById("page"), ['diamondApp']);
});