<!-- BEGIN MAIN CONTENT -->
<div class="row" ng-controller="pipeCtrl as mc">
    <div class="col-md-12" st-pipe="mc.callServer"  st-table="mc.displayed">
        <!-- BEGIN start search CONTENT -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-search-plus"></i>查询
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body" style="overflow: auto;">
                <div class="col-md-8">
                    <label>
                        用户名: &nbsp; <input st-search="email" st-input-event="blur" placeholder="请输入用户名" class="input-sm input-inline form-control" type="search"/>
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        查询全部 : &nbsp;<input st-search st-input-event="blur" placeholder="请输入查找的信息" class="input-sm input-inline form-control" type="search"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- END start search CONTENT -->
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>用户管理
                </div>
                <div class="tools">
                    <button class="btn btn-default yellow" ng-click="adduser()">
                        <i class="fa fa-plus"></i> &nbsp;添加 </button>
                </div>
            </div>
            <div class="portlet-body" style="overflow: auto;">
                <div class="col-md-12">
                    <label>
                        显示 <input onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" class="input-xsmall input-inline form-control ng-valid ng-dirty ng-valid-number ng-touched" name="items" id="items" type="number" ng-model="itemsByPage" ng-model-options="{ updateOn: 'blur' }" /> 条
                    </label>
                    <label class="dataTables-filter">
                        <button class="btn btn-default grey" ng-click="delusers()" confirmation-needed="确定要删除该条数据吗？">
                            <i class="fa fa-trash-o"></i> &nbsp;批量删除 </button>
                    </label>                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="checkPathAll" onclick="JavaScript:checkout();"/></th>
                        <th>
                            序
                        </th>
                        <th st-sort="email">
                            用户名
                        </th>
                        <th st-sort='name'>
                            姓名
                        </th>
                        <th st-sort='password'>
                            密码
                        </th>
                        <th>
                            角色
                        </th>
                        <th>
                            编辑
                        </th>
                        <th>
                            删除
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-show="mc.isLoading">
                        <td colspan="8" ng-show="mc.isLoading" class="text-center"> 数据加载中 ... </td>
                    </tr>
                    <tr ng-show="mc.noResult">
                        <td colspan="8" ng-show="mc.noResult" class="text-center" bgcolor="#f0f8ff"> 无符合条件数据! 请输入条件重新查询...  </td>
                    </tr>
                    <tr ng-repeat="user in mc.displayed">
                        <td cs-select="user" align="center"></td>
                        <td align="center">@{{ $index+1 }}</td>
                        <td>
                            @{{ user.email }}
                        </td>
                        <td>
                            @{{user.name}}
                        </td>
                        <td>
                            @{{user.password}}
                        </td>
                        <td>
                            <select class="form-control">
                                <option value="系统管理员">系统管理员</option>
                                <option value="营销主管">营销主管</option>
                                <option value="行政主管">行政主管</option>
                            </select>
                        </td>
                        <td align="center">
                            <a href="javascript:;" class="dcaedit" ng-click="edituser(user)" title="编辑该条数据！">
                                Edit <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td align="center">
                            <a href="javascript:;" class="dcadel" ng-click="deluser(user)" confirmation-needed="确定要删除该条数据吗？" title="删除该条数据！">
                                Delete <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="8"  st-pagination st-items-by-page="itemsByPage" class="text-center">
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<!-- END MAIN CONTENT -->
<!-- BEGIN MAIN JS & CSS -->
<script language="JavaScript" type="text/javascript">
//    TableEditable.init();
</script>
<!-- BEGIN MAIN JS & CSS -->