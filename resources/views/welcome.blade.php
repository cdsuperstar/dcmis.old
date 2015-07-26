<!doctype html>
<html ng-app="myApp">
<head>
    <script src="/metronic/assets/global/plugins/angularjs/angular.min.js" type="text/javascript"></script>
    <script src="/js/main.js"></script>
</head>
<body>
<h2>I am not inside an AngularJS app</h2>
<div ng-app="embeddedApp">
    <h3>Inside an AngularJS app</h3>
</div>
</body>
</html>