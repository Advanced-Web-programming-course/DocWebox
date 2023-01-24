function select_doctor(id) {
  window.location.href = "doctor_selected_page.php?doctor_id=" + id;
}

document.getElementById("search_button").onclick = search_for_doctor;

function search_for_doctor() {
  window.location.href =
    "searching_for_doctors.php?location=" +
    document.getElementById("location").value +
    "&speciality=" +
    document.getElementById("doctor").value;
}
if (window.location.href.includes("location")) {
  let params = new URL(window.location.href).searchParams;
  document.getElementById("doctor").value = params.get("speciality");
  document.getElementById("location").value = params.get("location");
}
