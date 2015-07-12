var app = angular.module('MainModule', [])
        .controller('FormCtrl', ['$scope', '$http', 'formService', function ($scope, $http, formService) {
                $scope.name = 'Name';
        
        
                $scope.countries = formService.getCountries();
                $scope.interests = formService.getInterests();

            }]);


