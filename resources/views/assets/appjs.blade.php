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
    $scope.$on('$includeContentLoaded', function() {
        Layout.initSidebar(); // init sidebar
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

        // Dashboard
        .state('dashboard', {
            url: "/dashboard.html",
            templateUrl: "/dcassets/templateurl//dashboard",
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