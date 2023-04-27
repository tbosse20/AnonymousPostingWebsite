var app = angular.module("myApp", []);
app.controller("myCtrl", function($scope, $http) {
    // JSON version -> change "getData.php" to "forum.json"
    $http.get("getData.php").then(function (response) {
        $scope.posts = response.data;
    });
});

app.filter('reverse', function() {
    return function(items) {
        return items.slice().reverse();
    };
});