<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <link rel="stylesheet" type="text/css" href="form.css" />
        <link rel="stylesheet" type="text/css" href="forum.css" />
        <title>Tonko Bossen - Forum</title>
    </head>
    <body>
        <div id="strip">
            <center>
                <form id="form" action="/webDevMiniProject/postJSON.php" method="POST" name="myForm">
                    <ul id="inputs">
                        <li><textarea type="text" name="msg" id="message" aria-required="true"></textarea></li>
                        <li><button type="submit" name="submit" id="submit">Post</button></li>
                    </ul>
                </form>
                <?php
                    if (isset($_GET['status'])) {
                        echo $_GET["status"];
                    }
                ?>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script>
                    // https://stackoverflow.com/questions/30680562/send-form-data-with-jquery-ajax-json
                    $(document).ready(function(){
                        // click on button submit
                        $("#susbmit").on('click', function(){
                            // send ajax
                            $.ajax({
                                url: '/webDevMiniProject/gfg.php', // url where to submit the request
                                type : "POST", // type of action POST || GET
                                dataType : 'json', // data type
                                data : $("#form").serialize(), // post data || get data
                                success : function(result) {
                                    // you can see the result from the console
                                    // tab of the developer tools
                                    console.log(result);
                                },
                                error: function(xhr, resp, text) { console.log(xhr, resp, text); }
                            })
                        });
                    });
                </script>
                
                <div id="forum" ng-app="myApp" ng-controller="myCtrl">
                    <div class="post" ng-repeat="post in posts | reverse">
                        <h2 class="user">{{post.user}}</h2>
                        <span class="date">{{post.date}}</span>
                        <br>
                        <p class="message">{{post.msg}}</p>
                        <span class="likes">{{post.likes}}</span>
                        <input type="button" class="comment" value="Comment">
                    </div>
                </div>
                    
                <script>
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
                </script>
                
            </center>
        </div>
    </body>
</html>