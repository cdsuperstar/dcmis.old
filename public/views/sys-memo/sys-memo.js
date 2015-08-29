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
            format: "yyyy dd MM - hh:ii",
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