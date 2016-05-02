<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    
    <!-- this in the public folder of laravel -->  
    <!-- bootstrap -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  </head>

  <!-- entire body app -->
  <!-- authApp -->
  <body ng-app="authApp">

    <!-- container -->
    <div class="container">

    <!-- ui-view -->
    <div ui-view></div>
  </div>        

  </body>

  <!-- Application Dependencies -->
  <!-- angular -->
  <script src="node_modules/angular/angular.js"></script>

  <!-- ui router -->
  <script src="node_modules/angular-ui-router/build/angular-ui-router.js"></script>

  <!-- token based authentication -->
  <script src="node_modules/satellizer/satellizer.js"></script>

  <!-- Application Scripts -->

  <!-- app -->
  <script src="scripts/app.js"></script>

  <!-- auth controller -->
  <script src="scripts/authController.js"></script>

  <!-- user controller -->
  <script src="scripts/userController.js"></script>
</html>
