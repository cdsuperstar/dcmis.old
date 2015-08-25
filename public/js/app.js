/***
 Metronic AngularJS App Main Script
 ***/

/* Metronic App */
var DcmisApp = angular.module("DcmisApp", [
    "ui.router",
    "ui.bootstrap",
    "oc.lazyLoad",
    "ngSanitize",
    "smart-table",
    "ngDialog",
    "ghiscoding.validation","pascalprecht.translate",
]);
DcmisApp.value('validationConfig', {
    debounce: 500,
    displayOnlyLastErrorMsg: false,
    preValidateFormElements: false
});

/* Configure ocLazyLoader(refer: https://github.com/ocombe/ocLazyLoad) */
DcmisApp.config(['$ocLazyLoadProvider','$translateProvider', function($ocLazyLoadProvider,$translateProvider) {
    $ocLazyLoadProvider.config({
        // global configs go here
    });
    $translateProvider.useStaticFilesLoader({
        prefix: '/js/bower_components/angular-validation-ghiscoding/locales/validation/',
        suffix: '.json'
    });

    // define translation maps you want to use on startup
    $translateProvider.preferredLanguage('en');

}]);

/********************************************
 BEGIN: BREAKING CHANGE in AngularJS v1.3.x:
 *********************************************/
/**
 `$controller` will no longer look for controllers on `window`.
 The old behavior of looking on `window` for controllers was originally intended
 for use in examples, demos, and toy apps. We found that allowing global controller
 functions encouraged poor practices, so we resolved to disable this behavior by
 default.

 To migrate, register your controllers with modules rather than exposing them
 as globals:

 Before:

 ```javascript
 function MyController() {
  // ...
}
 ```

 After:

 ```javascript
 angular.module('myApp', []).controller('MyController', [function() {
  // ...
}]);

 Although it's not recommended, you can re-enable the old behavior like this:

 ```javascript
 angular.module('myModule').config(['$controllerProvider', function($controllerProvider) {
  // this option might be handy for migrating old apps, but please don't use it
  // in new ones!
  $controllerProvider.allowGlobals();
}]);
 **/

//AngularJS v1.3.x workaround for old style controller declarition in HTML
DcmisApp.config(['$controllerProvider', function($controllerProvider) {
    // this option might be handy for migrating old apps, but please don't use it
    // in new ones!
    //$compileProvider.debugInfoEnabled(false);

    $controllerProvider.allowGlobals();
}]);

/********************************************
 END: BREAKING CHANGE in AngularJS v1.3.x:
 *********************************************/

/* Setup global settings */
DcmisApp.factory('settings', ['$rootScope', function($rootScope) {
    // supported languages
    var settings = {
        layout: {
            pageSidebarClosed: false, // sidebar menu state
            pageBodySolid: false, // solid body color state
            pageAutoScrollOnLoad: 1000 // auto scroll to top on page load
        },
        layoutImgPath: Metronic.getAssetsPath() + 'admin/layout/img/',
        layoutCssPath: Metronic.getAssetsPath() + 'admin/layout/css/'
    };

    $rootScope.settings = settings;

    return settings;
}]);

/* Setup App Main Controller */
DcmisApp.controller('AppController', ['$scope', '$rootScope', function($scope, $rootScope) {
    $scope.$on('$viewContentLoaded', function() {
        Metronic.initComponents(); // init core components
        //Layout.init(); //  Init entire layout(header, footer, sidebar, etc) on page load if the partials included in server side instead of loading with ng-include directive
    });
}]);

/***
 Layout Partials.
 By default the partials are loaded through AngularJS ng-include directive. In case they loaded in server side(e.g: PHP include function) then below partial
 initialization can be disabled and Layout.init() should be called on page load complete as explained above.
 ***/

/* Setup Layout Part - Header */
DcmisApp.controller('HeaderController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        Layout.initHeader(); // init header
    });
}]);

/* Setup Layout Part - Sidebar */
DcmisApp.controller('SidebarController', ['$scope', function($scope) {
    $scope.mdTreeJson={"1":{"id":1,"parent_id":null,"lft":1,"rgt":28,"depth":0,"dcmodel_id":1,"created_at":"2015-08-23 06:01:37","updated_at":"2015-08-23 06:17:16","dcmodel":{"id":1,"name":"root","title":"System","ismenu":0,"icon":"","url":"","templateurl":"","files":""},"children":[{"id":2,"parent_id":1,"lft":2,"rgt":3,"depth":1,"dcmodel_id":2,"created_at":"2015-08-23 06:03:39","updated_at":"2015-08-23 06:03:39","dcmodel":{"id":2,"name":"dashboard","title":"\u4e3b\u9875","ismenu":1,"icon":"icon-home","url":"\/dashboard.html","templateurl":"\/dcassets\/templateurl\/dashboard","files":"                            '\/js\/controllers\/GeneralPageController.js'"},"children":[]},{"id":4,"parent_id":1,"lft":4,"rgt":15,"depth":1,"dcmodel_id":3,"created_at":"2015-08-23 06:10:09","updated_at":"2015-08-23 06:14:41","dcmodel":{"id":3,"name":"sys-setting","title":"\u7cfb\u7edf\u8bbe\u7f6e","ismenu":1,"icon":"icon-settings","url":null,"templateurl":null,"files":""},"children":[{"id":6,"parent_id":4,"lft":5,"rgt":6,"depth":2,"dcmodel_id":4,"created_at":"2015-08-23 06:13:42","updated_at":"2015-08-23 06:13:42","dcmodel":{"id":4,"name":"sys-users","title":"\u7528\u6237\u7ba1\u7406","ismenu":1,"icon":"icon-users","url":"\/sys-users.html","templateurl":"\/dcassets\/templateurl\/sys-users","files":"                            '\/assets\/global\/plugins\/select2\/select2.css',\n                            '\/assets\/global\/plugins\/datatables\/plugins\/bootstrap\/dataTables.bootstrap.css',\n                            '\/views\/sys-users\/sys-users.css',\n\n                            '\/js\/controllers\/GeneralPageController.js',\n                            '\/views\/sys-users\/sys-users.js',"},"children":[]},{"id":7,"parent_id":4,"lft":7,"rgt":8,"depth":2,"dcmodel_id":5,"created_at":"2015-08-23 06:13:47","updated_at":"2015-08-23 06:13:47","dcmodel":{"id":5,"name":"sys-role","title":"\u89d2\u8272\u7ba1\u7406","ismenu":1,"icon":"icon-globe","url":"\/sys-role.html","templateurl":"\/dcassets\/templateurl\/sys-role","files":"                            '\/assets\/global\/plugins\/jstree\/dist\/themes\/default\/style.min.css',\n\n                            '\/assets\/global\/plugins\/jstree\/dist\/jstree.min.js',\n                            '\/assets\/admin\/pages\/scripts\/ui-tree.js',\n                            '\/views\/sys-role\/sys-role.js',\n                            '\/js\/controllers\/GeneralPageController.js'"},"children":[]},{"id":8,"parent_id":4,"lft":9,"rgt":14,"depth":2,"dcmodel_id":6,"created_at":"2015-08-23 06:13:52","updated_at":"2015-08-23 06:14:41","dcmodel":{"id":6,"name":"sys-modelst","title":"\u6a21\u5757\u7ba1\u7406","ismenu":1,"icon":"icon-support","url":"","templateurl":"","files":"                            '\/assets\/global\/plugins\/select2\/select2.css',\n                            '\/assets\/global\/plugins\/datatables\/plugins\/bootstrap\/dataTables.bootstrap.css',\n\n                            '\/assets\/global\/plugins\/datatables\/media\/js\/jquery.dataTables.min.js',\n                            '\/assets\/global\/plugins\/select2\/select2.min.js',\n                            '\/assets\/global\/plugins\/datatables\/plugins\/bootstrap\/dataTables.bootstrap.js',\n                            '\/views\/sys-model\/sys-model.js',\n                            '\/js\/controllers\/GeneralPageController.js'"},"children":[{"id":9,"parent_id":8,"lft":10,"rgt":11,"depth":3,"dcmodel_id":7,"created_at":"2015-08-23 06:14:39","updated_at":"2015-08-23 06:14:39","dcmodel":{"id":7,"name":"sys-addmodel","title":"\u6a21\u5757\u7f16\u8f91","ismenu":0,"icon":"icon-direction","url":"\/sys-addmodel.html","templateurl":"\/dcassets\/templateurl\/sys-addmodel","files":"                            '\/assets\/global\/plugins\/select2\/select2.css',\n                            '\/assets\/global\/plugins\/bootstrap-select\/bootstrap-select.min.css',\n                            '\/assets\/global\/plugins\/jquery-multi-select\/css\/multi-select.css',\n                            '\/views\/sys-addmodel\/sys-addmodel.css',\n\n                            '\/assets\/global\/plugins\/jquery-validation\/js\/jquery.validate.min.js',\n                            '\/assets\/global\/plugins\/jquery-validation\/js\/additional-methods.min.js',\n                            '\/assets\/global\/plugins\/bootstrap-wizard\/jquery.bootstrap.wizard.min.js',\n                            '\/assets\/global\/plugins\/select2\/select2.min.js',\n                            '\/assets\/global\/plugins\/jquery-multi-select\/js\/jquery.multi-select.js',\n                            '\/views\/sys-addmodel\/sys-addmodel.js',\n                            '\/js\/controllers\/GeneralPageController.js'"},"children":[]},{"id":10,"parent_id":8,"lft":12,"rgt":13,"depth":3,"dcmodel_id":8,"created_at":"2015-08-23 06:14:41","updated_at":"2015-08-23 06:14:41","dcmodel":{"id":8,"name":"sys-model","title":"\u6a21\u5757\u7ba1\u7406","ismenu":1,"icon":"icon-puzzle","url":"\/sys-model.html","templateurl":"\/dcassets\/templateurl\/sys-model","files":""},"children":[]}]}]},{"id":5,"parent_id":1,"lft":16,"rgt":27,"depth":1,"dcmodel_id":9,"created_at":"2015-08-23 06:10:14","updated_at":"2015-08-23 06:17:16","dcmodel":{"id":9,"name":"user-console","title":"\u4e2a\u4eba\u4e2d\u5fc3","ismenu":1,"icon":"icon-user-following","url":"","templateurl":"","files":""},"children":[{"id":11,"parent_id":5,"lft":17,"rgt":22,"depth":2,"dcmodel_id":10,"created_at":"2015-08-23 06:16:30","updated_at":"2015-08-23 06:16:54","dcmodel":{"id":10,"name":"user-msg","title":"\u6d88\u606f\u7ba1\u7406","ismenu":1,"icon":"icon-user-following","url":"","templateurl":"","files":""},"children":[{"id":12,"parent_id":11,"lft":18,"rgt":19,"depth":3,"dcmodel_id":11,"created_at":"2015-08-23 06:16:48","updated_at":"2015-08-23 06:16:48","dcmodel":{"id":11,"name":"msger","title":"\u53d1\u6d88\u606f","ismenu":1,"icon":"icon-envelope-open","url":"\/msger.html","templateurl":"\/dcassets\/templateurl\/msger","files":""},"children":[]},{"id":13,"parent_id":11,"lft":20,"rgt":21,"depth":3,"dcmodel_id":12,"created_at":"2015-08-23 06:16:54","updated_at":"2015-08-23 06:16:54","dcmodel":{"id":12,"name":"msglist","title":"\u6d88\u606f\u5217\u8868","ismenu":1,"icon":"icon-envelope-open","url":"\/msglist.html","templateurl":"\/dcassets\/templateurl\/msglist","files":""},"children":[]}]},{"id":14,"parent_id":5,"lft":23,"rgt":24,"depth":2,"dcmodel_id":13,"created_at":"2015-08-23 06:17:14","updated_at":"2015-08-23 06:17:14","dcmodel":{"id":13,"name":"memo","title":"\u4e2a\u4eba\u4fbf\u7b7e","ismenu":1,"icon":"icon-book-open","url":"\/memo.html","templateurl":"\/dcassets\/templateurl\/memo","files":""},"children":[]},{"id":15,"parent_id":5,"lft":25,"rgt":26,"depth":2,"dcmodel_id":14,"created_at":"2015-08-23 06:17:16","updated_at":"2015-08-23 06:17:16","dcmodel":{"id":14,"name":"userpwd","title":"\u4fee\u6539\u5bc6\u7801","ismenu":1,"icon":"icon-lock","url":"\/userpwd.html","templateurl":"\/dcassets\/templateurl\/userpwd","files":""},"children":[]}]}]}};
    $scope.loaded=false;
    $scope.$on('$includeContentLoaded', function() {
        if(!$scope.loaded)Layout.initSidebar(); // init sidebar
        $scope.loaded=true;
    });

}]);

/* Setup Layout Part - Quick Sidebar */
DcmisApp.controller('QuickSidebarController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        Demo.init(); //init theme panel
        setTimeout(function(){
            QuickSidebar.init(); // init quick sidebar
        }, 2000)
    });
}]);

/* Setup Layout Part - Footer */
DcmisApp.controller('FooterController', ['$scope', function($scope) {
    $scope.$on('$includeContentLoaded', function() {
        Layout.initFooter(); // init footer
    });
}]);

/* Setup Rounting For All Pages */
DcmisApp.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
    // Redirect any unmatched url
    $urlRouterProvider.otherwise("/dashboard.html");

    $stateProvider
        .state('dashboard', {
            url: "/dashboard.html",
            templateUrl: "/dcassets/templateurl/dashboard",
            data: {pageTitle: '主页'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '/js/controllers/GeneralPageController.js'
                        ]
                    });
                }]
            }
        })
        .state('sys-users', {
            url: "/sys-users.html",
            templateUrl: "/dcassets/templateurl/sys-users",
            data: {pageTitle: '用户管理'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '/assets/global/plugins/select2/select2.css',
                            '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',
                            '/views/sys-users/sys-users.css',

                            '/js/controllers/GeneralPageController.js',
                            '/views/sys-users/sys-users.js',
                        ]
                    });
                }]
            }
        })
        .state('sys-role', {
            url: "/sys-role.html",
            templateUrl: "/dcassets/templateurl/sys-role",
            data: {pageTitle: '角色管理'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '/assets/global/plugins/jstree/dist/themes/default/style.min.css',

                            '/assets/global/plugins/jstree/dist/jstree.min.js',
                            '/assets/admin/pages/scripts/ui-tree.js',
                            '/views/sys-role/sys-role.js',
                            '/js/controllers/GeneralPageController.js'
                        ]
                    });
                }]
            }
        })
        .state('sys-addmodel', {
            url: "/sys-addmodel.html",
            templateUrl: "/dcassets/templateurl/sys-addmodel",
            data: {pageTitle: '模块编辑'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                            '/assets/global/plugins/select2/select2.css',
                            '/assets/global/plugins/bootstrap-select/bootstrap-select.min.css',
                            '/assets/global/plugins/jquery-multi-select/css/multi-select.css',
                            '/views/sys-addmodel/sys-addmodel.css',

                            '/assets/global/plugins/jquery-validation/js/jquery.validate.min.js',
                            '/assets/global/plugins/jquery-validation/js/additional-methods.min.js',
                            '/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js',
                            '/assets/global/plugins/select2/select2.min.js',
                            '/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js',
                            '/views/sys-addmodel/sys-addmodel.js',
                            '/js/controllers/GeneralPageController.js'
                        ]
                    });
                }]
            }
        })
        .state('sys-model', {
            url: "/sys-model.html",
            templateUrl: "/dcassets/templateurl/sys-model",
            data: {pageTitle: '模块管理'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [

                        ]
                    });
                }]
            }
        })
        .state('msger', {
            url: "/msger.html",
            templateUrl: "/dcassets/templateurl/msger",
            data: {pageTitle: '发消息'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [

                        ]
                    });
                }]
            }
        })
        .state('msglist', {
            url: "/msglist.html",
            templateUrl: "/dcassets/templateurl/msglist",
            data: {pageTitle: '消息列表'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [

                        ]
                    });
                }]
            }
        })
        .state('memo', {
            url: "/memo.html",
            templateUrl: "/dcassets/templateurl/memo",
            data: {pageTitle: '个人便签'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [

                        ]
                    });
                }]
            }
        })
        .state('userpwd', {
            url: "/userpwd.html",
            templateUrl: "/dcassets/templateurl/userpwd",
            data: {pageTitle: '修改密码'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'DcmisApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [

                        ]
                    });
                }]
            }
        })
    /*
     // Dashboard
     .state('dashboard', {
     url: "/dashboard.html",
     templateUrl: "/dcassets/templateurl/dashboard",
     data: {pageTitle: '主页'},
     controller: "GeneralPageController",
     resolve: {
     deps: ['$ocLazyLoad', function($ocLazyLoad) {
     return $ocLazyLoad.load({
     name: 'DcmisApp',
     insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
     files: [

     '/js/controllers/GeneralPageController.js'
     ]
     });
     }]
     }
     })

     //用户管理
     .state('sys-users', {
     url: "/sys-users.html",
     templateUrl: "/dcassets/templateurl/sys-users",
     data: {pageTitle: '用户管理'},
     controller: "GeneralPageController",
     resolve: {
     deps: ['$ocLazyLoad', function($ocLazyLoad) {
     return $ocLazyLoad.load({
     name: 'DcmisApp',
     insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
     files: [
     '/assets/global/plugins/select2/select2.css',
     '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',
     '/views/sys-users/sys-users.css',

     '/js/controllers/GeneralPageController.js',
     '/views/sys-users/sys-users.js',
     ]
     });
     }]
     }
     })

     //新闻管理 测试ui commponents
     .state('sys-news', {
     url: "/sys-news.html",
     templateUrl: "/dcassets/templateurl/sys-news",
     data: {pageTitle: '新闻管理'},
     controller: "GeneralPageController",
     resolve: {
     deps: ['$ocLazyLoad', function($ocLazyLoad) {
     return $ocLazyLoad.load({
     name: 'DcmisApp',
     insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
     files: [
     '/assets/global/plugins/select2/select2.css',
     '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',
     '/views/sys-news/sys-news.css',

     '/views/sys-news/sys-news.js',
     '/js/controllers/GeneralPageController.js',

     ]
     });
     }]
     }
     })


     //模块列表
     .state('sys-model', {
     url: "/sys-model.html",
     templateUrl: "/dcassets/templateurl/sys-model",
     data: {pageTitle: '模块列表'},
     controller: "GeneralPageController",
     resolve: {
     deps: ['$ocLazyLoad', function($ocLazyLoad) {
     return $ocLazyLoad.load({
     name: 'DcmisApp',
     insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
     files: [
     '/assets/global/plugins/select2/select2.css',
     '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css',

     '/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js',
     '/assets/global/plugins/select2/select2.min.js',
     '/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js',
     '/views/sys-model/sys-model.js',
     '/js/controllers/GeneralPageController.js'
     ]
     });
     }]
     }
     })

     //模块管理-模块编辑
     .state('sys-addmodel', {
     url: "/sys-addmodel.html",
     templateUrl: "/dcassets/templateurl/sys-addmodel",
     data: {pageTitle: '模块编辑'},
     controller: "GeneralPageController",
     resolve: {
     deps: ['$ocLazyLoad', function($ocLazyLoad) {
     return $ocLazyLoad.load({
     name: 'DcmisApp',
     insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
     files: [
     '/assets/global/plugins/select2/select2.css',
     '/assets/global/plugins/bootstrap-select/bootstrap-select.min.css',
     '/assets/global/plugins/jquery-multi-select/css/multi-select.css',
     '/views/sys-addmodel/sys-addmodel.css',

     '/assets/global/plugins/jquery-validation/js/jquery.validate.min.js',
     '/assets/global/plugins/jquery-validation/js/additional-methods.min.js',
     '/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js',
     '/assets/global/plugins/select2/select2.min.js',
     '/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js',
     '/views/sys-addmodel/sys-addmodel.js',
     '/js/controllers/GeneralPageController.js'
     ]
     });
     }]
     }
     })

     //角色管理
     .state('sys-role', {
     url: "/sys-role.html",
     templateUrl: "/dcassets/templateurl/sys-role",
     data: {pageTitle: '角色管理'},
     controller: "GeneralPageController",
     resolve: {
     deps: ['$ocLazyLoad', function($ocLazyLoad) {
     return $ocLazyLoad.load({
     name: 'DcmisApp',
     insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
     files: [
     '/assets/global/plugins/jstree/dist/themes/default/style.min.css',

     '/assets/global/plugins/jstree/dist/jstree.min.js',
     '/assets/admin/pages/scripts/ui-tree.js',
     '/views/sys-role/sys-role.js',
     '/js/controllers/GeneralPageController.js'
     ]
     });
     }]
     }
     })
     */
    // TODO insert here for models
    //BEGIN INSERT MODEL
    //END INSERT MODEL

//add you menu

}]);

function showMsg(msg,title,style,secs,hor,ver,stk){
    if(!title)title='提示';
    if(!style)style='teal';
    if(!secs)secs=5000;
    if(!hor)hor='top';
    if(!ver)ver='right';
    if(!stk)stk=false;
    var settings = {
        theme: style,
        sticky: stk,
        horizontalEdge: hor,
        verticalEdge: ver,
        life:secs,
        heading:title,
        zindex:11500
    };
    $.notific8(msg, settings);
}

/* Init global settings and run the app */
DcmisApp.run(["$rootScope", "settings", "$state", function($rootScope, settings, $state) {
    $rootScope.$state = $state; // state to be accessed from view
}]);