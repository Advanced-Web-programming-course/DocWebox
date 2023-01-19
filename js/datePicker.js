$(function () {
  $("#datepicker").datepicker({
    todayHighlight: "true",
    daysOfWeekDisabled: "0,6",
    startDate: "+1d",
    endDate: "+14d",
  });
});
