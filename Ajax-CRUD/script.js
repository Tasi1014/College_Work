document.addEventListener("DOMContentLoaded", () => {
    loadPersons();
    setupFormListener();
    setupSearchListener();
});

function setupFormListener() {
    const form = document.getElementById("userForm");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const userId = document.getElementById("userId").value;
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;

        const formData = new FormData(form);
        formData.append("name", name);
        formData.append("email", email);

        let action = userId ? "update" : "create";

        if (userId) {
            formData.append("id", userId);
        }

        fetch(`server.php?action=${action}`, {
            method: "POST",
            body: formData
        })
            .then((response) => response.json())
            .then((data) => {
                showAlert(data.message, "success");
                form.reset();
                document.getElementById("userId").value = "";
                loadPersons();
            })
            .catch((error) => console.error("Error:", error));
    });
}

function setupSearchListener() {
    const search = document.getElementById("search");

    search.addEventListener("input", function () {
        const query = this.value.toLowerCase();

        fetch(`server.php?action=search&query=${query}`, { method: "GET" })
            .then((response) => response.json())
            .then((data) => {
                if (!data.length) {
                    document.getElementById("userTable").innerHTML = "";
                    return;
                }
                renderTable(data);
            });
    });
}

function loadPersons() {
    fetch("server.php?action=read", { method: "GET" })
        .then((response) => response.json())
        .then((data) => {
            if (!data.length) {
                document.getElementById("userTable").innerHTML = "";
                document.getElementById("search").style.display = "none";
                return;
            }
            document.getElementById("search").style.display = "block";
            renderTable(data);
        });
}

function renderTable(users) {
    const tableHTML = `
        <div class="table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="userTableBody"></tbody>
            </table>
        </div>
    `;

    document.getElementById("userTable").innerHTML = tableHTML;

    const rows = users
        .map(
            (user) => `
            <tr>
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td>
                    <button onclick="editUser(${user.id}, '${user.name}', '${user.email}')">Edit</button>
                    <button onclick="deleteUser(${user.id})">Delete</button>
                </td>
            </tr>
        `
        )
        .join("");

    document.getElementById("userTableBody").innerHTML = rows;
}

function editUser(id, name, email) {
    document.getElementById("userId").value = id;
    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
    document.getElementById("name").focus();
}

function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        fetch(`server.php?action=delete&id=${id}`, { method: "DELETE" })
            .then((response) => response.json())
            .then((data) => {
                showAlert(data.message, "success");
                loadPersons();
            });
    }
}

function showAlert(message, type = "success") {
    const alertBox = document.getElementById("alertBox");
    alertBox.textContent = message;
    alertBox.className = type;
    alertBox.style.display = "block";
    alertBox.style.opacity = "1";
    alertBox.style.top = "20px";

    setTimeout(() => {
        alertBox.style.opacity = "0";
        alertBox.style.top = "0px";
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 300);
    }, 3000);
}
