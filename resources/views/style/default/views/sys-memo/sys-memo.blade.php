<div style="overflow: hidden; _zoom:1; padding: 0 3px 2px; margin-top: 10px;">
    <div style="padding-top:3px; padding-bottom:5px;float: left;">
        <button id="sample_editable_1_new" class="btn btn-sm red" onclick="addmemorecord()">
            添加便签 <i class="icon-pin"></i>
        </button>&nbsp;
        <span style="white-space: nowrap;"><font color="#808080">显示：</font>
        &nbsp;<a href="javascript:;">全部便签</a>&nbsp;|&nbsp;
            <a href="javascript:;">工作(<span>0</span>)</a>&nbsp;|&nbsp;
            <a href="javascript:;">生活(<span>0</span>)</a>&nbsp;|&nbsp;
            <a href="javascript:;">个人(<span>0</span>)</a>&nbsp;|&nbsp;
            <a href="javascript:;">生日(<span>0</span>)</a>&nbsp;|&nbsp;
            <a href="javascript:;">其他(<span>10</span>)</a>
        </span>
    </div>
    <div style="padding-top:3px; padding-bottom:5px;float: right;">
        <span style="white-space: nowrap;"> 1 2 3 4  下一页</span>
    </div>
</div>
<div class="portlet-body note-c">
    <div class="note note-danger" id="addmemo" style="display: none;">
        <form action="#" id="formpad" class="form-horizontal form-bordered">
            <div class="form-group">
                <label class="col-sm-1 control-label">标题</label>
                <div class="col-sm-5">
                    <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-bank"></i>
                </span>
                        <input type="text" name="padtitle" class="form-control" required/>
                    </div>
                </div>
                <label class="col-sm-2 control-label">提醒时间</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input name="padtime" class="form-control data form_datetime" data-date-format="yyyy-mm-dd" type="text" placeholder="请选择日期&时间" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">分类</label>
                <div class="col-sm-5">
                    <div class="input-group">
                    <span class="input-group-addon">
                    <i class="icon-badge"></i>
                    </span>
                        <select name="padfl" class="form-control" style="width: 50%;" required>
                            <option value="生活">生活</option>
                            <option value="工作">工作</option>
                            <option value="学习">学习</option>
                            <option value="个人">个人</option>
                            <option value="其他">其他</option>
                        </select>
                    </div>
                </div>
                <label class="col-sm-2 control-label">便签背景</label>
                <div class="col-sm-4">
                    {{--<input type="text" class="colorpicker-default form-control" value="#8fff00" style="width: 50%;"/>--}}
                    <select name="padback" class="form-control" style="width: 50%;" required>
                        <option value="note-danger">粉红色</option>
                        <option value="note-success">浅绿色</option>
                        <option value="note-warning">浅黄色</option>
                        <option value="note-info">淡蓝色</option>
                        <option value="note-primary">深蓝色</option>
                        <option value="note-default">深灰色</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label"> 内 容 </label>
                <div class="col-sm-11">
                    <div id="dcsimpleeditoradd" name="padcontent">
                        请输入便签内容
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 1px;">
                <label class="col-sm-1 control-label">&nbsp;</label>
                <div class="col-sm-11">
                <a href="javascript:;" class="btn blue" onclick="addpad();">
                    发消息 <i class="fa fa-link"></i>
                </a>
                &nbsp;&nbsp;
                <a href="javascript:addmemorecord();"> 取消 </a>
                </div>
            </div>
        </form>
    </div>

    <div class="note note-default">
        <div style="float: right;">
             提醒时间：2015-8-15 13:05  分类：工作
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript:;" class="btn btn-xs yellow">删除此便签</a>
        </div>
        <h4 class="block">Success! Some Header Goes Here</h4>
        <p>
            Duis mollis, est non commodo luctus, nisi erat mattis consectetur purus sit amet porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
        </p>
    </div>
    <div class="note note-primary">
        <h4 class="block">Info! Some Header Goes Here</h4>
        <p>
            Duis mollis, est non commodo luctus, nisi erat porttitor ligula, mattis consectetur purus sit amet eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
        </p>
    </div>
    <div class="note note-warning">
        <h4 class="block">Warning! Some Header Goes Here</h4>
        <p>
            Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit mattis consectetur purus sit amet. Cras mattis consectetur purus sit amet fermentum.
        </p>
    </div>
</div>
    <!-- END ALERTS PORTLET-->
</div>
<script type="text/javascript">
    CKEDITOR.replace( 'dcsimpleeditoradd',{
        toolbar : 'Basic',
        height : 200,
        uiColor : '#9AB8F3'
    });
    jQuery(document).ready(function() {
        ComponentsPickers.init();
    });
</script>