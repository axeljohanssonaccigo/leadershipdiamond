diamondApp.service('startSvc', function ($http) {

    this.getPostsByType = function (type) {
        return $http({
            method: 'GET',
            url: baseUrl + '/api/get_posts/',
            params: {
                'tics': (new Date()).getTime(),
                'post_type': type,
                'posts_per_page': -1
            }
        });
    };

    this.sendForm = function (url) {
        return $http({
            method: "POST",
            url: baseUrl.concat("/en?").concat(url),
        }).success(function (data, status, headers, config) {
            //var json = jQuery.parseJSON(data);
            console.log('Success :\n' + data + '\n' + status + '\n' + JSON.stringify(config));
        }).error(function (data, status, headers, config) {
            console.log('Error :\n' + data + '\n' + status + '\n' + JSON.stringify(config));
        });
    };




});