const V_id = document.getElementById("V_id");
const license = document.getElementById("License_no");
const chassis = document.getElementById("chassis");
const vtype = document.getElementById("vtype");
const model = document.getElementById("model");
const capacity = document.getElementById("capacity");
const driver = document.getElementById("D_id");
const editButton = document.getElementById("edit");
const deleteButton = document.getElementById("delete");
const form = document.getElementById("vInfo");

editButton.addEventListener("click", function() {
    event.preventDefault();

    if (editButton.id === "edit") {
        editButton.id = "save";
        editButton.innerText = "Save";
    } else {
        const formData = new FormData();
        formData.append("V_id", V_id.value);
        formData.append("License_no", license.value);
        formData.append("chassis", chassis.value);
        formData.append("vtype", vtype.value);
        formData.append("model", model.value);
        formData.append("capacity", capacity.value);
        formData.append("D_id", driver.value);

        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Bad Network Response');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
        editButton.id = "edit";
        editButton.innerText = "Edit";
    }

    license.disabled = !license.disabled;
    chassis.disabled = !chassis.disabled;
    vtype.disabled = !vtype.disabled;
    model.disabled = !model.disabled;
    capacity.disabled = !capacity.disabled;
    driver.disabled = !driver.disabled;
});