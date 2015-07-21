var loginTabs;
var loginInputForm;
var loginAndRegDialog;

//验证码
var code; //在全局 定义验证码   
function createCode() {
    code = "";
    var codeLength = 4;//验证码的长度   
    var checkCode = document.getElementById("checkCode");
    var selectChar = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);//所有候选组成验证码的字符，当然也可以用中文的   
 
    for (var i = 0; i < codeLength; i++) {
        var charIndex = Math.floor(Math.random() * 10);
        code += selectChar[charIndex];
    }
    if (checkCode)	 {
        checkCode.className = "code";
        checkCode.value = code;
    }
}
 
function validate() {
    var inputCode = document.getElementById("YzID").value;
    if (inputCode.length <= 0) {
    	MsgShow("请输入验证码！");
    } else if (inputCode != code) {
    	MsgShow("验证码输入错误！");
    	createCode();//刷新验证码   
    } else {
    	//MsgShow("验证码输入成功！");
    	return code;
    }
}
//验证码结束
$(function() {
	createCode();
	loginAndRegDialog = $('#loginAndRegDialog').show().dialog({
			modal : true,
			title : '系统登录',
			closable : false,
			buttons : [ {
				id : 'btnLogin',
				text : '- 登 录 -',
				handler : function() {
					var n = $("#loginInputForm input[name=name]").val();
					var p = $("#loginInputForm input[name=password]").val();
					var y = $("#loginInputForm input[name=YzID]").val();
					if(!$.trim(n)){MsgShow('请输入用户名！');$("#IName").focus(); return false;}
					if(!$.trim(p)){MsgShow('请输入密码！');$("#IPassWord").focus(); return false;}
					if(!$.trim(y)){MsgShow('请输入验证码！');$("#YzID").focus(); return false;}
					if(validate()){
						
						MsgShow('登陆成功'+validate());
						window.location.href='/loginmain'; //跳转页面
					}					
				}},{
				id : 'btnReset',
				text : '- 取 消 -',
				handler : function() {
					$('#loginAndRegDialog').dialog('close');
				}
			} ]
		});
});
function MsgShow(Msg){
	 var options = { 
	    title: "操作提示", 
	    msg: "<font color=red>"+Msg+"</font>", 
	    showType: 'slide', 
	    timeout: 5000 
	}; 
	$.messager.show(options); 
}
