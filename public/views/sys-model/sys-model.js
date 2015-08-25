'use strict';

DcmisApp.factory('Resource', ['$q', '$http',
    function ($q, $http) {

        function getRandomItems() {
            return $http.get('/dcmodel');//, {cache: 'true'});
        }

        function getPage(start, number, params) {

            return getRandomItems();
        }

        return {
            getPage: getPage
        };

    }]);


DcmisApp.controller('modellistcontroll',
    //['Resource', '$scope', '$filter', '$http', 'ngDialog', '$state', '$stateParams',
    //    function (service, $scope, $filter, $http, ngDialog, $state, $stateParams) {
    ['Resource', '$scope', '$filter', '$http', 'ngDialog',
        function (service, $scope, $filter, $http, ngDialog) {

            var ctrl = this;

            $scope.editmodel = function (model) {
                $scope.dcEditiontmp = angular.copy(model);
                ngDialog.openConfirm({
                    template: '/dcmodel/edition',
                    className: 'ngdialog-theme-default',
                    scope: $scope,
                    controller: ['$scope', 'validationConfig', function ($scope, validationConfig) {
                        $scope.$validationOptions = validationConfig;
                        $scope.dcEdition = model;
                    }],
                    showClose: false,
                    setBodyPadding: 1,
                    overlay: false,
                    closeByEscape: false
                }).then(function (dcEdition) {
                    $http.put('/dcmodel/' + dcEdition.id, dcEdition).then(
                        function (res) {
                            if (res.data.success) {
                                var index = ctrl.displayed.indexOf(dcEdition);
                                ctrl.displayed[index] = JSON.parse(res.data.data);
                                showMsg(res.data.messages.toString(), '信息', 'lime');
                            } else {
                                // TODO add error message to system
                                showMsg(res.data.errors.toString(), '错误', 'ruby');
                                console.log('update failed!');
                            }
                        }
                    );
                }, function (dcEdition) {
                    var index = ctrl.displayed.indexOf(dcEdition);
                    ctrl.displayed[index] = angular.copy($scope.dcEditiontmp);
                    console.log('Modal promise rejected. Reason: ', index);
                });
            };
            $scope.delmodel = function (model) {
                $http.delete('dcmodel/' + model.id).then(
                    function (res) {
                        if (res.data.success) {
                            var index = ctrl.displayed.indexOf(model);
                            if (index !== -1) {
                                ctrl.displayed.splice(index, 1);
                                showMsg(res.data.messages.toString(), '信息', 'lime');
                                //$state.transitionTo($state.current, $stateParams, { reload: true, inherit: true, notify: true });
                                //$state.transitionTo('sys-users');
                            } else {
                            }
                        } else {
                            showMsg(res.data.errors.toString(), '错误', 'ruby');
                        }
                    }
                ), function (data) {
                };

            }
            this.callServer = function callServer(tableState) {

                ctrl.isLoading = true;
                ctrl.noResult = false;

                var pagination = tableState.pagination;

                var start = pagination.start || 0;     // This is NOT the page number, but the index of item in the list that you want to use to display the table.
                var number = pagination.number || $scope.itemsByPage;  // Number of entries showed per page.

                service.getPage(start, number, tableState).then(function (result) {

                    var filtered = tableState.search.predicateObject ? $filter('filter')(result.data, tableState.search.predicateObject) : result.data;
                    if (tableState.sort.predicate) {
                        filtered = $filter('orderBy')(filtered, tableState.sort.predicate, tableState.sort.reverse);
                    }
                    if(filtered.length==0) ctrl.noResult = true;
                    else ctrl.noResult = false;

                    ctrl.displayed = filtered.slice(start, start + number);
                    tableState.pagination.numberOfPages = Math.ceil(result.data.length / $scope.itemsByPage);//result.numberOfPages;//set the number of pages so the pagination can update
                    ctrl.isLoading = false;
                });
            };
        }])
;


DcmisApp.directive('confirmationNeeded', function () {
    return {
        priority: 1,
        terminal: true,
        link: function (scope, element, attr) {
            var msg = attr.confirmationNeeded || "确定要删除该条数据吗？";
            var clickAction = attr.ngClick;
            element.bind('click', function () {
                if (window.confirm(msg)) {
                    scope.$eval(clickAction)
                }
            });
        }
    };
});
