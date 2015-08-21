var UITree = function () {

    var handleSample = function () {
        $('#slide_tree').jstree({
            'plugins': ["wholerow", "checkbox", "types"],
            'core': {
                "themes" : {
                    "responsive": false
                },
                'data': [{
                    "text": "主页",
                    "icon": "icon-home"
                },{
                    "text": "系统设置",
                    "icon":"icon-settings",
                    "children": [{
                        "text": "用户管理",
                        "icon": "icon-users",
                        "state": {
                            "selected": true
                        }
                    }, {
                        "text": "角色管理",
                        "icon": "icon-globe"
                    }, {
                        "text": "模块管理",
                        "icon" : "icon-support",
                        "state": {
                            "opened": true
                        },
                        "children": [{
                            "text": "模块编辑",
                            "icon" : "icon-direction",
                        },{
                            "text": "模块列表",
                            "icon" : "icon-puzzle",
                        }]
                    }]
                },{
                    "text": "个人中心",
                    "icon":"icon-user-following",
                    "children": [{
                        "text": "新闻公告",
                        "icon": "icon-bell",
                        "state": {
                            "selected": true
                        },
                        "children": [{
                            "text": "发布新闻",
                            "icon" : "icon-share",
                        },{
                            "text": "新闻列表",
                            "icon" : "icon-share-alt",
                        }]
                    }, {
                        "text": "即时信息",
                        "icon": "icon-envelope",
                        "state": {
                            "opened": true
                        },
                        "children": [{
                            "text": "发信息",
                            "icon": "icon-envelope-open",
                        }, {
                            "text": "信息列表",
                            "icon": "icon-envelope-letter",
                        }]
                    },{
                        "text": "个人便签",
                            "icon": "icon-notebook",
                            "state": {
                            "opened": true
                        },
                        "children": [{
                            "text": "添加便签",
                            "icon": "icon-book-open",
                        }, {
                            "text": "便签列表",
                            "icon": "icon-map",
                        }]
                    }]
                }]
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder icon-state-warning icon-lg"
                },
                "file" : {
                    "icon" : "fa fa-file icon-state-warning icon-lg"
                }
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {

            handleSample();

        }

    };

}();