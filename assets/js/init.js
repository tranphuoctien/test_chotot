/**
 * Created by teenmaz on 19/2/2016.
 */
'use strict';
angular.module('chotot',['angular-sortable-view']);
angular.module('chotot').run(['$rootScope','$location',function($rootScope,$location){
    $rootScope.BaseUrlPublic=$location.$$protocol+'://'+$location.$$host;
    $rootScope.$location = $location;
}]);
angular.module('chotot').controller('MainController',['$rootScope','$scope','$http','$window',
    function($rootScope,$scope,$http,$window){
        var socket = io.connect(':3000',{reconnection:true});
        // Get result
        $scope.getResult = function(){
            $http.get($rootScope.BaseUrlPublic+':3000/getResult').success(function(data){
                $scope.listing_thumbnails = data;
            });
        };
        socket.on('getReresh',function(data){
            $scope.getResult();
        });
    }
]);
angular.module('chotot').directive('cont', function () {
    return {
        restrict:"E",
        //template:"<div class='myDiv'>aa</div>",
        link: function(scope, element, attrs) {
            element.addClass('animateTop');
            $compile(element)(scope);
        }
    }
});