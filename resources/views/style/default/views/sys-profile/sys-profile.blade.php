<div class="row" ng-controller="userpwdController">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-user"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">个人信息设置</span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#" data-target="#personmes" data-toggle="tab">基础信息</a>
                    </li>
                    <li>
                        <a href="#" data-target="#personpassword" data-toggle="tab">密码修改</a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <!-- PERSONAL INFO TAB -->
                    <div class="tab-pane active" id="personmes">
                        <form role="form" name="profilefm" action="#">
                            <div class="form-group">
                                <label class="col-md-2 control-label"> 个人头像 </label>
                                <div class="col-md-10 input-group">
                                    <div class="col-md-10">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>--}}
                                                <img src="{{  asset('images/users/'.$user->id.'/'.$user->userprofile->signpic) }}" alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                            </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new">
                                                添加图像 </span>
                                                <span class="fileinput-exists">
                                                变更图像 </span>
                                                <input type="file" file-upload accept="image/png,image/jpg,image/jpeg,image/gif" >
                                                </span>
                                                <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                    删除图像 </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">注意! </span>
                                            <span style="line-height:20px;">  &nbsp;&nbsp;支持JPG、GIF、PNG格式图片，用图片编辑软件将图片像素修改为80px*80px，然后上传。 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"> 姓 名 </label>
                                <div class="col-md-10 input-group">
                                    <input type="text" ng-model="profile.name" placeholder="请输入姓名" class="form-control" style="width: 70%;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label"> 性 别 </label>
                                <div class="col-md-10 input-group">
                                    <label class="uniform-inline">&nbsp;&nbsp;
                                        <input type="radio" name="sex" ng-model="profile.sex" ng-checked="dcEdition.sex==m" value="m"/>
                                        男 </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="uniform-inline">
                                        <input type="radio" name="sex" ng-model="profile.sex" ng-checked="dcEdition.sex==f" value="f"/>
                                        女 </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">出生日期</label>
                                <div class="col-md-10 input-group">
                                <input class="form-control data date-picker" data-date-format="yyyy-mm-dd" type="text" ng-model="profile.tdate" placeholder="1985-02-10" style="width: 70%;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">学历</label>
                                <div class="col-md-10 input-group">
                                <input type="text" ng-model="profile.zgxl" placeholder="本科-学校名称-专业名称" class="form-control" style="width: 70%;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">联系电话1</label>
                                <div class="col-md-10 input-group">
                                <input type="text" ng-model="profile.phone" placeholder="13900110011" class="form-control" style="width: 70%;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">联系电话1</label>
                                <div class="col-md-10 input-group">
                                <input type="text" ng-model="profile.phone1" placeholder="13900110011" class="form-control" style="width: 70%;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">紧急联系人及电话</label>
                                <div class="col-md-10 input-group">
                                <textarea class="form-control" ng-model="profile.jjlxr" rows="3" placeholder="某某某-与本人的关系-13900110011 【可以添加多人】" style="width: 70%;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">备注</label>
                                <div class="col-md-10 input-group">
                                    <textarea class="form-control" ng-model="profile.bz" rows="3" placeholder="其他一些个人兴趣、爱好、家庭地址等" style="width: 70%;"></textarea>
                                </div>
                            </div>
                            <div class="margiv-top-10" style="text-align: center;">
                                <a href="#" class="btn green-haze" ng-click="saveprofile(profile)">
                                    保 存 </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" class="btn default" onclick="profilefm.reset()">
                                    取 消 </a>
                            </div>
                        </form>
                    </div>
                    <!-- END PERSONAL INFO TAB -->
                    <!-- CHANGE PASSWORD TAB -->
                    <div class="tab-pane" id="personpassword" >
                        <form action="#" name="userpwdfm" role="form">
                            <div class="form-group">
                                <label class="col-md-2 control-label">现 密 码</label>
                                <div class="col-md-10 input-group">
                                <input type="password" class="form-control" style="width: 70%;" ng-model="userpwd.oldpwd" validation="required" name="oldpwd" placeholder="请输入原密码"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">新 密 码</label>
                                <div class="col-md-10 input-group">
                                <input type="password" class="form-control" style="width: 70%;" ng-model="userpwd.newpwd" validation="required|min_len:4" name="newpwd" placeholder="设置新密码"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">确认新密码</label>
                                <div class="col-md-10 input-group">
                                <input type="password" class="form-control" style="width: 70%;" ng-model="userpwd.confirmnewpwd" validation="match:userpwd.newpwd,Password|required" name="confirmnewpwd" placeholder="确认新密码"/>
                                </div>
                            </div>
                            <div class="margin-top-10"  style="text-align: center;">
                                <a href="#" class="btn green-haze" ng-click="changepwd(userpwd,$event)" ng-disabled="userpwdfm.$invalid">
                                    保 存  </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" class="btn default"  onclick="userpwdfm.reset()">
                                    取 消 </a>
                            </div>
                        </form>
                    </div>
                    <!-- END CHANGE PASSWORD TAB -->
                </div>
            </div>
        </div>
    </div>
</div>