export default function dataPickerStart () {

	$.datepicker.setDefaults({
        dateFormat: 'yy/mm/dd'
    });

    // var unavailableDates = ['2013-04-10', '2013-04-19', '2013-05-16', '2013-06-14', '2013-06-25', '2013-07-18', '2013-08-16', '2013-09-13', '2013-10-18', '2013-11-22', '2013-12-13', '2013-12-28', '2014-01-15', '2014-02-13'];

    // function unavailable(date) {
    //     ymd = date.getFullYear() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + ("0" + date.getDate()).slice(-2);
    //     day = new Date(ymd).getDay();
    //     if ($.inArray(ymd, unavailableDates) < 0) {
    //         return [true, "enabled", ""];
    //     } else {
    //         return [false, "disabled", "we are closed"];
    //     }
    // }

	$("#txtFromDate").datepicker({
        minDate: "+D",
        maxDate: "+730D",
        // beforeShowDay: unavailable,
        numberOfMonths: 2,
        onSelect: function(selected) {
            var date = $(this).datepicker('getDate');
            if (date) {
                date.setDate(date.getDate());
            }
            $("#txtToDate").datepicker("option", "minDate", date)
        }
    });

    $("#txtToDate").datepicker({
        minDate: 0,
        // beforeShowDay: unavailable,
        maxDate: "+730D",
        numberOfMonths: 2,
        onSelect: function(selected) {
            $("#txtFromDate").datepicker("option", "maxDate", selected)
        }
    });
}