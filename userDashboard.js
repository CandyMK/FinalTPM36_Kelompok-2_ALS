const logoutButton = document.getElementById('logout-btn');
const overlay = document.getElementById("overlay");
const popup = document.getElementById('popup');
const confirmButton = document.getElementById('confirm-btn');
const cancelButton = document.getElementById('cancel-btn');

document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".document button");
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            alert(`${button.textContent} button clicked!`);
        });
    });
});

logoutButton.addEventListener('click', () => {
    popup.style.display = 'block';
    popup.classList.add("show");
    overlay.classList.add("show");
});

confirmButton.addEventListener('click', () => {
    window.location.href = 'Login-Page.html';
    alert(`You have successfully logged out!`);
});

cancelButton.addEventListener('click', () => {
    popup.style.display = 'none';
    popup.classList.remove("show");
    overlay.classList.remove("show");
});