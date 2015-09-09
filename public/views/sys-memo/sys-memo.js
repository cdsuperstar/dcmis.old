function addmemorecord(){
    var tmpdis = document.getElementById("addmemo").style.display;
    if(tmpdis=="none") document.getElementById("addmemo").style.display="";
    else document.getElementById("addmemo").style.display="none";
}

var ComponentsPickers = function () {

    var handleDatetimePicker = function () {

        if (!jQuery().datetimepicker) {
            return;
        }

        $(".form_datetime").datetimepicker({
            autoclose: true,
            isRTL: Metronic.isRTL(),
            format: "yyyy-mm-dd hh:ii",
            pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left")
        });
    }
    var handleColorPicker = function () {
        if (!jQuery().colorpicker) {
            return;
        }
        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            handleDatetimePicker();
            handleColorPicker();
        }
    };

}();

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function addpad(){
    var json = {};
    var jsonuserinfo = $('#formpad').serializeObject();
    var content = myeditor.document.getBody().getHtml();
    var tmparr={"padcontent":content};
    json = eval('('+(JSON.stringify(jsonuserinfo)+JSON.stringify(tmparr)).replace(/}{/,',')+')');
    console.log(json); //输出json结果
}