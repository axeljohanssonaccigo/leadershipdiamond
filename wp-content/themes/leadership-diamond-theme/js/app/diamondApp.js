'use strict'

var diamondApp = angular.module('diamondApp', ['ngAnimate', 'ngTouch', 'ui.bootstrap']);

// Global variabels
var environments = {
	"dev": "http://localhost",
	"prod": "http://www.leadershipdiamond.com"
};

var currentEnvironment = "";
//Setting the current environment
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

jQuery(document).ready(function () {
    angular.bootstrap(document.getElementById("headerContainer"), ['diamondApp']);
});
