diamondApp.controller('startCtrl', ['$scope', 'startSvc', function($scope, startSvc) {
	//Scope variables
	$scope.a = "startCtrl";
	console.log($scope.a);
	$scope.allQuestionPosts = [];
	$scope.allTranslations = [];
	$scope.loading = true;
	$scope.postInFocus = null;
	
	// Sets custom strings from translation custom post type
	$scope.setCustomStrings = function(){
		$scope.leadershipOS = $scope.getTranslationByContent('leadershipOS');
		$scope.leadershipdiamond = $scope.getTranslationByContent('leadershipdiamond');
		$scope.nothingButApps = $scope.getTranslationByContent('nothingbutapps');
		$scope.readMore = "Läs mer";// $scope.getTranslationByContent('nothingbutapps');
		$scope.howToHandle = $scope.getTranslationByContent('howtohandle');
		$scope.close = $scope.getTranslationByContent('close');
		$scope.goToNextPost = $scope.getTranslationByContent('gotonextpost');
	};

	//Scope functions
	$scope.focusOnQuestionPost = function(post){
	
		$scope.unFocusOtherPosts(post);
		$scope.postInFocus = post;
		$scope.scrollToDivTop('#post-' + post.index);
	};

	$scope.scrollToDivTop = function(divId){
		var toTop = jQuery(divId).offset().top
    	//var menuHeight = jQuery("#site-navigation").height();
		//var y = toTop + menuHeight;
		window.scrollTo(0,toTop - 50);
	};

	$scope.unFocusOtherPosts = function(clickedPost){
		angular.forEach($scope.allQuestionPosts, function(post){
			if (clickedPost.id === post.id) {
			post.inFocus = true;

		} else {
			post.inFocus = false;

		}
		});
	};
	$scope.moveToNextPost = function(currentPost){
		$scope.dummyDistance = 150;
		currentPost.inFocus = false;
		if (currentPost.index === 8) {
			var nextPostIndex = 1;
		} else {
			var nextPostIndex = currentPost.index + 1;
		}
		var nextPost = $scope.allQuestionPosts.filter(function(item) { return item.index === nextPostIndex; });
		$scope.focusOnQuestionPost(nextPost[0]);
		
	};


	//On Document ready
	 jQuery( document ).ready(function() {
	 	console.log( "ready!" );

	 });

	//Scope functions on page load
	$scope.getTranslationByContent = function(content){
		var translation = $scope.allTranslations.filter(function(item) { return item.content === content; });
		return translation[0].title;
	};

	$scope.trimPostContent = function(content){
		return content.replace(/<\/?[^>]+(>|$)/g, "").replace(/(\r\n|\n|\r)/gm," ").trim();
	};

	$scope.defineQuestionPostObjects = function(){
		var count = 1;
		angular.forEach($scope.allQuestionPosts, function(post){
			post["showDescription"] = false;
			post["inFocus"] = false;
			post["index"] = parseInt(post['custom_fields']['wpcf-index'][0]);
			post["solution"] = (post['custom_fields']['wpcf-answer'][0]);
			post.content = $scope.trimPostContent(post.content);
			if (count === $scope.allQuestionPosts.length) {
				$scope.loading = false;
			};
			count++;
		});
	};

	$scope.getAllQuestionPosts = function(){
		startSvc.getAllQuestionPosts().then(function(response){
			$scope.allQuestionPosts = response.data.posts;
			console.log($scope.allQuestionPosts);
			$scope.defineQuestionPostObjects();
		});
	};

	$scope.prettyfyTranslations = function(translations){
		angular.forEach(translations, function(post){
			var transObject = {
				id: post.id,
				content: $scope.trimPostContent(post.content),
				title: post.title
			}
			$scope.allTranslations.push(transObject);
		});
		console.log($scope.allTranslations);
		//Set the custom strings
		$scope.setCustomStrings();
	};	


	$scope.getAllTranslations = function(){
		startSvc.getAllTranslations().then(function(response){
			//$scope.allTranslations = response.data.posts;
			//console.log($scope.allTranslations);
			$scope.prettyfyTranslations(response.data.posts);
		});
	};
	$scope.getAllTranslations();
	$scope.getAllQuestionPosts();
	

}]);
