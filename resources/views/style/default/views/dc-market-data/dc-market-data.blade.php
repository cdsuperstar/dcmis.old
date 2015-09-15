<!-- BEGIN MAIN CONTENT -->
<div class="row" ng-controller="modellistcontroll as modelc">
    <div class="col-md-12" st-pipe="modelc.callServer"  st-table="modelc.displayed">
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
                        学生姓名: &nbsp; <input st-search="name" st-input-event="blur" placeholder="请输入模块ID" class="input-sm input-inline form-control" type="search"/>
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
        <script type="text/ng-template" id="treeTemp">
            <div class="portlet red-pink box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-notebook"></i>数据编辑
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="remove" ng-click="closeThisDialog()">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="modelTree" class="tree-demo">
                    </div>
                </div>
            </div>
        </script>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-notebook"></i>数据管理
                </div>
                <div class="tools">
                    <button class="btn btn-default yellow" ng-click="treeEditor()">
                        <i class="fa fa-edit"></i> &nbsp;导入数据 </button>&nbsp;&nbsp;
                    <button class="btn btn-default yellow" onclick="JavaScript:window.location.href='#/sys-addmodel.html';">
                        <i class="fa fa-plus"></i> &nbsp;添加 </button>
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
                    <tr class="text-center">
                        <th>
                            序
                        </th>
                        <th st-sort="name">
                            学校名称
                        </th>
                        <th st-sort='title'>
                            班级名称
                        </th>
                        <th st-sort='icon'>
                            姓名
                        </th>
                        <th st-sort='ismenu' width="50">
                            性别
                        </th>
                        <th st-sort='ismenu' width="50">
                            民族
                        </th>
                        <th st-sort='url'>
                            出生日期
                        </th>
                        <th st-sort='templateurl'>
                            现住址
                        </th>
                        <th st-sort='files' width="300">
                            法定监护人姓名
                        </th>
                        <th st-sort='files' width="300">
                            法定监护人联系电话1
                        </th>
                        <th st-sort='files' width="300">
                            法定监护人联系电话2
                        </th>
                        <th st-sort='files' width="300">
                            法定监护人联系地址
                        </th>
                        <th st-sort='files' width="300">
                            备注
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
                    <tr ng-show="modelc.isLoading">
                        <td colspan="10" ng-show="modelc.isLoading" class="text-center"> 数据加载中 ... </td>
                    </tr>
                    <tr ng-show="modelc.noResult">
                        <td colspan="10" ng-show="modelc.noResult" class="text-center" bgcolor="#f0f8ff"> 无符合条件数据! 请输入条件重新查询...  </td>
                    </tr>
                    <tr ng-repeat="model in modelc.displayed">
                        <td align="center">@{{ $index+1 }}</td>
                        <td>
                            @{{ model.name }}
                        </td>
                        <td>
                            @{{model.title}}
                        </td>
                        <td>
                            @{{model.icon}}
                        </td>
                        <td>
                            @{{model.ismenu}}
                        </td>
                        <td>
                            @{{model.url}}
                        </td>
                        <td>
                            @{{model.templateurl}}
                        </td>
                        <td>
                            @{{model.files}}
                        </td>
                        <td align="center">
                            <a href="javascript:;" class="dcaedit" ng-click="edit(model)" title="编辑该条数据！">
                                Edit <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td align="center">
                            <a href="javascript:;" class="dcadel" ng-click="del(model)" confirmation-needed="确定要删除该条数据吗？" title="删除该条数据！">
                                Delete <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="10"  st-pagination st-items-by-page="itemsByPage" class="text-center">
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
    //    UITree.init();
</script>
<!-- BEGIN MAIN JS & CSS -->