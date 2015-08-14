'use strict';

DcmisApp.factory('Resource', ['$q', '$http',
    function ($q, $http) {

        function getRandomItems() {
            return $http.get('/user');//, {cache: 'true'});
        }

        function getPage(start, number, params) {
            console.log(number);
            return getRandomItems();
        }

        return {
            getPage: getPage
        };

    }]);

DcmisApp.controller('pipeCtrl',
    ['Resource', '$scope', '$filter', '$http', 'ngDialog','$state','$stateParams',
        function (service, $scope, $filter, $http, ngDialog,$state,$stateParams) {

            var ctrl = this;
console.log($route);
            //$scope.reload = function(){
            //    $state.transitionTo('myState');//.
            //}
            //
            $scope.edituser = function (id) {
                ngDialog.open({
                    template: '/dcassets/edition',
                    className: 'ngdialog-theme-default',
                    scope: $scope,
                    showClose: true,
                    closeByEscape: false
                });
            };
            $scope.deluser = function (user) {
                $http.delete('user/'+user.id).then(
                    function (res) {
                        if (res.data) {
                            var index = ctrl.displayed.indexOf(user);
                            if (index !== -1) {
                                ctrl.displayed.splice(index, 1);
                                $state.transitionTo($state.current, $stateParams, { reload: true, inherit: true, notify: true });
                                //$state.transitionTo('sys-users');
                            }else{
                            }
                        } else {
                        }
                    }
                ), function (data) {
                };

            }
            this.callServer = function callServer(tableState) {

                ctrl.isLoading = true;

                var pagination = tableState.pagination;

                var start = pagination.start || 0;     // This is NOT the page number, but the index of item in the list that you want to use to display the table.
                var number = pagination.number || $scope.itemsByPage;  // Number of entries showed per page.

                service.getPage(start, number, tableState).then(function (result) {

                    var filtered = tableState.search.predicateObject ? $filter('filter')(result.data, tableState.search.predicateObject) : result.data;
                    if (tableState.sort.predicate) {
                        filtered = $filter('orderBy')(filtered, tableState.sort.predicate, tableState.sort.reverse);
                    }

                    ctrl.displayed = filtered.slice(start, start + number);
                    tableState.pagination.numberOfPages = Math.ceil(result.data.length/$scope.itemsByPage);//result.numberOfPages;//set the number of pages so the pagination can update
                    ctrl.isLoading = false;
                });
            };
        }]);
DcmisApp.directive('confirmationNeeded', function () {
    return {
        priority: 1,
        terminal: true,
        link: function (scope, element, attr) {
            var msg = attr.confirmationNeeded || "确定哇?";
            var clickAction = attr.ngClick;
            element.bind('click', function () {
                if (window.confirm(msg)) {
                    scope.$eval(clickAction)
                }
            });
        }
    };
});
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

