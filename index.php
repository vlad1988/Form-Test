<!DOCTYPE html>
<html ng-app="MainModule">
    <head>
        <title>Create User</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/style/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/style.css">
        <script>
            document.write('<base href="' + document.location + '" />');
        </script>
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">User Page</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container" ng-controller="FormCtrl">
            <h3>Sign up</h3>
            <hr>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Name <span class="asterisk">*</span></label>
                    <input class="form-control" type="text" ng-model="username" required>
                </div>
                <div class="form-group">
                    <label for="password">E-mail <span class="asterisk">*</span></label>
                    <input class="form-control" type="email" ng-model="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="asterisk">*</span></label>
                    <input class="form-control" type="password" ng-model="password" required>
                </div>
                <div class="form-group">
                    <label for="country">Country <span class="asterisk">*</span></label>

                    <select class="form-control" ng-model="country" ng-options="country.name for country in countries track by country.code">
                        <option value="">-- Select a Country --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Recieve new info on your e-mail?</label> <br/>
                    <input type="radio" ng-model="post" value="false"/> Yes
                    <input type="radio" ng-model="post" value="true"/> No
                </div>
                <div class="form-group">
                    <label>Select your intrests</label><br/>       
                    <div ng-repeat="item in interests">
                        <input id="{{item}}" type="checkbox" value="{{item}}" ng-checked="selection.indexOf(item) > -1" ng-click="toggleSelection(item)" /> {{ item }} <br/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message </label>
                    <textarea class="form-control">

                    </textarea>
                </div>

                <div class="form-group">
                    <input class="form-control btn btn-primary" type="submit" value="Send">
                </div>
            </form>
        </div>



        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script src="app/app.module.js"></script>
        <script src="app/form/formService.js"></script>

    </body>
</html>