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
        var ajaxToServer = function(){return $http.get($rootScope.BaseUrlPublic+':3000/getResult');};
        var socket = io.connect(':3000',{reconnection:true});
        // Get result
        $scope.getResult = function(){
            ajaxToServer().success(function(data){
                $scope.listing_thumbnails = data;
            });
        };
        socket.on('getReresh',function(data){
            $scope.getResult();
        });
        $scope.eventRefresh = function(){
            ajaxToServer().success(function(data){
                data.reverse();
                data.forEach(function(val,index){
                    console.log($scope.listing_thumbnails.indexOf(val));
                    if($scope.listing_thumbnails.indexOf(val)===-1)
                        $scope.listing_thumbnails.unshift(val);
                });
            });
        };

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