<html>
<head>
</head>
<body>

hote pages.
<div class="ngdialog-buttons">
    <button type="button" class="ngdialog-button ngdialog-button-secondary" ng-click="closeThisDialog(0)">No</button>\
    <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="confirm(1)">Yes</button>
</div>

<hr>
<div class="dialog-contents">
    Some message
    <button ng-click="closeThisDialog()">Cancel</button>
    <button ng-click="confirm()">Confirm</button>
</div>


</body>
</html>
