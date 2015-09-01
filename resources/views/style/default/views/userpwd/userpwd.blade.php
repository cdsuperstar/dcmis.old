<!-- BEGIN MAIN CONTENT -->
<div class="row" ng-controller="userpwdController">
    <div class="portlet box yellow">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-lock"></i> 密码修改
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title="">
                </a>
                <a href="" class="remove" data-original-title="" title="">
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <form class="form-horizontal" name="userpwdfm" role="form">
                <div class="form-group">
                    <label for="inputPassword1" class="col-md-2 control-label">旧密码</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa fa-user"></i>
                            <input type="password" class="form-control" ng-model="userpwd.oldpwd" validation="required" name="oldpwd" placeholder="旧密码">
                        </div>
                        <div class="help-block">
                            请输入旧密码
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-md-2 control-label">新密码</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa fa-user"></i>
                            <input type="password" ng-model="userpwd.newpwd" validation="required|min_len:4" class="form-control" name="newpwd" placeholder="旧密码">
                        </div>
                        <div class="help-block">
                            请输入新密码
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-md-2 control-label">确认新密码</label>
                    <div class="col-md-4">
                        <div class="input-icon right">
                            <i class="fa fa-user"></i>
                            <input type="password" ng-model="userpwd.confirmnewpwd" validation="match:userpwd.newpwd,Password|required" class="form-control" name="confirmnewpwd" placeholder="旧密码">
                        </div>
                        <div class="help-block">
                            请输确认新密码
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10" style="float: right">
                        <button type="submit" class="btn green" ng-click="changepwd(userpwd)" ng-disabled="userpwdfm.$invalid"> - 修  改 - </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- END MAIN CONTENT -->
<!-- BEGIN MAIN JS & CSS -->
<script language="JavaScript" type="text/javascript">
//    TableEditable.init();
</script>
<!-- BEGIN MAIN JS & CSS -->