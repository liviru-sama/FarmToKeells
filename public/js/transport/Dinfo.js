const D_id = document.getElementById("D_id");
const D_name = document.getElementById("D_name");
const D_email = document.getElementById("D_email");
const D_contact = document.getElementById("D_contact");
const D_address = document.getElementById("D_address");
const DateJoined = document.getElementById("DateJoined");
const editButton = document.getElementById("edit");
const deleteButton = document.getElementById("delete");
const form = document.getElementById("dInfo");

editButton.addEventListener("click", function() {
    event.preventDefault();

    if (editButton.id === "edit") {
        editButton.id = "save";
        editButton.innerText = "Save";
    } else {
        const formData = new FormData();
        formData.append("D_name", D_name.value);
        formData.append("D_email", D_email.value);
        formData.append("D_contact", D_contact.value);
        formData.append("D_address", D_address.value);
        formData.append("DateJoined", DateJoined.value);
        formData.append("D_id", D_id.value);

        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Bad Network Response');
            }
            return response.text();
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

    D_name.disabled = !D_name.disabled;
    D_email.disabled = !D_email.disabled;
    D_contact.disabled = !D_contact.disabled;
    D_address.disabled = !D_address.disabled;
    DateJoined.disabled = !DateJoined.disabled;
});