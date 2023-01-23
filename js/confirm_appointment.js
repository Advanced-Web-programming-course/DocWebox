const confirmationButton = document.getElementById("confirmation-button");
const confirmationForm = document.getElementById("appointmentConfirmationForm");

confirmationButton.addEventListener("click", (e) => {
  e.preventDefault();
  console.log("here");
  setTimeout(() => {
    const hiddenField = document.createElement("input");
    hiddenField.type = "hidden";
    console.log(confirmationButton.name);
    hiddenField.name = confirmationButton.name;
    hiddenField.value = confirmationButton.name;

    document.appointmentConfirmationForm.appendChild(hiddenField);

    document.appointmentConfirmationForm = "post";
    document.appointmentConfirmationForm.submit();
  }, 2500);
});
