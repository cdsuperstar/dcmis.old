'use strict';

DcmisApp.controller('sysmsglistcontroll',
    ['$scope', '$filter', 'ngDialog', '$resource',
        function ($scope, $filter, ngDialog, $resource) {

            var ctrl = this;
            var dataServer = $resource('/sysuser/list/:id', null, {
                update: {method: 'PUT'},
                list: {url: '/sysmsg/list/', method: 'GET', isArray: true}
            });

            $scope._simpleConfig = {
                toolbars: [
                    [ 'cleardoc','|', 'fontfamily', 'fontsize', '|',
                        'bold', 'italic', 'underline','|', 'map','emotion', 'scrawl','|','fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
                    ]
                ],
                autoHeightEnabled: true,
                autoFloatEnabled: true,
                elementPathEnabled : false,
                wordCount: false
            }
            $scope.themsg={};
            $scope.themsg.content = '请输入文字……';
            $scope.sendmsg=function(){
                $scope.themsg.id="test it it it !!!";
            }

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

