var app = angular.module("myApp", []);
app.controller("myCtrl", function($scope, $http) {

    // JSON version -> change "getData.php" to "forum.json"
    $http.get("getData.php").then(function (response) {

        $scope.posts = response.data;
    });
});

$(document).ready(function(){
    $("#forumForm").submit(function(event){
        event.preventDefault(); // prevent default form submission behavior
        $.ajax({
            type: "POST",

            // JSON version -> Change "postServer.php" to "postJSON.php"
            url: "postServer.php",

            data: {
                action: $("#action").val(),
                topic: $("#topic").val(),
                msg: $("#msg").val(),
            }, success: function(response){
                $("#thxMsg").text("Thanks for your thoughts!");
                $("#status").text(response);
            }
        });
    });
});