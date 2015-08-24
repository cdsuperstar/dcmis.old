<div class="page-sidebar navbar-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
	<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
	<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
	<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <script type="text/ng-template" id="categoryTree">
        <a ng-href="@{{ ::tree.dcmodel.url }}"  ng-if="::tree.children.length==0">
            <i class="@{{ ::tree.dcmodel.icon }}"></i>
            @{{ ::tree.dcmodel.title }}
        </a>
        <a ng-href="javascript:;" ng-if="::tree.children.length>0">
            <i class="@{{ ::tree.dcmodel.icon }}"></i>
            <span class="title">@{{ ::tree.dcmodel.title }}</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu" ng-if="::tree.children.length>0" ng-class="">
            <li ng-repeat="tree in ::tree.children" ng-include="'categoryTree'">
            </li>
        </ul>
    </script>

    <ul ng-repeat="tree in ::mdTreeJson " class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" ng-class="{'page-sidebar-menu-closed': settings.layout.pageSidebarClosed}">
		<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
		<li class="sidebar-search-wrapper">
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
			<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->

            <form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="搜索..." >
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
		</li>
        <li  ng-repeat="tree in ::tree.children" ng-include="'categoryTree'"></li>

        {{--<li >--}}
            {{--<a href="#/dashboard.html">--}}
                {{--<i class="icon-home"></i>--}}
                {{--<span class="title">主页</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="javascript:;">--}}
                {{--<i class="icon-settings"></i>--}}
                {{--<span class="title">系统设置</span>--}}
                {{--<span class="arrow "></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
                {{--<li>--}}
                    {{--<a href="#/sys-users.html">--}}
                        {{--<i class="icon-users"></i>--}}
                        {{--用户管理</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#/sys-role.html">--}}
                        {{--<i class="icon-globe"></i>--}}
                        {{--角色管理</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="javascript:;">--}}
                        {{--<i class="icon-support"></i>--}}
                        {{--<span class="title">模块管理</span>--}}
                    {{--<span class="arrow "></span>--}}
                    {{--</a>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li>--}}
                                {{--<a href="#/sys-addmodel.html">--}}
                                    {{--<i class="icon-direction"></i>--}}
                                    {{--模块编辑</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#/sys-model.html">--}}
                                    {{--<i class="icon-puzzle"></i>--}}
                                    {{--模块列表</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="javascript:;">--}}
                {{--<i class="icon-user-following"></i>--}}
                {{--<span class="title">个人中心</span>--}}
                {{--<span class="arrow "></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
                {{--<li>--}}
                    {{--<a href="javascript:;">--}}
                        {{--<i class="icon-bell"></i>--}}
                        {{--新闻公告--}}
                        {{--<span class="arrow "></span>--}}
                    {{--</a>--}}
                    {{--<ul  class="sub-menu">--}}
                        {{--<li>--}}
                            {{--<a href="#/sys-addnews.html">--}}
                                {{--<i class="icon-share"></i>--}}
                                {{--发布新闻</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#/sys-news.html">--}}
                                {{--<i class="icon-share-alt"></i>--}}
                                {{--新闻列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="javascript:;">--}}
                        {{--<i class="icon-envelope"></i>--}}
                        {{--即时信息--}}
                        {{--<span class="arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul  class="sub-menu">--}}
                        {{--<li>--}}
                            {{--<a href="#/sys-addmessage.html">--}}
                                {{--<i class="icon-envelope-open"></i>--}}
                                {{--发信息</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#/sys-messagelist.html">--}}
                                {{--<i class="icon-envelope-letter"></i>--}}
                                {{--信息列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="javascript:;">--}}
                        {{--<i class="icon-notebook"></i>--}}
                        {{--个人便签--}}
                        {{--<span class="arrow "></span>--}}
                    {{--</a>--}}
                    {{--<ul  class="sub-menu">--}}
                        {{--<li>--}}
                            {{--<a href="#/sys-addsticker.html">--}}
                                {{--<i class="icon-book-open"></i>--}}
                                {{--添加便签</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#/sys-stickerlist.html">--}}
                                {{--<i class="icon-map"></i>--}}
                                {{--便签列表</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#/sys-modifypr.html">--}}
                        {{--<i class="icon-lock"></i>--}}
                        {{--修改密码</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{----}}

     </ul>
	<!-- END SIDEBAR MENU -->
</div>	