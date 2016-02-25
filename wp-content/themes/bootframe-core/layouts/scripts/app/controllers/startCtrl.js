diamondApp.controller('startCtrl', ['$scope', 'startSvc', function($scope, startSvc) {
	//Scope variables
	$scope.a = "startCtrl";
	console.log($scope.a);
	$scope.allQuestionPosts = [];
	
	//Scope functions
	$scope.defineQuestionPostObjects = function(){
		angular.forEach($scope.allQuestionPosts, function(post){
			post["showDescription"] = false;
			post["inFocus"] = false;
			post.content.replace("<p>","").replace("</p>","");
		});
	};

	$scope.getAllQuestionPosts = function(){
		startSvc.getAllQuestionPosts().then(function(response){
			$scope.allQuestionPosts = response.data.posts;
			console.log($scope.allQuestionPosts);
			$scope.defineQuestionPostObjects();
		});
	};
	$scope.getAllQuestionPosts();
	

}]);
