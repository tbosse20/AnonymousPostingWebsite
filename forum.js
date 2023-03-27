// https://stackoverflow.com/questions/30680562/send-form-data-with-jquery-ajax-json
$(document).on('click', '.dcomment', function() { 
    const id = this.alt;
    alert("#cmt-" + id);
    alert($("#cmt-" + id).value);
    $.ajax({
        url: '/webDevMiniProject/postJSON.php', // url where to submit the request
        type : "POST", // type of action POST || GET
        dataType : 'json', // data type
        data : {
            "action": "comment",
            "postID": id,
            "cmt-msg": $("#cmt-" + id).value
        },
        success : function(result) { console.log(result); },
        error: function(xhr, resp, text) { console.log(xhr, resp, text); }
    });
});

var app = angular.module("myApp", []);
app.controller("myCtrl", function($scope, $http) {
    $http.get("forum.json").then(function (response) {
        $scope.posts = response.data;
    });
});

app.filter('reverse', function() {
    return function(items) {
        return items.slice().reverse();
    };
});