app.controller('formCtrl', ['$scope', '$http', 'formService', function ($scope, $http, formService) {

        $scope.countries = formService.getCountries();
        $scope.interests = formService.getInterests();
        $scope.selection = [];
        $scope.param = {};

        $scope.validateFile = function (files) {
            alert(files[0].name);
        };

        $scope.toggleSelection = function (item) {
            var idx = $scope.selection.indexOf(item);
            if (idx > -1) {
                $scope.selection.splice(idx, 1);
            }
            else {
                $scope.selection.push(item);
            }
        };



    }]);