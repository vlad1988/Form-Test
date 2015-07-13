app.controller('formCtrl', ['$scope', '$http', 'formService', 'Upload', 'UserService', function ($scope, $http, formService, Upload, UserService) {

        $scope.countries = formService.getCountries();
        $scope.interests = formService.getInterests();

        $scope.inputType = 'password';
        $scope.toggleLoader = true;
        $scope.successAlert = true;
        $scope.preview = true;
        $scope.selection = [];
        $scope.log = '';
        $scope.user = {};


        $scope.showHidePassword = function () {
            if ($scope.inputType == 'password')
                $scope.inputType = 'text';
            else
                $scope.inputType = 'password';
        };


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
                        $scope.imgsrc = config.file.name;
                        $scope.preview = false;
                    });
                }
            }
        };


        $scope.sendMe = function () {
            $scope.toggleLoader = false;
            UserService.sendData($scope.user)
                    .then(function () {
                        $scope.successAlert = false;
                        $scope.toggleLoader = true;
//                        setTimeout(function () {
//                            window.location.href = '/';
//                        }, 1000);
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