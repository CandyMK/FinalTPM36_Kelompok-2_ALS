document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.querySelector('form');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const inputGroupName = document.querySelector('input[placeholder="Group Name..."]').value.trim();
        const inputPassword = document.querySelector('input[placeholder="Password..."]').value;

        let users = JSON.parse(localStorage.getItem('userData')) || [];

        const matchedUser = users.find(user => user.groupName === inputGroupName && user.password === inputPassword);

        if (matchedUser) {
            alert('Login Successful!');
            localStorage.setItem('loggedInUser', JSON.stringify(matchedUser));

            window.location.href = '/user/dashboard'; 
        } else {
            alert('Wrong Group Name or Password!');
        }
    });
});
