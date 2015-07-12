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
        <style>
            .button {
                -moz-appearance: button;
                /* Firefox */
                -webkit-appearance: button;
                /* Safari and Chrome */
                padding: 10px;
                margin: 10px;
                width: 170px;
            }
        </style>
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

        <div class="container">
            <h3>Sign up</h3>
            <hr>
            <form ng-controller="formCtrl" method="POST" enctype="multipart/form-data">
                {{user}}
                <div class="form-group">
                    <label for="username">Name <span class="asterisk">*</span></label>
                    <input class="form-control" type="text" ng-model="user.name" required>
                </div>
                <div class="form-group">
                    <label for="password">E-mail <span class="asterisk">*</span></label>
                    <input class="form-control" type="email" ng-model="user.email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="asterisk">*</span></label>
                    <input class="form-control" type="password" ng-model="user.password" required>
                </div>
                <div class="form-group">
                    <label for="country">Country <span class="asterisk">*</span></label>

                    <select class="form-control" ng-model="user.country" ng-options="country.name for country in countries track by country.name">
                        <option value="">-- Select a Country --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Recieve new info on your e-mail?</label> <br/>
                    <input type="radio" ng-model="user.post" value="false"/> Yes
                    <input type="radio" ng-model="user.post" value="true"/> No
                </div>
                <div class="form-group">
                    <label>Select your intrests</label><br/>       
                    <div ng-repeat="item in interests">
                        <input id="{{item}}" type="checkbox" value="{{item}}" ng-checked="selection.indexOf(item) > -1" ng-click="toggleSelection(item)" /> {{ item}} <br/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message </label>
                    <textarea ng-model="user.message" class="form-control">

                    </textarea>
                </div>
                <div class="form-group">
                    <label>Upload image</label><br/>
                    <div class="btn btn-default" ngf-select ngf-change="upload($files)"><i class="glyphicon glyphicon-file"></i> Upload image</div>
                    <div>{{ log }}</div>
                </div>

                <div class="form-group" ng-class="{'has-error': datepickerForm.date.$invalid}">
                    <label class="control-label"><i class="fa fa-calendar"></i> Set the date</label>
                    <input class="form-control" ng-model="user.selectedDate"  name="date" bs-datepicker type="text">
                </div>

                <div class="form-group" ng-class="{'has-error': timepickerForm.time.$invalid}">
                    <label class="control-label"><i class="fa fa-clock-o"></i> Set the time</label>
                    <input class="form-control" size="8" ng-model="user.time"  name="time" bs-timepicker type="text">
                </div>


                <div class="form-group">
                    <input class="form-control btn btn-primary" type="button" ng-click="sendMe()" value="Send">
                </div>
            </form>
        </div>



        <script src="assets/js/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular-strap/2.1.2/angular-strap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular-strap/2.1.2/angular-strap.tpl.min.js"></script>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/ng-file-upload-shim.js"></script>
        <script src="assets/js/ng-file-upload.min.js"></script>

        <script src="app/app.module.js"></script>
        <script src="app/form/formService.js"></script>
        <script src="app/form/formController.js"></script>


    </body>
</html>