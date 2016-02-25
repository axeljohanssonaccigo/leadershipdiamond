diamondApp.service('startSvc', function ($http) {
	this.test = function(){
		console.log("startsvc");
		return true;
	};

	this.getAllQuestionPosts = function(){
		return $http({
			method: 'GET',
			url: baseUrl + '/api/get_posts/'
		});
	};
});

