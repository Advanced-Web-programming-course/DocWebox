function handleDateTime(id) {
  $(function () {
    $(`#datepicker${id}`).datepicker({
      todayHighlight: "true",
      daysOfWeekDisabled: "0,6",
      startDate: "+1d",
      endDate: "+7d",
      daysOfWeekDisabled: [0, 6],
    });
  });

  $(`.timepicker${id}`).timepicker({
    timeFormat: "h:i A",
    step: 60,
    startTime: "09:00",
    minTime: "09:00",
    maxTime: "17:00",
    disableTimeRanges: [],
    dropdown: true,
    scrollbar: true,
    zindex: 99999,
  });

  $(`#timepicker${id}`).on("click", function () {
    $(`.timepicker${id}`).timepicker("show");
  });
}
