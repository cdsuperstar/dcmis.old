'use strict';

DcmisApp.factory('Resource', ['$q', '$http',
    function ($q, $http) {

        function getRandomItems() {
            return $http.get('/user');//, {cache: 'true'});
        }

        function getPage(start, number, params) {

            return getRandomItems();
        }

        return {
            getPage: getPage
        };

    }]);


DcmisApp.controller('pipeCtrl',
    //['Resource', '$scope', '$filter', '$http', 'ngDialog', '$state', '$stateParams',
    //    function (service, $scope, $filter, $http, ngDialog, $state, $stateParams) {
    ['Resource', '$scope', '$filter', '$http', 'ngDialog',
        function (service, $scope, $filter, $http, ngDialog) {

            var ctrl = this;
            $scope.adduser = function () {
                ngDialog.openConfirm({
                    template: '/dcassets/edition',
                    className: 'ngdialog-theme-default',
                    scope: $scope,
                    controller: ['$scope', 'validationConfig', function ($scope, validationConfig) {
                        $scope.$validationOptions = validationConfig;
                    }],
                    showClose: false,
                    setBodyPadding: 1,
                    overlay: false,
                    closeByEscape: false
                }).then(function (dcEdition) {
                    $http.post('/user', dcEdition).then(
                        function (res) {
                            if (res.data.success) {
                                ctrl.displayed.push(JSON.parse(res.data.data));
                                showMsg(res.data.messages.toString(), '信息', 'lime');
                                console.log("save success", res);
                            } else {
                                // TODO add error message to system
                                showMsg(res.data.errors.toString(), '错误', 'ruby');
                                console.log('add failed!', res);
                            }
                        }
                    );
                }, function (dcEdition) {
                    console.log('Modal promise rejected. Reason: ', dcEdition);
                });
            };

            $scope.edituser = function (user) {
                $scope.dcEditiontmp = angular.copy(user);
                ngDialog.openConfirm({
                    template: '/dcassets/edition',
                    className: 'ngdialog-theme-default',
                    scope: $scope,
                    controller: ['$scope', 'validationConfig', function ($scope, validationConfig) {
                        $scope.$validationOptions = validationConfig;
                        $scope.dcEdition = user;
                        $scope.dcEdition.password_confirmation = user.password;
                    }],
                    showClose: false,
                    setBodyPadding: 1,
                    overlay: false,
                    closeByEscape: false
                }).then(function (dcEdition) {
                    $http.put('/user/' + dcEdition.id, dcEdition).then(
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
                    delete dcEdition.password_confirmation;
                    var index = ctrl.displayed.indexOf(dcEdition);
                    ctrl.displayed[index] = angular.copy($scope.dcEditiontmp);
                    console.log('Modal promise rejected. Reason: ', index);
                });
            };
            $scope.deluser = function (user) {
                $http.delete('user/' + user.id).then(
                    function (res) {
                        if (res.data.success) {
                            var index = ctrl.displayed.indexOf(user);
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
            $scope.delusers = function () {
                var aTodel = [];
                $("input[name='Datacheckbox']").each(function () {
                    if ($(this).attr("checked")) {
                        aTodel.push($(this).attr("value"));
                    }
                });

                $http.delete('user/' + JSON.stringify(aTodel))
                    .then(
                    function (res) {
                        if (res.data.success) {
                            for(var delkey in aTodel){
                                for (var key in ctrl.displayed) {
                                    if (ctrl.displayed[key].id == aTodel[delkey] ) {
                                        ctrl.displayed.splice(key,1);
                                    }
                                }
                            }
                            //$scope.$apply();

                            showMsg(res.data.messages.toString(), '信息', 'lime');
                        } else {
                            showMsg(res.data.errors.toString(), '错误', 'ruby');
                        }
                    }
                ),
                    function (data) {
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
DcmisApp.directive('csSelect', function () {
    return {
        require: '^stTable',
        template: '<input name="Datacheckbox" value="{{row.id}}" type="checkbox"/>',
        scope: {
            row: '=csSelect'
        },
        link: function (scope, element, attr, ctrl) {

            //element.bind('change', function (evt) {
            //    scope.$apply(function () {
            //        ctrl.select(scope.row, 'multiple');
            //    });
            //});
            //
            //scope.$watch('row.isSelected', function (newValue, oldValue) {
            //    if (newValue === true) {
            //        element.parent().addClass('st-selected');
            //    } else {
            //        element.parent().removeClass('st-selected');
            //    }
            //});
        }
    };
});
//checkbox 全选与全不选
function checkout() {
    if ($("#checkPathAll").attr("checked")) {
        $("input[name='Datacheckbox']").each(function () {
            $(this).attr("checked", true);
        });
    }
    else {
        $("input[name='Datacheckbox']").each(function () {
            $(this).attr("checked", false);
        });
    }
}

//批量删除
