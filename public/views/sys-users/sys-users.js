'use strict';

DcmisApp.factory('Resource', ['$q', '$http',
    function ($q, $http) {

        function getRandomItems() {
            return $http.get('/users');//, {cache: 'true'});
        }

        function getPage(start, number, params) {

            return getRandomItems();
        }
        return {
            getPage: getPage
        };

    }]);

DcmisApp.controller('pipeCtrl', ['Resource','$scope','$http', '$filter','ngDialog',function (service,$scope,$http,$filter,ngDialog) {

    $scope.email='email';
    $scope.name='';
    $scope.password='';

    $http.get('/users').success(function(data) {
        $scope.email = data;
        console.log($scope.email);
    });

    $scope.clickToEdit = function (email) {
        $scope.email = email;
        ngDialog.open({ template: '/sys-usersedit.html',//模式对话框内容为test.html
            className: 'ngdialog-theme-plain',
            scope:$scope //将scope传给test.html,以便显示地址详细信息
        });
    };

    var ctrl = this;


    this.callServer = function callServer(tableState) {

        ctrl.isLoading = true;

        var pagination = tableState.pagination;

        var start = pagination.start || 0;     // This is NOT the page number, but the index of item in the list that you want to use to display the table.
        var number = pagination.number || 4;  // Number of entries showed per page.

        service.getPage(start, number, tableState).then(function (result) {

            var filtered = tableState.search.predicateObject ? $filter('filter')(result.data, tableState.search.predicateObject) : result.data;
            if (tableState.sort.predicate) {
                filtered = $filter('orderBy')(filtered, tableState.sort.predicate, tableState.sort.reverse);
            }

            ctrl.displayed = filtered.slice(start, start + number);
            tableState.pagination.numberOfPages = 2 ;//result.numberOfPages;//set the number of pages so the pagination can update
            ctrl.isLoading = false;
        });
    };
}]);


DcmisApp.directive('csSelect', function () {
    return {
        require: '^stTable',
        template: '<input type="checkbox"/>',
        scope: {
            row: '=csSelect'
        },
        link: function (scope, element, attr, ctrl) {

            element.bind('change', function (evt) {
                scope.$apply(function () {
                    ctrl.select(scope.row, 'multiple');
                });
            });

            scope.$watch('row.isSelected', function (newValue, oldValue) {
                if (newValue === true) {
                    element.parent().addClass('st-selected');
                } else {
                    element.parent().removeClass('st-selected');
                }
            });
        }
    };
});

