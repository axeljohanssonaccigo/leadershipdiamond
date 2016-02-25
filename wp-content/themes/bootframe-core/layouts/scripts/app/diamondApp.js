'use strict'

var diamondApp = angular.module('diamondApp', []);
// BadController will fail to instantiate, due to relying on automatic function annotation,
// rather than an explicit annotation

//used for calls to api
var baseUrl =  location.href.substr(0, location.href.length - 3);