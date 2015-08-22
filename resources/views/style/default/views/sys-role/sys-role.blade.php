<!-- BEGIN MAIN CONTENT -->
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
    <div class="portlet-body">
        <table>
            <tr>
                <td>角色名 : &nbsp;</td>
                <td><input type="text" class="form-control" placeholder="请输入角色名"></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-default red-pink">
                    <i class="fa fa-search"></i> &nbsp;查询 </button>
                </td>
            </tr>
        </table>
    </div>
</div>
<!-- END start search CONTENT -->

<div class="col-md-6">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Checkable Tree</span>
            </div>
            <div class="tools">
                <a href="javascript:;" class="reload">
                </a>
                <a href="javascript:;" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div id="slide_tree" class="tree-demo">
            </div>
        </div>
    </div>
</div>


<!-- END MAIN CONTENT -->
<!-- BEGIN MAIN JS & CSS -->
<script>
    UITree.init(); // init todo page
</script>
<!-- BEGIN MAIN JS & CSS -->