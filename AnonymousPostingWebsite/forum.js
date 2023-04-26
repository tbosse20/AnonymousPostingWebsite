// https://stackoverflow.com/questions/30680562/send-form-data-with-jquery-ajax-json
$(document).on('click', '.cmt-btn', function() {
    const id = this.alt;
    var element = angular.element($("forum"));
    element.scope().$apply();
    $.ajax({
        url: '/webDevMiniProject/postJSON.php', // url where to submit the request
        type : "POST", // type of action POST || GET
        dataType : 'json', // data type
        data : $("#form-" + id).serialize(),
        success : function(result) { console.log(result); },
        error: function(xhr, resp, text) { console.log(xhr, resp, text); }
    });
});

var app = angular.module("myApp", []);
app.controller("myCtrl", function($scope, $http) {
    $http.get("getData.php").then(function (response) {
        $scope.posts = response.data;
    });
});

app.filter('reverse', function() {
    return function(items) {
        return items.slice().reverse();
    };
});