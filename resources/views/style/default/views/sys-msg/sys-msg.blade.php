<!-- BEGIN PAGE CONTENT-->
<div style="overflow: hidden; _zoom:1; padding: 0 3px 2px; margin-top: 10px;">
    <div style="padding-top:5px; padding-bottom:3px;float: left;">
        <span style="white-space: nowrap;">
            <button id="sample_editable_1_new" class="btn btn-sm red" onclick="addmsgrecord()">
                添加消息 <i class="fa fa-plus"></i>
            </button>&nbsp;
            <font color="#808080">显示：</font>
        &nbsp;<a href="javascript:;">全部消息</a>&nbsp;|&nbsp;
            <a href="javascript:;">未读消息(<span>0</span>)</a>&nbsp;|&nbsp;
            <a href="javascript:;">已略消息(<span>0</span>)</a>
        </span>
    </div>
    <div style="padding-top:3px; padding-bottom:5px;float: right;">
        <span style="white-space: nowrap;"> 1 2 3 4  下一页</span>
    </div>
</div>
<div class="timeline portlet-body">
    <!-- TIMELINE ITEM -->
    <div class="timeline-item"  id="addmsg" style="display: none;">
        <div class="timeline-badge">
            <img class="timeline-badge-userpic" src="/assets/admin/pages/media/users/add.jpg">
        </div>
        <div class="timeline-body mini-hr timeline-reply-content">
            <div id="dcsimpleeditoradd" name="content">
                请输入消息内容...
            </div>
            <hr class="mini-hr">
            <div style="padding-top:3px; padding-bottom:5px;float: left;">
            <select class="form-control input-medium select2me" data-placeholder="请选择用户名...">
                <option value=""></option>
                <option value="AL">Alabama</option>
                <option value="WY">Wyoming</option>
            </select>
            </div>
            <div style="padding-top:3px; padding-bottom:5px;float: right;">
                <a href="javascript:;" class="btn yellow">
                    发消息 <i class="fa fa-link"></i>
                </a>
                &nbsp;&nbsp;
                <a href="javascript:addmsgrecord();"> 取消 </a>
            </div>
        </div>
    </div>
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
                    <input type="hidden" id="cur_pid" value="1">
                    <div class="btn-group">
                        <button class="btn btn-circle green-haze btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            消息处理 <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="javascript:show();">回复此条消息 </a>
                            </li>
                            <li>
                                <a href="javascript:;">忽略此条消息 </a>
                            </li>
                            <li>
                                <a href="javascript:;">删除此条消息 </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="timeline-body-content">
                <span class="font-grey-cascade">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </span>
            </div>
        </div>
        <div class="timeline-body mini-hr timeline-reply-content" id="editordiv" style="display: none;">
            <span><a href="javascript:showrecord();">聊天记录( 24 条) </a></span>
            <div id="recorddv" style="display: none;">
                <div class="record-list">[2015年8月24日 13:24] hahaha</div>
                <div class="record-list">[2015年8月24日 13:24] hahaha</div>
                <div class="record-list">[2015年8月24日 13:24] hahaha</div>
                <div class="record-list">[2015年8月24日 13:24] hahaha</div>
            </div>
            <hr class="mini-hr">
            <div id="dcsimpleeditor-no">
            </div>
            <hr class="mini-hr">
            <div>
                <a href="javascript:;" class="btn yellow">
                    发表回复 <i class="fa fa-link"></i>
                </a>
                &nbsp;&nbsp;
                <a href="javascript:show();"> 取消 </a>
            </div>
        </div>
    </div>
    <!-- END TIMELINE ITEM -->
</div>
<!-- END PAGE CONTENT-->
<script type="text/javascript">
    CKEDITOR.replace( 'dcsimpleeditoradd',{
        toolbar : 'Basic',
        height : 200,
        uiColor : '#9AB8F3'
    });
    CKEDITOR.replace( 'dcsimpleeditor-no',{
        toolbar : 'Basic',
        height : 200,
        uiColor : '#9AB8F3'
    });
</script>