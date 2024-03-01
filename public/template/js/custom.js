showCategories();

const addFormElement = document.querySelector("#add-form");
const addAlertElement = document.querySelector("#add-alert");

addFormElement.addEventListener("submit", async function (e) {
    e.preventDefault();

    const addNameElement = document.querySelector("#add-name");

    let addNameValue = addNameElement.value;

    if (addNameValue == "") {
        addNameElement.classList.add("is-invalid");
        addAlertElement.innerHTML = alert("Provide category name!");
    } else {
        addNameElement.classList.remove("is-invalid");
        addAlertElement.innerHTML = "";

        const token = document.querySelector('input[name="_token"]').value;

        const data = {
            name: addNameValue,
            id: ID,
            _token: token,
        };

        const response = await fetch(addRoute, {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                "Content-Type": "application/json",
            },
        });

        const result = await response.json();

        if (result.errors) {
            if (result.errors.name) {
                addNameElement.classList.add("is-invalid");
                addAlertElement.innerHTML = alert(result.errors.name);
            } else {
                addNameElement.classList.remove("is-invalid");
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

async function showCategories() {
    const response = await fetch(showAllRoute);

    const result = await response.json();

    const responseElement = document.querySelector("#response");

    if (result.categories.length > 1) {
        let rows = "";

        result.categories.forEach(function (category, index) {
            rows += `<tr>
            <td>${index + 1}</td>
            <td>${category.name}</td>
            <td>
                <button type="button" class="btn btn-primary" onclick="editCategory(${
                    category.id
                })" data-bs-toggle="modal"
                    data-bs-target="#editModal">
                    Edit
                </button>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                    Delete
                </button>
            </td>
        </tr>`;
        });

        responseElement.innerHTML = `<table class="table table-bordered m-0">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        ${rows}
        </tbody>
    </table>`;
    } else {
        responseElement.innerHTML = `<div class="alert alert-info m-0">
        No record found!
    </div>`;
    }
}

let mainId = 0;

async function editCategory(id) {
    mainId = id;
    const apiURL = showSingleRoute.replace(":id", id);
    const response = await fetch(apiURL);
    const result = await response.json();

    document.querySelector("#edit-name").value = result.category.name;
}

const editFormElement = document.querySelector("#edit-form");
const editAlertElement = document.querySelector("#edit-alert");

editFormElement.addEventListener("submit", async function (e) {
    e.preventDefault();

    const editNameElement = document.querySelector("#edit-name");

    let editNameValue = editNameElement.value;

    if (editNameValue == "") {
        editNameElement.classList.add("is-invalid");
        editAlertElement.innerHTML = alert("Provide category name!");
    } else {
        editNameElement.classList.remove("is-invalid");
        editAlertElement.innerHTML = "";

        const token = document.querySelector('input[name="_token"]').value;

        const data = {
            name: editNameValue,
            id: ID,
            _token: token,
        };

        const apiURL = editRoute.replace(":id", mainId);

        const response = await fetch(apiURL, {
            method: "PATCH",
            body: JSON.stringify(data),
            headers: {
                "Content-Type": "application/json",
            },
        });

        const result = await response.json();

        if (result.errors) {
            if (result.errors.name) {
                editNameElement.classList.add("is-invalid");
                editAlertElement.innerHTML = alert(result.errors.name);
            } else {
                editNameElement.classList.remove("is-invalid");
                editAlertElement.innerHTML = "";
            }
        } else if (result.success) {
            editAlertElement.innerHTML = alert(result.success, "success");
            showCategories();
        } else if (result.failure) {
            editAlertElement.innerHTML = alert(result.failure);
        } else {
            editAlertElement.innerHTML = alert();
        }
    }
});

function alert(msg = "Something went wrong!", cls = "danger") {
    return `<div class="alert alert-${cls} alert-dismissible fade show" role="alert">
    ${msg}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>`;
}
