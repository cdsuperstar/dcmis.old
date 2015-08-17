var datePickers = function () {

    var handleDatePickers = function () {

        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true,
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

        /* Workaround to restrict daterange past date select: http://stackoverflow.com/questions/11933173/how-to-restrict-the-selectable-date-ranges-in-bootstrap-datepicker */
    }
    var handleSelect2 = function () {

        $('#dcMultiselect1').select2({
            placeholder: "请选择……",
            allowClear: true
        });
        $('#dcMultiselect2').select2({
            placeholder: "请至少选择一条数据",
            allowClear: true
        });
    }
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

    return {
        //main function to initiate the module
        init: function () {
            handleDatePickers();
            handleDatetimePicker();
            handleSelect2();
        }
    };
}();