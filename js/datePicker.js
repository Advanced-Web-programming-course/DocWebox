
$(function () {
    $('#datepicker').datepicker({
        todayHighlight: 'true',
        daysOfWeekDisabled: '0,6',
        startDate: '+1d',
        endDate: '+14d'
    });
});

$(function () {
    $('#timepicker').Timepicker(pickerInline, { format12: true, inline: true });
});