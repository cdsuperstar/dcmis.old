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
                        模块ID: &nbsp; <input st-search="name" st-input-event="blur" placeholder="请输入模块ID" class="input-sm input-inline form-control" type="search"/>
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
                    <i class="fa fa-user"></i>模块管理
                </div>
                <div class="tools">
                    <button class="btn btn-default yellow" onclick="JavaScript:window.location.href='#/sys-addmodel.html';">
                        <i class="fa fa-plus"></i> &nbsp;添加 </button>
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body" style="overflow: auto;">
                <div class="col-md-12">
                    <label>
                        显示 <input onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" class="input-xsmall input-inline form-control ng-valid ng-dirty ng-valid-number ng-touched" name="items" id="items" type="number" ng-model="itemsByPage" ng-model-options="{ updateOn: 'blur' }" /> 条
                    </label>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>
                            序
                        </th>
                        <th st-sort="name">
                            模块ID
                        </th>
                        <th st-sort='title'>
                            模块标题
                        </th>
                        <th st-sort='icon'>
                            模块图标
                        </th>
                        <th st-sort='ismenu'>
                            是否显示
                        </th>
                        <th st-sort='url'>
                            模块RUL
                        </th>
                        <th st-sort='templateUrl'>
                                模块TemplateURL
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
                        <td colspan="9" ng-show="mc.isLoading" class="text-center"> 数据加载中 ... </td>
                    </tr>
                    <tr ng-show="mc.noResult">
                        <td colspan="9" ng-show="mc.noResult" class="text-center" bgcolor="#f0f8ff"> 无符合条件数据! 请输入条件重新查询...  </td>
                    </tr>
                    <tr ng-repeat="user in mc.displayed">
                        <td align="center">@{{ $index+1 }}</td>
                        <td>
                            @{{ user.name }}
                        </td>
                        <td>
                            @{{user.title}}
                        </td>
                        <td>
                            @{{user.icon}}
                        </td>
                        <td>
                            @{{user.ismenu}}
                        </td>
                        <td>
                            @{{user.url}}
                        </td>
                        <td>
                            @{{user.templateUrl}}
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
                        <td colspan="9"  st-pagination st-items-by-page="itemsByPage" class="text-center">
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