'use strict';

DcmisApp.controller('modellistcontroll',
    ['$scope', '$filter', 'ngDialog', '$resource',
        function ($scope, $filter, ngDialog, $resource) {

            var ctrl = this;
            var dataServer = $resource('/pxunit/data/:id', null, {
                update: {method: 'PUT'},
                list: {url: '/pxunit/list/', method: 'GET', isArray: true},
                movenode: {url: '/pxunit/movenode', method: 'POST'}
            });

            $scope.treeEditor = function () {
                ngDialog.openConfirm({
                    template: 'treeTemp',
                    className: 'ngdialog-theme-default',
                    scope: $scope,
                    controller: ['$scope', 'validationConfig', function ($scope, validationConfig) {
                        $scope.$validationOptions = validationConfig;

                        $scope.$on('ngDialog.opened', function () {
                            //console.log($scope.$parent.$parent.mdTreeJson);
                            $("#modelTree").jstree({
                                "core": {
                                    "themes": {
                                        "responsive": false
                                    },
                                    // so that create works
                                    "check_callback": function (operation, node, parent, position, more) {
                                        if (operation === "copy_node" || operation === "move_node") {
                                            if (parent.id === "#") {
                                                return false; // prevent moving a child above or below the root
                                            }
                                        }
                                        return true; // allow everything else
                                    },
                                    'data': {
                                        'url': function (node) {
                                            return '/dcmodel/tree';
                                        },
                                        'data': function (node) {
                                            return {'modelid': node.modelid};
                                        }
                                    }
                                },
                                "types": {
                                    "default": {
                                        "icon": "fa fa-folder icon-state-warning icon-lg"
                                    },
                                    "file": {
                                        "icon": "fa fa-file icon-state-warning icon-lg"
                                    }
                                },
                                "plugins": ["dnd", "state", "types"]
                            })
                                .bind("move_node.jstree", function (e, data) {
                                    //console.log('the item being dragged ', data);
                                    dataServer.movenode(data).$promise.then(
                                        function (res) {
                                            //console.log(res);
                                            if (res.success) {
                                                showMsg(res.messages.toString(), '信息', 'lime');
                                                //console.log("save success", res);
                                            }
                                        }
                                    );
                                })
                                .bind("changed.jstree", function (e, data) {
                                    //console.log("The selected nodes are:");
                                    //console.log(data);
                                });
                        });
                    }],
                    showClose: false,
                    setBodyPadding: 1,
                    overlay: false,
                    closeByEscape: false
                }).then(function (dcEdition) {

                }, function (dcEdition) {

                });
            }

            // add user
            $scope.add = function () {
                ngDialog.openConfirm({
                    template: '/dcmodel/edition',
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
                    dataServer.save(dcEdition).$promise.then(
                        function (res) {
                            if (res.success) {
                                ctrl.displayed.push(JSON.parse(res.data));
                                showMsg(res.messages.toString(), '信息', 'lime');
                                //console.log("save success", res);
                            } else {
                                // TODO add error message to system
                                showMsg(res.errors.toString(), '错误', 'ruby');
                                //console.log('add failed!', res);
                            }
                        }
                    );
                }, function (dcEdition) {
                    console.log('Modal promise rejected. Reason: ', dcEdition);
                });
            };

            // edit user
            $scope.edit = function (dataRec) {
                $scope.dcEditiontmp = angular.copy(dataRec);
                ngDialog.openConfirm({
                    template: '/dcmodel/edition',
                    className: 'ngdialog-theme-default',
                    scope: $scope,
                    controller: ['$scope', 'validationConfig', function ($scope, validationConfig) {
                        $scope.$validationOptions = validationConfig;
                        $scope.dcEdition = dataRec;
                    }],
                    showClose: false,
                    setBodyPadding: 1,
                    overlay: false,
                    closeByEscape: false
                }).then(function (dcEdition) {
                    dataServer.update({id: dcEdition.id}, dcEdition).$promise.then(
                        function (res) {
                            if (res.success) {
                                var index = ctrl.displayed.indexOf(dcEdition);
                                ctrl.displayed[index] = JSON.parse(res.data);
                                showMsg(res.messages.toString(), '信息', 'lime');
                            } else {
                                // TODO add error message to system
                                showMsg(res.errors.toString(), '错误', 'ruby');
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

            $scope.del = function (user) {
                dataServer.remove({id: user.id}).$promise.then(
                    function (res) {
                        if (res.success) {
                            var index = ctrl.displayed.indexOf(user);
                            if (index !== -1) {
                                ctrl.displayed.splice(index, 1);
                                showMsg(res.messages.toString(), '信息', 'lime');
                                //$state.transitionTo($state.current, $stateParams, { reload: true, inherit: true, notify: true });
                                //$state.transitionTo('sys-users');
                            } else {
                            }
                        } else {
                            showMsg(res.errors.toString(), '错误', 'ruby');
                        }
                    }
                ), function (data) {
                };
            }

            $scope.dels = function () {
                var aTodel = [];
                $("input[name='Datacheckbox']").each(function () {
                    if ($(this).attr("checked")) {
                        aTodel.push($(this).attr("value"));
                    }
                });
                dataServer.remove({id: JSON.stringify(aTodel)}).$promise
                    .then(
                    function (res) {
                        if (res.success) {
                            for (var delkey in aTodel) {
                                for (var key in ctrl.displayed) {
                                    if (ctrl.displayed[key].id == aTodel[delkey]) {
                                        ctrl.displayed.splice(key, 1);
                                    }
                                }
                            }
                            //$scope.$apply();

                            showMsg(res.messages.toString(), '信息', 'lime');
                        } else {
                            showMsg(res.errors.toString(), '错误', 'ruby');
                        }
                    }
                ),
                    function (data) {
                    };
            }

            this.callServer = function callServer(tableState) {

                ctrl.isLoading = true;
                ctrl.noResult = false;

                var pagination = tableState.pagination;

                var start = pagination.start || 0;     // This is NOT the page number, but the index of item in the list that you want to use to display the table.
                var number = pagination.number || $scope.itemsByPage;  // Number of entries showed per page.

                dataServer.list().$promise.then(function (result) {
                    var filtered = tableState.search.predicateObject ? $filter('filter')(result, tableState.search.predicateObject) : result;
                    if (tableState.sort.predicate) {
                        filtered = $filter('orderBy')(filtered, tableState.sort.predicate, tableState.sort.reverse);
                    }

                    if (filtered.length == 0) ctrl.noResult = true;
                    else ctrl.noResult = false;

                    ctrl.displayed = filtered.slice(start, start + number);
                    tableState.pagination.numberOfPages = Math.ceil(result.length / $scope.itemsByPage);//result.numberOfPages;//set the number of pages so the pagination can update
                    ctrl.isLoading = false;
                });
            };
        }]);

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

