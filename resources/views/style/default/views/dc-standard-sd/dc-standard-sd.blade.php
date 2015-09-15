<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">课程信息设置</span>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#" data-target="#classroom" data-toggle="tab">教室设置</a>
                    </li>
                    <li>
                        <a href="#" data-target="#xjsz" data-toggle="tab">学季设置</a>
                    </li>
                    <li>
                        <a href="#" data-target="#sksdsz" data-toggle="tab">上课时段设置</a>
                    </li>
                </ul>
            </div>
            <div class="portlet-body">
                <div class="tab-content">
                    <!-- PERSONAL INFO TAB -->
                    <div class="tab-pane active" id="classroom">
                        <div class="row" ng-controller="modellistcontroll as modelc">
                            <div class="col-md-12" st-pipe="modelc.callServer"  st-table="modelc.displayed">
                                <script type="text/ng-template" id="treeTemp">
                                    <div class="portlet red-pink box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>教室编辑
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
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-user"></i>教室设置
                                        </div>
                                        <div class="tools">
                                            {{--<button class="btn btn-default yellow" ng-click="treeEditor()">--}}
                                            {{--<i class="fa fa-edit"></i> &nbsp;编辑组织结构树 </button>&nbsp;&nbsp;--}}
                                            <button class="btn btn-default blue" ng-click="add()">
                                                <i class="fa fa-plus"></i> &nbsp;添加 </button>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="overflow: auto;">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dataTables_length">
                                                <label>
                                                    显示 <input onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" class="input-xsmall input-inline form-control ng-valid ng-dirty ng-valid-number ng-touched" name="items" id="items" type="number" ng-model="itemsByPage" ng-model-options="{ updateOn: 'blur' }" /> 条
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dataTables_filter">
                                                <label>
                                                    <div class="input-icon input-icon-sm right">
                                                        <i class="icon-magnifier"></i>
                                                        <input st-search st-input-event="blur" placeholder="请输入查找的信息" class="form-control" type="search"/>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr class="text-center">
                                                <th>
                                                    序
                                                </th>
                                                <th st-sort="name">
                                                    组织名称
                                                </th>
                                                <th st-sort='user_id'>
                                                    教室名称
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
                                                <td colspan="5" ng-show="modelc.isLoading" class="text-center"> 数据加载中 ... </td>
                                            </tr>
                                            <tr ng-show="modelc.noResult">
                                                <td colspan="5" ng-show="modelc.noResult" class="text-center" bgcolor="#f0f8ff"> 无符合条件数据! 请输入条件重新查询...  </td>
                                            </tr>
                                            <tr ng-repeat="model in modelc.displayed">
                                                <td align="center">@{{ $index+1 }}</td>
                                                <td>
                                                    @{{ model.name }}
                                                </td>
                                                <td>
                                                    @{{model.user_id}}
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
                                                <td colspan="5"  st-pagination st-items-by-page="itemsByPage" class="text-center">
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END PERSONAL INFO TAB -->
                    <!-- CHANGE AVATAR TAB -->
                    <div class="tab-pane" id="xjsz">
                        <div class="row" ng-controller="modellistcontroll as modelc">
                            <div class="col-md-12" st-pipe="modelc.callServer"  st-table="modelc.displayed">
                                <script type="text/ng-template" id="treeTemp">
                                    <div class="portlet red-pink box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>学季编辑
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
                                            <i class="fa fa-user"></i>学季设置
                                        </div>
                                        <div class="tools">
                                            {{--<button class="btn btn-default yellow" ng-click="treeEditor()">--}}
                                            {{--<i class="fa fa-edit"></i> &nbsp;编辑组织结构树 </button>&nbsp;&nbsp;--}}
                                            <button class="btn btn-default yellow" ng-click="add()">
                                                <i class="fa fa-plus"></i> &nbsp;添加 </button>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="overflow: auto;">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dataTables_length">
                                                <label>
                                                    显示 <input onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" class="input-xsmall input-inline form-control ng-valid ng-dirty ng-valid-number ng-touched" name="items" id="items" type="number" ng-model="itemsByPage" ng-model-options="{ updateOn: 'blur' }" /> 条
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dataTables_filter">
                                                <label>
                                                    <div class="input-icon input-icon-sm right">
                                                        <i class="icon-magnifier"></i>
                                                        <input st-search st-input-event="blur" placeholder="请输入查找的信息" class="form-control" type="search"/>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr class="text-center">
                                                <th>
                                                    序
                                                </th>
                                                <th st-sort="name">
                                                    组织名称
                                                </th>
                                                <th st-sort='user_id'>
                                                    学季名称
                                                </th>
                                                <th st-sort='user_id'>
                                                    开始日期
                                                </th>
                                                <th st-sort='user_id'>
                                                    结束日期
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
                                                <td colspan="7" ng-show="modelc.isLoading" class="text-center"> 数据加载中 ... </td>
                                            </tr>
                                            <tr ng-show="modelc.noResult">
                                                <td colspan="7" ng-show="modelc.noResult" class="text-center" bgcolor="#f0f8ff"> 无符合条件数据! 请输入条件重新查询...  </td>
                                            </tr>
                                            <tr ng-repeat="model in modelc.displayed">
                                                <td align="center">@{{ $index+1 }}</td>
                                                <td>
                                                    @{{ model.name }}
                                                </td>
                                                <td>
                                                    @{{model.user_id}}
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
                                                <td colspan="7"  st-pagination st-items-by-page="itemsByPage" class="text-center">
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CHANGE AVATAR TAB -->
                    <!-- CHANGE PASSWORD TAB -->
                    <div class="tab-pane" id="sksdsz">
                        <div class="row" ng-controller="modellistcontroll as modelc">
                            <div class="col-md-12" st-pipe="modelc.callServer"  st-table="modelc.displayed">
                                <script type="text/ng-template" id="treeTemp">
                                    <div class="portlet red-pink box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>上课时段编辑
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
                                <div class="portlet box purple">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-user"></i>上课时段设置
                                        </div>
                                        <div class="tools">
                                            {{--<button class="btn btn-default yellow" ng-click="treeEditor()">--}}
                                            {{--<i class="fa fa-edit"></i> &nbsp;编辑组织结构树 </button>&nbsp;&nbsp;--}}
                                            <button class="btn btn-default purple" ng-click="add()">
                                                <i class="fa fa-plus"></i> &nbsp;添加 </button>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="overflow: auto;">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dataTables_length">
                                                <label>
                                                    显示 <input onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" class="input-xsmall input-inline form-control ng-valid ng-dirty ng-valid-number ng-touched" name="items" id="items" type="number" ng-model="itemsByPage" ng-model-options="{ updateOn: 'blur' }" /> 条
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="dataTables_filter">
                                                <label>
                                                    <div class="input-icon input-icon-sm right">
                                                        <i class="icon-magnifier"></i>
                                                        <input st-search st-input-event="blur" placeholder="请输入查找的信息" class="form-control" type="search"/>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr class="text-center">
                                                <th>
                                                    序
                                                </th>
                                                <th st-sort="name">
                                                    上课时段名称
                                                </th>
                                                <th st-sort='user_id'>
                                                    开始时间
                                                </th>
                                                <th st-sort='user_id'>
                                                    结束时间
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
                                                <td colspan="6" ng-show="modelc.isLoading" class="text-center"> 数据加载中 ... </td>
                                            </tr>
                                            <tr ng-show="modelc.noResult">
                                                <td colspan="6" ng-show="modelc.noResult" class="text-center" bgcolor="#f0f8ff"> 无符合条件数据! 请输入条件重新查询...  </td>
                                            </tr>
                                            <tr ng-repeat="model in modelc.displayed">
                                                <td align="center">@{{ $index+1 }}</td>
                                                <td>
                                                    @{{ model.name }}
                                                </td>
                                                <td>
                                                    @{{model.user_id}}
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
                                                <td colspan="6"  st-pagination st-items-by-page="itemsByPage" class="text-center">
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CHANGE PASSWORD TAB -->
                </div>
            </div>
        </div>
    </div>
</div>