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
            <h1>Write a new post!</h1>
            <form id="form" action="/webDevMiniProject/postServer.php" method="POST" name="myForm">
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
                    <div class="post-msg">
                        <input type="hidden" value="{{post.id}}">
                        <h2 class="name">By {{post.name}}</h2>
                        <p class="message">{{post.msg}}</p>
                        <span class="date">Posted {{post.date}}</span>
                        <br>
                        <!--
                        <span class="likes">{{post.likes}}</span>
                        <input type="button" class="like" value="Like" alt="{{post.id}}">
                        -->
                        <hr>
                    </div>
                    <!--
                    <div class="comments" ng-repeat="comment in post.comments track by $index">
                        <div class="comment">
                            <p class="cmt-msg">{{comment.cmt}}</p>
                            <span class="cmt-date, date">Posted {{comment.dateStampe | date:'yyyy-MM-dd HH:mm:ss'}}{{comment.dateStamp}}</span>
                            <br>
                        </div>
                    </div>
                    <form id="{{'form-' + post.id}}" action="/webDevMiniProject/postJSON.php" method="POST">
                        <input type="hidden" name="action" value="Comment">
                        <input type="hidden" name="id" value="{{post.id}}">
                        <input type="text" name="cmt-msg" id="{{'cmt-' + post.id}}" required>
                        <input type="submit" class="cmt-btn" value="Comment" alt="{{post.id}}">
                    </form>
                    <input type="hidden" id="{{post.id + '-anchor'}}">
                    -->
                </div>
            </div>
        </center>
    </div>
</body>