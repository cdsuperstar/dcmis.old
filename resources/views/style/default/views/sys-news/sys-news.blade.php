<!-- BEGIN MAIN CONTENT -->
<div class="row" ng-controller="pipeCtrl as mc">
    <div class="col-md-12" st-pipe="mc.callServer"  st-table="mc.displayed">
        <!-- BEGIN start search CONTENT -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-search-plus"></i>��ѯ
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body" style="overflow: auto;">
                <div class="col-md-8">
                    <label>
                        ����: &nbsp; <input st-search="email" st-input-event="blur" placeholder="�����������Ϣ" class="input-sm input-inline form-control" type="search"/>
                    </label>
                </div>
                <div class="col-md-4">
                    <label>
                        ��ѯȫ�� : &nbsp;<input st-search st-input-event="blur" placeholder="��������ҵ���Ϣ" class="input-sm input-inline form-control" type="search"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- END start search CONTENT -->
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>�������
                </div>
                <div class="tools">
                    <button class="btn btn-default yellow" ng-click="adduser()">
                        <i class="fa fa-plus"></i> &nbsp;��� </button>
                </div>
            </div>
            <div class="portlet-body" style="overflow: auto;">
                <div class="col-md-12">
                    <label>
                        ��ʾ <input onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" class="input-xsmall input-inline form-control ng-valid ng-dirty ng-valid-number ng-touched" name="items" id="items" type="number" ng-model="itemsByPage" ng-model-options="{ updateOn: 'blur' }" /> ��
                    </label>
                    <label class="dataTables-filter">
                        <button class="btn btn-default grey" ng-click="delusers()" confirmation-needed="ȷ��Ҫɾ������������">
                            <i class="fa fa-trash-o"></i> &nbsp;����ɾ�� </button>
                    </label>                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="checkPathAll" onclick="JavaScript:checkout();"/></th>
                        <th>
                            ��
                        </th>
                        <th st-sort="email">
                            ����
                        </th>
                        <th st-sort='name'>
                            ������
                        </th>
                        <th st-sort='password'>
                            ��������
                        </th>
                        <th>
                            ����
                        </th>
                        <th>
                            �༭
                        </th>
                        <th>
                            ɾ��
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-show="mc.isLoading">
                        <td colspan="8" ng-show="mc.isLoading" class="text-center"> ���ݼ����� ... </td>
                    </tr>
                    <tr ng-show="mc.noResult">
                        <td colspan="8" ng-show="mc.noResult" class="text-center" bgcolor="#f0f8ff"> �޷�����������! �������������²�ѯ...  </td>
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
                                <option value="ϵͳ����Ա">ϵͳ����Ա</option>
                                <option value="Ӫ������">Ӫ������</option>
                                <option value="��������">��������</option>
                            </select>
                        </td>
                        <td align="center">
                            <a href="javascript:;" class="dcaedit" ng-click="edituser(user)" title="�༭�������ݣ�">
                                Edit <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td align="center">
                            <a href="javascript:;" class="dcadel" ng-click="deluser(user)" confirmation-needed="ȷ��Ҫɾ������������" title="ɾ���������ݣ�">
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
// BEGIN INIT SCRIPT
// END INIT SCRIPT
</script>
<!-- BEGIN MAIN JS & CSS -->