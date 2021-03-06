'use strict';
DcmisApp.controller('userpwdController',
    //['Resource', '$scope', '$filter', '$http', 'ngDialog', '$state', '$stateParams',
    //    function (service, $scope, $filter, $http, ngDialog, $state, $stateParams) {
    ['$scope', '$resource',
        function ($scope, $resource) {
            var dataServer = $resource('/userprofile/selfdata/:id', null, {
                userpwd: {url: '/user/userpwd', method: 'POST'},
                //saveprof:{url:'/userprofile/selfdata/',method:'POST'}
            });
            dataServer.get().$promise.then(
                function (res) {
                    $scope.profile = res;
                    console.log("get", res);
                }
            );
            $scope.files = [];

            $scope.$on("fileSelected", function (event, args) {
                $scope.$apply(function () {
                    //add the file object to the scope's files collection
                    $scope.files.push(args.file);
                });
            });
            $scope.saveprofile = function (userprofile) {
                console.log("beforsave", userprofile);
                if ($scope.files[0]) {
                    userprofile.uploadfile = $scope.files[0];
                    userprofile.signpic = $scope.files[0].name;
                }
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

            $scope.opendatepicker = function ($event) {
                $event.preventDefault();
                $event.stopPropagation();
                $scope.opened = true;
            };

        }
    ]);
DcmisApp.directive('datepickerLocalDate', ['$parse', function ($parse) {
    var directive = {
        restrict: 'A',
        require: ['ngModel'],
        link: link
    };
    return directive;

    function link(scope, element, attr, ctrls) {
        var ngModelController = ctrls[0];

        // called with a JavaScript Date object when picked from the datepicker
        ngModelController.$parsers.push(function (viewValue) {
            // undo the timezone adjustment we did during the formatting
            viewValue.setMinutes(viewValue.getMinutes() - viewValue.getTimezoneOffset());
            // we just want a local date in ISO format
            return viewValue.toISOString().substring(0, 10);
        });

        // called with a 'yyyy-mm-dd' string to format
        ngModelController.$formatters.push(function (modelValue) {
            if (!modelValue) {
                return undefined;
            }
            // date constructor will apply timezone deviations from UTC (i.e. if locale is behind UTC 'dt' will be one day behind)
            var dt = new Date(modelValue);
            // 'undo' the timezone offset again (so we end up on the original date again)
            dt.setMinutes(dt.getMinutes() + dt.getTimezoneOffset());
            return dt;
        });
    }
}]);
DcmisApp.directive('fileUpload', function () {
    return {
        scope: true,        //create a new scope
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var files = event.target.files;
                //iterate files since 'multiple' may be specified on the element
                for (var i = 0; i < files.length; i++) {
                    //emit event upward
                    scope.$emit("fileSelected", {file: files[i]});
                }
            });
        }
    };
});