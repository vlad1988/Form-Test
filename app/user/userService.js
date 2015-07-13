app.service('UserService', ['$http', '$q', function ($http, $q) {

        var sendData = function (user) {
            var d = $q.defer();
            $http({
                method: "POST",
                data: user,
                url: "api/api.php"
            })
                    .success(function (data, status, headers) {
                        d.resolve(data);
                    })
                    .error(function (data, status, headers) {
                        d.reject(data);
                    });
            return d.promise;
        };

        return{
            sendData: sendData
        };


    }]);