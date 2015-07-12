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
                    <input class="form-control" type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">E-mail <span class="asterisk">*</span></label>
                    <input class="form-control" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="asterisk">*</span></label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="country">Country <span class="asterisk">*</span></label>

                    <select class="form-control" ng-model="country" ng-options="country.name for country in countries track by country.code">
                        <option value="">-- Select a Country --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message </label>
                    <textarea class="form-control">
                        
                    </textarea>
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-primary" type="button" value="Send">
                </div>
            </form>
        </div>



        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script src="app/app.module.js"></script>
    </body>
</html>