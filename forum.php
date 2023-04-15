<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script type="text/javascript" src="/webDevMiniProject/forum.js"></script>
        <link rel="stylesheet" type="text/css" href="form.css" />
        <link rel="stylesheet" type="text/css" href="forum.css" />
        <title>Tonko Bossen - Forum</title>
    </head>
    <body>
        <div id="strip">
            <center>
                <form id="form" action="/webDevMiniProject/postJSON.php" method="POST" name="myForm">
                    <ul id="inputs">
                        <input type="hidden" name="action" value="Post">
                        <li><textarea type="text" name="msg" id="message" aria-required="true"></textarea></li>
                        <li><button type="submit" name="submit" id="submit">Post</button></li>
                    </ul>
                </form>
                
                <?php
                    if (isset($_GET['status'])) {
                        echo $_GET["status"];
                    }
                ?>
                    
                <div id="forum" ng-app="myApp" ng-controller="myCtrl">
                    <div class="post" ng-repeat="post in posts">
                        <input type="hidden" value="{{post.id}}">
                        <h2 class="user">{{post.user}}</h2>
                        <span class="date">{{post.date}}</span>
                        <br>
                        <p class="message">{{post.msg}}</p>
                        <!--
                        <span class="likes">{{post.likes}}</span>
                        <input type="button" class="like" value="Like" alt="{{post.id}}">
                        -->
                        <div class="comments" ng-repeat="comment in post.comments track by $index">
                            <div class="comment">
                                <span class="cmt-msg">{{comment.cmt}}</span>
                                <span class="cmt-date">{{comment.dateStamp}}</span>
                            </div>
                        </div>
                        <form id="{{'form-' + post.id}}" action="/webDevMiniProject/postJSON.php" method="POST">
                            <input type="hidden" name="action" value="Comment">
                            <input type="hidden" name="id" value="{{post.id}}">
                            <input type="text" name="cmt-msg" id="{{'cmt-' + post.id}}" required>
                            <input type="submit" class="cmt-btn" value="Comment" alt="{{post.id}}">
                        </form>
                        <input type="hidden" id="{{post.id + '-anchor'}}">
                    </div>
                </div>
            </div>
        </center>
    </div>
</body>