const addFormElement = document.querySelector("#add-form");
const addAlertElement = document.querySelector("#add-alert");


addFormElement.addEventListener('submit', async function (e) {
    e.preventDefault();

    const addNameElement = document.querySelector("#add-name");

    let addNameValue = addNameElement.value;

    if (addNameValue == "") {
        addNameElement.classList.add('is-invalid');
        addAlertElement.innerHTML = alert("Provide category name!");
    } else {
        addNameElement.classList.remove('is-invalid');
        addAlertElement.innerHTML = "";

        const token = document.querySelector('input[name="_token"]').value;

        const data = {
            name: addNameValue,
            id: ID,
            _token: token,
        };

        const response = await fetch(addRoute, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        const result = await response.json();

        if (result.errors) {
            if (result.errors.name) {
                addNameElement.classList.add('is-invalid');
                addAlertElement.innerHTML = alert(result.errors.name);
            } else {
                addNameElement.classList.remove('is-invalid');
                addAlertElement.innerHTML = "";
            }
        } else if (result.success) {
            addAlertElement.innerHTML = alert(result.success, "success");
            addNameElement.value = "";
        } else if (result.failure) {
            addAlertElement.innerHTML = alert(result.failure);
        } else {
            addAlertElement.innerHTML = alert();
        }

    }
});

function alert(msg = "Something went wrong!", cls = "danger") {
    return `<div class="alert alert-${cls} alert-dismissible fade show" role="alert">
    ${msg}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>`;
}
