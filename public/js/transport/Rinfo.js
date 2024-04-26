const date = document.getElementById("date");
const V_id = document.getElementById("V_id");
const assign = document.getElementById("assign");
const acceptButton = document.getElementById("accept");
const rejectButton = document.getElementById("reject");

acceptButton.addEventListener("click", function() {
    date.disabled = !date.disabled;
    V_id.disabled = !V_id.disabled;
    assign.disabled = !assign.disabled;
    updateTransport();
});