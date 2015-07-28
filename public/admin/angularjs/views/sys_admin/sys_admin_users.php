<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#/dashboard.html">主页</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">系统设置</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#sys_admin/sys_admin_users.php">用户管理</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    选 项  <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#">
                        <i class="icon-user"></i> 添加新用户 </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-present"></i> 添加新事件 <span class="badge badge-success">4</span>
                    </a>
                </li>
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        <i class="icon-basket"></i> New order </a>-->
<!--                </li>-->
<!--                <li class="divider">-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        <i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        <i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
</div>
<h3 class="page-title">
    <small>这里显示励志的小段子：真正的才智是</small>  <font color="red"><i> 刚毅 </i></font>  &nbsp;&nbsp;<small>的志向</small>
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN MAIN CONTENT -->
<div class="row">
    <div class="col-sm-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Table
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> Add </a>
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-pencil"></i> Edit </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-trash-o"></i> Delete </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-ban"></i> Ban </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="i"></i> Make admin </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_3">
                    <thead>
                    <tr>
                        <th class="table-checkbox">
                            <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            shuxer
                        </td>
                        <td>
                            <a href="mailto:shuxer@gmail.com">
                                shuxer@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            looper
                        </td>
                        <td>
                            <a href="mailto:looper90@gmail.com">
                                looper90@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-warning">
									Suspended </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            userwow
                        </td>
                        <td>
                            <a href="mailto:userwow@yahoo.com">
                                userwow@yahoo.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            user1wow
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                userwow@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-default">
									Blocked </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            restest
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                test@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            foopl
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                good@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            weep
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                good@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            coop
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                good@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            pppol
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                good@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            test
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                good@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            userwow
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                userwow@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-default">
									Blocked </span>
                        </td>
                    </tr>
                    <tr class="odd gradeX">
                        <td>
                            <input type="checkbox" class="checkboxes" value="1"/>
                        </td>
                        <td>
                            test
                        </td>
                        <td>
                            <a href="mailto:userwow@gmail.com">
                                test@gmail.com </a>
                        </td>
                        <td>
									<span class="label label-sm label-success">
									Approved </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END MAIN CONTENT -->
<!-- BEGIN MAIN JS -->
<script>
    TableAdvanced.init();
</script>
<!-- END MAIN JS -->