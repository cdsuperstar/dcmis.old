<!-- BEGIN PAGE CONTENT-->
<div class="rows" style="height: 600px;" ng-controller="sysmsglistcontroll">
    <div class="col-md-2">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>用户列表
                </div>
            </div>
            <div class="portlet-body">
                <div class="scroller" style="height:500px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                    <div class="input-icon input-icon-sm right">
                        <i class="icon-magnifier"></i>
                        <input placeholder="搜索.." class="form-control" type="search">
                    </div>
                    <ul id="accordion" class="accordion">
                        <li>
                            <div class="link"><i class="icon-user"></i>职员列表<i class="fa fa-chevron-down"></i></div>
                            <ul class="submenu">
                                <li><a href="#">Photoshop</a></li>
                                <li><a href="#">HTML</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="link"><i class="icon-users"></i>教师列表<i class="fa fa-chevron-down"></i></div>
                            <ul class="submenu">
                                <li><a href="#">Javascript</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">HTML</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="link"><i class="icon-user-following"></i>学生列表<i class="fa fa-chevron-down"></i></div>
                            <ul class="submenu">
                                <li><a href="#">Tablets</a></li>
                                <li><a href="#">HTML</a></li>
                                <li><a href="#">CSS</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="portlet box blue-hoki">
            <div class="portlet-body">
                <div class="scroller" style="height:570px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                    <div style="margin-top: 0px;padding-top: 0px;">
                        <div class="ueditor" ng-model="themsg.content" config="_simpleConfig"></div>
                        <p style="text-align: left;padding-top: 5px;">
                            <a href="javascript:;" class="btn yellow" ng-click="sendmsg()">
                                发送消息 <i class="fa fa-link"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" >
                                清除所有聊天记录
                            </a>
                        </p>
                    </div>
                    <div class="timeline">
                        <!-- TIMELINE ITEM -->
                        <div class="timeline-item">
                            <div class="timeline-badge">
                                <img class="timeline-badge-userpic" src="/assets/admin/pages/media/users/avatar80_1.jpg">
                            </div>
                            <div class="timeline-body">
                                <div class="timeline-body-arrow">
                                </div>
                                <div class="timeline-body-head">
                                    <div class="timeline-body-head-caption">
                                        <a href="javascript:;" class="timeline-body-title font-blue-madison">Andres Iniesta</a>
                                        <span class="timeline-body-time font-grey-cascade">Replied at 7:45 PM</span>
                                    </div>
                                    <div class="timeline-body-head-actions">
                                        <a href="JavaScript:;" title="删除此条消息"><i class="icon-close"></i></a>
                                    </div>
                                </div>
                                <div class="timeline-body-content">
                <span class="font-grey-cascade">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- END TIMELINE ITEM -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
<script type="text/javascript">
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }

        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
            $this = $(this),
                    $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            };
        }

        var accordion = new Accordion($('#accordion'), false);
    });
</script>