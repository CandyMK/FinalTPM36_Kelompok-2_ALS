document.addEventListener("DOMContentLoaded", function () {
    let users = JSON.parse(localStorage.getItem("userData")) || [];

    if (users.length > 0) {
        let user = users[users.length - 1];

        document.querySelector('input[name="fullname"]').value = user.fullName || "";
        document.querySelector('input[name="email"]').value = user.email || "";
        document.querySelector('input[name="whatsapp"]').value = user.whatsappNumber || "";
        document.querySelector('input[name="lineid"]').value = user.lineID || "";
        document.querySelector('input[name="github"]').value = user.githubID || "";
        document.querySelector('input[name="birthplace"]').value = user.birthPlace || "";
        document.querySelector('input[name="birthdate"]').value = user.birthDate || "";
    }

    document.getElementById("editForm").addEventListener("submit", function (event) {
        event.preventDefault();
        window.location.href = "adminPanel-show.html";
    });
});