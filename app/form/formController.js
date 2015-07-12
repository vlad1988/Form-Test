app.controller('formCtrl', ['$scope', '$http', 'formService', 'Upload', 'UserService', function ($scope, $http, formService, Upload, UserService) {

        $scope.countries = formService.getCountries();
        $scope.interests = formService.getInterests();
        $scope.selection = [];
        $scope.log = '';

        $scope.user = {};

        $scope.$watch('files', function () {
            $scope.upload($scope.files);
        });


        $scope.upload = function (files) {
            if (files && files.length) {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    Upload.upload({
                        url: 'api/api.file.php',
                        data: file,
                        file: file
                    }).success(function (data, status, headers, config) {
                        $scope.log = 'Image: ' + config.file.name + ' upload finished';
                        $scope.user.filename = config.file.name;
                    });
                }
            }
        };


        $scope.sendMe = function () {
            UserService.sendData($scope.user)
                    .then(function () {
                        location.reload();
                    });
        };
        
        
        $scope.toggleSelection = function (item) {
            var idx = $scope.selection.indexOf(item);
            if (idx > -1) {
                $scope.selection.splice(idx, 1);
            }
            else {
                $scope.selection.push(item);
            }

            $scope.user.interests = $scope.selection;
        };



    }]);