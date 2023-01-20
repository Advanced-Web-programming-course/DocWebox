function handleDateTime(id, doctor_id, json_hours) {
  let nonAvailableHourse = [];
  try {
    nonAvailableHourse = json_hours.map((el) => {
      let plus_one_hour = Number(el.hour) + 1;
      return [el.hour + ":00", plus_one_hour + ":00"];
    });
  } catch (error) {
    console.log(error);
  }

  const now = new Date();

  const month = now.getMonth() + 1;
  const year = now.getFullYear();
  const day = now.getDate();

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
    disableTimeRanges: nonAvailableHourse,
    dropdown: true,
    scrollbar: true,
    zindex: 99999,
  });

  $(`#timepicker${id}`).on("click", function () {
    $(`.timepicker${id}`).timepicker("show");
  });
}
