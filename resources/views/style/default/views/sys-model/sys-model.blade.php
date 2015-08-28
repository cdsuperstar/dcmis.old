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
        <!-- tree start--->
        <div id="modeltree" class="portlet red-pink box" style="display: none;">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>菜单树管理
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="listtree" class="tree-demo">
                </div>
                <div class="alert alert-info no-margin margin-top-10">
                    Note! The tree nodes are loaded from demo/jstree_ajax_data.php via ajax.
                </div>
            </div>
        </div>
        <!-- tree end -->
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>模块管理
                </div>
                <div class="tools">
                    <button class="btn btn-default yellow" onclick="JavaScript:showtree();">
                        <i class="fa fa-edit"></i> &nbsp;编辑菜单树 </button>&nbsp;&nbsp;
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
                    <tr class="text-center">
                        <th>
                            序
                        </th>
                        <th st-sort="name">
                            模块ID
                        </th>
                        <th st-sort='title'>
                            标题
                        </th>
                        <th st-sort='icon'>
                            图标
                        </th>
                        <th st-sort='ismenu'>
                            显示
                        </th>
                        <th st-sort='url'>
                            模块URL
                        </th>
                        <th st-sort='templateurl'>
                            模块TemplateURL
                        </th>
                        <th st-sort='files' width="320">
                            模块引入文件
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
</script>
<!-- BEGIN MAIN JS & CSS -->