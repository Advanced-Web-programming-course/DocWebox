async function handleDateTime(id, doctor_id, json_hours) {
  $(function () {
    $(`#datepicker${id}`).datepicker({
      todayHighlight: "true",
      daysOfWeekDisabled: "0,6",
      startDate: "+1d",
      endDate: "+7d",
      daysOfWeekDisabled: [0, 6],
    });
  });

  $(`#datepicker${id}`).change(async () => {
    const d = new Date($(`#datepicker${id}`).data().datepicker.viewDate);
    const month = d.getMonth() + 1;
    const day = d.getDate();
    const year = d.getFullYear();

    const res = await fetch(
      `../controllers/availability_controller.php?doctor_id=${doctor_id}&day=${day}&month=${month}&year=${year}`
    );

    let data = await res.json();

    data = data.map((el) => {
      let plus_one_hour = Number(el.hour) + 1;
      return [el.hour + ":00", plus_one_hour + ":00"];
    });

    $(`.timepicker${id}`).timepicker({
      timeFormat: "h:i A",
      step: 60,
      startTime: "09:00",
      minTime: "09:00",
      maxTime: "17:00",
      disableTimeRanges: data,
      dropdown: true,
      scrollbar: true,
      zindex: 99999,
    });

    $(`.timepicker${id}`).timepicker("setTime", "");
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
