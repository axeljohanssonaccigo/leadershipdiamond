diamondApp.controller('footerCtrl', ['$scope', function($scope) {
    //Set current lang to global var currentLanguage
    $scope.currentLang = currentLanguage.name.toLowerCase();   
	//Define needed strings
	$scope.transStrings = {
        1: {"internalName": "contact", "svenska": "Kontakt", "english": "Contact"},
        2: {"internalName": "leadershipPartners", "svenska": "Ledarskapspartners", "english": "Leadership Partners"}
    };
    $scope.currentStrings = {};

    $scope.setCurrentStrings = function(){
        angular.forEach($scope.transStrings, function (prop) {
            $scope.currentStrings[prop.internalName] = prop[$scope.currentLang];
        });
    };
    $scope.setCurrentStrings();
    
}]);