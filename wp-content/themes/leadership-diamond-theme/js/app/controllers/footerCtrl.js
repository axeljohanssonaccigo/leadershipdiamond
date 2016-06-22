diamondApp.controller('footerCtrl', ['$scope', function($scope) {
    //Set current lang to global var currentLanguage
    $scope.currentLang = currentLanguage.name.toLowerCase();   
	//Define needed strings
	$scope.transStrings = {
        1: {"internalName": "contact", "svenska": "Kontakt", "english": "Contact"},
        2: {"internalName": "leadershipPartners", "svenska": "Ledarskapspartners", "english": "Leadership Partners"}
    };
    $scope.contacts = [
        {"name": "Contact 1", "url": "http://www.contact1.se"},
        {"name": "Contact 2", "url": "http://www.contact2.se"},        
        {"name": "Contact 3", "url": "http://www.contact3.com"}
    ];
     $scope.partners = [
        {"name": "Centigo", "url": "http://www.centigo.se"},
        {"name": "Accigo", "url": "http://www.accigo.se"},        
        {"name": "Quantum Solutions", "url": "http://www.quantum.com"}
    ];
    $scope.currentStrings = {};

    $scope.setCurrentStrings = function(){
        angular.forEach($scope.transStrings, function (prop) {
            $scope.currentStrings[prop.internalName] = prop[$scope.currentLang];
        });
    };
    $scope.setCurrentStrings();
    
    
    
}]);