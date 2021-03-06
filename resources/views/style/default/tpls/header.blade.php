<!-- BEGIN HEADER INNER -->
<div class="page-header-inner">
	<!-- BEGIN LOGO -->
	<div class="page-logo">
		<a href="#/">  
		<img src="../../../assets/admin/layout/img/logo.png" alt="logo" class="logo-default" height="20px"/>
		</a>
		<div class="menu-toggler sidebar-toggler">
			<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
		</div>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN HEADER SEARCH BOX -->
	<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
	<form class="search-form hide" action="#" method="GET">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search..." name="query">
			<span class="input-group-btn">
			<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
			</span>
		</div>
	</form>
	<!-- END HEADER SEARCH BOX -->
	<!-- BEGIN RESPONSIVE MENU TOGGLER -->
	<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
	</a>
	<!-- END RESPONSIVE MENU TOGGLER -->
	<!-- BEGIN TOP NAVIGATION MENU -->
	<div class="top-menu">
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
			<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
				<a href="#" class="dropdown-toggle" dropdown-menu-hover data-toggle="dropdown" data-close-others="true">
				<i class="icon-bell"></i>
				<span class="badge badge-default">
				7 </span>
				</a>
				<ul class="dropdown-menu">
					<li class="external">
						<h3><span class="bold">12 </span> 条未读通知 </h3>
						<a href="#/profile/dashboard">查看全部</a>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
							<li>
								<a href="javascript:;">
								<span class="time">5 分钟</span>
								<span class="details">
								<span class="label label-sm label-icon label-danger">
								<i class="fa fa-bolt"></i>
								</span>
								下午3点会议室会议延期，时间待定. </span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
								<span class="time">15 分钟</span>
								<span class="details">
								<span class="label label-sm label-icon label-danger">
								<i class="fa fa-bolt"></i>
								</span>
								请于下午3点会议室开会. </span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN INBOX DROPDOWN -->
			<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
			<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
				<a href="#" class="dropdown-toggle" dropdown-menu-hover data-toggle="dropdown" data-close-others="true">
				<i class="icon-envelope-open"></i>
				<span class="badge badge-default">
				4 </span>
				</a>
				<ul class="dropdown-menu">
					<li class="external">
						<h3> <span class="bold">7 </span> 条新消息</h3>
						<a href="#/profile/dashboard">查看全部</a>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
							<li>
								<a href="#/profile/dashboard">
								<span class="photo">
								<img src="../../../assets/admin/layout/img/avatar2.jpg" class="img-circle" alt="">
								</span>
								<span class="subject">
								<span class="from">
								Lisa Wong </span>
								<span class="time">Just Now </span>
								</span>
								<span class="message">
								Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
								</a>
							</li>
							<li>
								<a href="#/profile/dashboard">
								<span class="photo">
								<img src="../../../assets/admin/layout/img/avatar3.jpg" class="img-circle" alt="">
								</span>
								<span class="subject">
								<span class="from">
								Richard Doe </span>
								<span class="time">16 mins </span>
								</span>
								<span class="message">
								Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<!-- END INBOX DROPDOWN -->
            <!-- BEGIN TODO DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                <a href="#" class="dropdown-toggle" dropdown-menu-hover data-toggle="dropdown" data-close-others="true">
                    <i class="icon-calendar"></i>
				<span class="badge badge-default">
				3 </span>
                </a>
                <ul class="dropdown-menu extended tasks">
                    <li class="external">
                        <h3> <span class="bold">12 </span> 个便签</h3>
                        <a href="#/todo">查看全部</a>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                            <li>
                                <a href="javascript:;">
								<span class="task">
								<span class="desc">集中学习 </span>
								<span class="percent">3 分钟 后过期</span>
								</span>
								<span class="progress">
								<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
								</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
								<span class="task">
								<span class="desc">听讲座</span>
								<span class="percent">3天 后过期</span>
								</span>
								<span class="progress">
								<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
								</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- END TODO DROPDOWN -->
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            <li class="dropdown dropdown-user">
                <a href="#" class="dropdown-toggle" dropdown-menu-hover data-toggle="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="../../../assets/admin/layout/img/avatar3_small.jpg"/>
				<span class="username username-hide-on-mobile">
					杨老师 </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                    <li>
                        <a href="page_calendar.html">
                            <i class="icon-calendar"></i> 我的日历 </a>
                    </li>
                    <li>
                        <a href="extra_profile.html">
                            <i class="icon-user"></i> 个人主页 </a>
                    </li>
                    <li>
                        <a href="inbox.html">
                            <i class="icon-envelope"></i> 我的信息 <span class="badge badge-danger">
							3 </span>
                        </a>
                    </li>
                    <li>
                        <a href="page_todo.html">
                            <i class="icon-notebook"></i> 我的便签 <span class="badge badge-success">
							7 </span>
                        </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="extra_lock.html">
                            <i class="icon-lock"></i> - 锁 屏 - </a>
                    </li>
                    <li>
                        <a href="/auth/logout">
                            <i class="icon-key"></i> - 注 销 - </a>
                    </li>
                </ul>
            </li>
			<!-- END USER LOGIN DROPDOWN -->
			<!-- BEGIN QUICK SIDEBAR TOGGLER -->
			<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
			<li class="dropdown dropdown-quick-sidebar-toggler">
				<a href="javascript:;" class="dropdown-toggle">
				<i class="icon-logout"></i>
				</a>
			</li>
			<!-- END QUICK SIDEBAR TOGGLER -->
		</ul>
	</div>
	<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER INNER -->