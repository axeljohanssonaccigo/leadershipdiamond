diamondApp.service('startSvc', function ($http) {
    this.getAllQuestionPosts = function () {
        return $http({
            method: 'GET'
            , url: baseUrl + '/api/get_posts/'
            , params: {
                'tics': (new Date()).getTime()
            }
        });
    };
    this.getPostsByType = function (type) {
        return $http({
            method: 'GET'
            , url: baseUrl + '/api/get_posts/'
            , params: {
                'tics': (new Date()).getTime()
                , 'post_type': type
                , 'posts_per_page': -1
            }
        });
    };
});