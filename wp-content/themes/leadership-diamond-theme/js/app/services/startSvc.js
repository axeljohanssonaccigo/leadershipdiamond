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

    this.sendMail = function (subject, body) {
        return $http({
            method: "POST",
            url: baseUrl.concat('/wp-admin/admin-ajax.php'),
            params: {
                action: 'send_message',
                //                email: recipient,
                subject: subject,
                message: body
            }
        }).success(function (data, status, headers, config) {
            var json = jQuery.parseJSON(data);
            console.log('Success :\n' + data + '\n' + status + '\n' + JSON.stringify(config));
        }).error(function (data, status, headers, config) {
            console.log('Error :\n' + data + '\n' + status + '\n' + JSON.stringify(config));
        });
    };
});