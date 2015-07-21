﻿<!DOCTYPE html>
<html>
  <head>
    <title>学校管理系统linlu wxb</title>

    <meta http-equiv="keywords" content="培训学校管理系统,培训学校系统,培训学校教务系统">
    <meta http-equiv="description" content="培训学校管理系统">
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">

    <link rel="stylesheet" href="Css/sys-css.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="js/themes/default/easyui.css" />
    <link rel="stylesheet" type="text/css" href="js/themes/icon.css" />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"  charset="UTF-8"></script>
    <script type="text/javascript" src="js/jquery.easyui.js"  charset="UTF-8"></script>
	<script type="text/javascript" src="js/locale/easyui-lang-zh_CN.js"></script>
	
	<script type="text/javascript" src="./js/login-js.js" charset="UTF-8" charset="UTF-8"></script>
 </head>

  <body>
<div id="loginAndRegDialog" style="width: 260px;height: 200px;display: none;">
	<div id="loginTabs">  
		<div title="输入方式" align="center" style="overflow: hidden;padding: 5px;">
			<form id="loginInputForm" method="post">
				<table class="tableForm">
					<tr>
						<th>登&nbsp;录&nbsp;名：</th>
						<td><input id="IName" name="name" class="easyui-validatebox" required="true" value="" />
						</td>
					</tr>
					<tr>
						<th>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</th>
						<td><input id="IPassWord" name="password" type="password" class="easyui-validatebox" required="true" value="" />
						</td>
					</tr>
					<tr>
						<th>验&nbsp;证&nbsp;码：</th>
						<td><input id="YzID" name="YzID" type="password" class="easyui-validatebox" required="true" value="" />
						</td>
					</tr>				
					<tr>
						<th>  </th>
						<td><input type="text" readonly="readonly" id="checkCode" class="unchanged" disabled style="width: 50px;font-size:14px;" />
						 &nbsp;&larr;&nbsp;<a href="#" onclick="createCode()" >刷新验证码</a>
						</td>
					</tr>				
				</table>
			</form>
		</div>
	</div>
</div>
  </body>
</html>
