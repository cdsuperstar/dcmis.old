'use strict';
DcmisApp.controller('userpwdController',
    //['Resource', '$scope', '$filter', '$http', 'ngDialog', '$state', '$stateParams',
    //    function (service, $scope, $filter, $http, ngDialog, $state, $stateParams) {
    ['$scope','$resource',
        function ($scope, $resource) {
            var userpwd={};
            var dataServer = $resource('/user/data/:id', null, {
                userpwd: {url:'/user/userpwd',method: 'POST'},
            });
            $scope.changepwd=function(userpwd,e){
                if(e.target.disabled||e.target.disabled===undefined)return false;
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