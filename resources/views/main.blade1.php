<!DOCTYPE html>
<html>
  <head>
    <title>学校管理系统FMAIN</title>
	
    <meta http-equiv="keywords" content="培训学校管理系统,培训学校系统,培训学校教务系统">
    <meta http-equiv="description" content="培训学校管理系统">
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
     <link rel="stylesheet" href="css/sys-css.css" type="text/css" />
    <link id="easyuiTheme" rel="stylesheet" type="text/css" href="js/themes/default/easyui.css" />
    <link rel="stylesheet" type="text/css" href="js/themes/icon.css" />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"  charset="UTF-8"></script>
    <script type="text/javascript" src="js/jquery.easyui.js"  charset="UTF-8"></script>
	<script type="text/javascript" src="js/locale/easyui-lang-zh_CN.js"></script>
	
	<script type="text/javascript" src="./js/sys-js.js" charset="UTF-8"></script>
    <script type="text/javascript">
	 var _menus = {"menus":[
						{"menuid":"1","icon":"icon-sys","menuname":"系统管理",
							"menus":[{"menuname":"菜单管理","icon":"icon-nav","url":"de.html"},
									{"menuname":"添加用户","icon":"icon-add","url":"demo.html"},
									{"menuname":"用户管理","icon":"icon-users","url":"demo2.html"},
									{"menuname":"角色管理","icon":"icon-role","url":"demo2.html"},
									{"menuname":"权限设置","icon":"icon-set","url":"demo.html"},
									{"menuname":"系统日志","icon":"icon-log","url":"demo.html"}
								]
						},{"menuid":"8","icon":"icon-sys","menuname":"员工管理",
							"menus":[{"menuname":"员工列表","icon":"icon-nav","url":"demo.html"},
									{"menuname":"视频监控","icon":"icon-nav","url":"demo1.html"}
								]
						},{"menuid":"56","icon":"icon-sys","menuname":"部门管理",
							"menus":[{"menuname":"添加部门","icon":"icon-nav","url":"demo1.html"},
									{"menuname":"部门列表","icon":"icon-nav","url":"demo2.html"}
								]
						},{"menuid":"28","icon":"icon-sys","menuname":"财务管理",
							"menus":[{"menuname":"收支分类","icon":"icon-nav","url":"demo.html"},
									{"menuname":"报表统计","icon":"icon-nav","url":"demo1.html"},
									{"menuname":"添加支出","icon":"icon-nav","url":"demo.html"}
								]
						},{"menuid":"39","icon":"icon-sys","menuname":"商城管理",
							"menus":[{"menuname":"商品分","icon":"icon-nav","url":"/shop/productcatagory.aspx"},
									{"menuname":"商品列表","icon":"icon-nav","url":"/shop/product.aspx"},
									{"menuname":"商品订单","icon":"icon-nav","url":"/shop/orders.aspx"}
								]
						}
				]};
        //设置登录窗口
        function openPwd() {
            $('#w').window({
                title: '修改密码',
                width: 300,
                modal: true,
                shadow: true,
                closed: true,
                height: 160,
                resizable:false
            });
        }
        //关闭登录窗口
        function close() {
            $('#w').window('close');
        }

        

        //修改密码
        function serverLogin() {
            var $newpass = $('#txtNewPass');
            var $rePass = $('#txtRePass');

            if ($newpass.val() == '') {
                msgShow('请输入密码！');
                return false;
            }
            if ($rePass.val() == '') {
                msgShow('请在一次输入密码！');
                return false;
            }

            if ($newpass.val() != $rePass.val()) {
                msgShow('两次密码不一至！请重新输入');
                return false;
            }

            $.post('/ajax/editpassword.ashx?newpass=' + $newpass.val(), function(msg) {
                msgShow('恭喜，密码修改成功！<br>您的新密码为：' + msg);
                $newpass.val('');
                $rePass.val('');
                close();
            })
            
        }

        $(function() {

            openPwd();
            //
            $('#editpass').click(function() {
                $('#w').window('open');
            });

            $('#btnEp').click(function() {
                serverLogin();
            })

           

            $('#loginOut').click(function() {
                $.messager.confirm('系统提示', '您确定要退出本次登录吗?', function(r) {

                    if (r) {
                        location.href = '/ajax/loginout.ashx';
                    }
                });

            })
        });
   </script>

</head>
<body class="easyui-layout" style="overflow-y: hidden"  scroll="no">
<noscript>
<div style=" position:absolute; z-index:100000; height:2046px;top:0px;left:0px; width:100%; background:white; text-align:center;">
    <img src="images/noscript.gif" alt='抱歉，请开启脚本支持！' />
</div></noscript>
    <div region="north" split="false" border="false" style="overflow: hidden; height: 30px;
        background: url(images/layout-browser-hd-bg.gif) #7f99be repeat-x center 50%;
        line-height: 20px;color: #fff; font-family: Verdana, 微软雅黑,黑体">
        <span style="float:right; padding-right:20px;" class="head">
	 	<div id="layout_north_pfMenu"  style="float:right;">
			<div style="float:right">
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 欢迎你，xxx &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	 <a href="#" id="editpass">修改密码</a> &nbsp;&nbsp; <a href="#" id="loginOut">安全退出</a>
			</div>
	        <div onclick="changeTheme('black');" title="black" style="background-color:#3d3d3d; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>		        
	        <div onclick="changeTheme('bootstrap');" title="bootstrap" style="background-color:#0081c2; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('gray');" title="gray" style="background-color:#0092dc; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('ui-sunny');" title="ui-sunny" style="background-color:#feeebd; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('metro-gray');" title="metro-gray" style="background-color:#c7ccd1; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('metro-green');" title="metro-green" style="background-color:#e5f0c9; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('metro-orange');" title="metro-orange" style="background-color:#f0e3bf; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('metro-red');" title="metro-red" style="background-color:#f0e1e3; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>		        
	        <div onclick="changeTheme('ui-pepper-grinder');" title="ui-pepper-grinder" style="background-color:#f8f7f6; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('metro');" title="metro" style="background-color:#cce6ff; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('metro-blue');" title="metro-blue" style="background-color:#daeef5; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('ui-cupertino');" title="ui-cupertino" style="background-color:#d7ebf9; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>
	        <div onclick="changeTheme('default');" title="default" style="background-color:#e0ecff; width:10px; height:10px;  float:right; margin:10px;cursor:pointer;"> </div>

	    </div></span>
        <span style="padding-left:10px; font-size: 17px; font-family: Verdana, 微软雅黑,黑体">
        <img src="images/blocks.gif" width="20" height="20" align="absmiddle" /> 澳斯特教育   </span>
    </div>
    <div region="south" split="false" style="height: 30px; background: #D2E0F2; ">
        <div class="footer" style="float:right;"> By xxx Email:xx@xx.com.cn</div>
        <div class="footer" id="bgclock" style="float:left; padding-left:5px;"> </div>
    </div>
    <div region="west" split="true" title="导航菜单" style="width:180px;" id="west">
	<div class="easyui-accordion" fit="true" border="false">
		<!--  导航内容 -->
				
			</div>

    </div>
    <div id="mainPanle" region="center" style="background: #eee; overflow-y:hidden">
        <div id="tabs" class="easyui-tabs"  fit="true" border="false" >
			<div title="我的工作台" style="padding:20px;overflow:hidden;" id="home">
				
			<h1>Welcome to jQuery UI!</h1>

			</div>
		</div>
    </div>
    
    
    <!--修改密码窗口-->
    <div id="w" class="easyui-window" title="修改密码" collapsible="false" minimizable="false"
        maximizable="false" icon="icon-save"  style="width: 300px; height: 150px; padding: 5px;
        background: #fafafa;">
        <div class="easyui-layout" fit="true">
            <div region="center" border="false" style="padding: 10px; background: #fff; border: 1px solid #ccc;">
                <table cellpadding=3>
                    <tr>
                        <td>新密码：</td>
                        <td><input id="txtNewPass" type="Password" class="txt01" /></td>
                    </tr>
                    <tr>
                        <td>确认密码：</td>
                        <td><input id="txtRePass" type="Password" class="txt01" /></td>
                    </tr>
                </table>
            </div>
            <div region="south" border="false" style="text-align: right; height: 30px; line-height: 30px;">
                <a id="btnEp" class="easyui-linkbutton" icon="icon-ok" href="javascript:void(0)" >
                    确定</a> <a class="easyui-linkbutton" icon="icon-cancel" href="javascript:void(0)"
                        onclick="closeLogin()">取消</a>
            </div>
        </div>
    </div>

	<div id="mm" class="easyui-menu" style="width:150px;">
		<div id="mm-tabclose">关闭</div>
		<div id="mm-tabcloseall">全部关闭</div>
		<div id="mm-tabcloseother">除此之外全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-tabcloseright">当前页右侧全部关闭</div>
		<div id="mm-tabcloseleft">当前页左侧全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-exit">退出</div>
	</div>


</body>
</html>
