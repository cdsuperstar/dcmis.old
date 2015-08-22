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
        <!-- BEGIN SYS PATH -->
        <li>
            <a href="{##}">{##}</a>
        </li>
        <!-- END SYS PATH -->
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                选 项  <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <!-- BEGIN SYS SET -->
                <!-- END SYS SET -->
                <li>
                    <a href="#">
                        <i class="icon-envelope-open"></i> 新消息 </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-calendar"></i> 新便签 <span class="badge badge-success">4</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- END PAGE HEADER-->
@include('style.default.views.'.$sModel.'.'.$sModel);

