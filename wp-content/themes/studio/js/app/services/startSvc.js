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

	this.getAllTranslations = function(){
		return $http({
			method: 'GET',
			url: baseUrl + '/api/get_posts/?post_type=translation&posts_per_page=-1'
		});
	};

	this.getAllCourses = function(){
		return $http({
			method: 'GET',
			url: baseUrl + '/api/get_posts/?post_type=course&posts_per_page=-1'
		});
	};
});

