<!doctype html>
<html ng-app="myApp">
<head>
    <script src="/metronic/assets/global/plugins/angularjs/angular.min.js" type="text/javascript"></script>
    <script src="/js/main.js"></script>
</head>
<body>
<form method="get" action="/adduser" >
<table border="1" ng-controller="Controller">
    <caption>用户</caption>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>create</th>
        <th>update</th>
    </tr>
    <tr ng-repeat="user in users">
        <td>@{{user.id}}</td>
        <td>@{{user.name}}</td>
        <td>@{{user.email}}</td>
        <td>@{{user.created_at}}</td>
        <td>@{{user.updated_at}}</td>
    </tr>
        <tr >
            <td><input type="submit" value="增加"/></td>
            <td><input type="text" name="name"></td>
            <td><input type="text" name="email"></td>
            <td></td>
            <td></td>
        </tr>
</table>
</form>

</body>
</html>