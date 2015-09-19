'use strict';
DcmisApp.controller('userpwdController',
    //['Resource', '$scope', '$filter', '$http', 'ngDialog', '$state', '$stateParams',
    //    function (service, $scope, $filter, $http, ngDialog, $state, $stateParams) {
    ['$scope', '$resource',
        function ($scope, $resource) {
            var dataServer = $resource('/userprofile/selfdata/:id', null, {
                userpwd: {url: '/user/userpwd', method: 'POST'},
            });
            dataServer.get().$promise.then(
                function (res) {
                    $scope.profile=res;
                    console.log("get",res);
                }
            );
            $scope.saveprofile = function (userprofile) {
                dataServer.save(userprofile).$promise.then(
                    function (res) {
                        if (res.success) {
                            showMsg(res.messages.toString(), '信息', 'lime');
                            //console.log("save success", res);
                        } else {
                            // TODO add error message to system
                            showMsg(res.errors.toString(), '错误', 'ruby');
                            //console.log('add failed!', res);
                        }
                        console.log(res);
                    }
                );
                console.log(userprofile);
                console.log($scope.profile);
            }
            $scope.changepwd = function (userpwd, e) {
                if (e.target.disabled || e.target.disabled === undefined)return false;
                dataServer.userpwd(userpwd).$promise.then(
                    function (res) {
                        if (res.success) {
                            showMsg(res.messages.toString(), '信息', 'lime');
                            //console.log("save success", res);
                        } else {
                            // TODO add error message to system
                            showMsg(res.errors.toString(), '错误', 'ruby');
                            //console.log('add failed!', res);
                        }
                    }
                );
            }
        }
    ]);

DcmisApp.directive('file', function () {
    return {
        scope: {
            file: '='
        },
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var files = event.target.files;
                var file = files[0];
                scope.file = file ? file.name : undefined;
                scope.$apply();
            });
        }
    };
});