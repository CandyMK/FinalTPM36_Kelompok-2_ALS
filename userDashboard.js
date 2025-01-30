const logoutButton = document.getElementById('logout-btn');
const overlay = document.getElementById("overlay");
const popup = document.getElementById('popup');
const confirmButton = document.getElementById('confirm-btn');
const cancelButton = document.getElementById('cancel-btn');

document.addEventListener('DOMContentLoaded', function () {
    let loggedInUser = JSON.parse(localStorage.getItem('loggedInUser'));

    if (!loggedInUser) {
        alert('You are not logged in. Please log in first!');
        window.location.href = 'Login-Page.html';
        return;
    }

    const allUsers = JSON.parse(localStorage.getItem('userData')) || [];
    const matchingUser  = allUsers.find(user => user.groupName === loggedInUser.groupName);

    if (!matchingUser) {
        alert('User data was not found. Please log in again.');
        localStorage.removeItem('loggedInUser');
        window.location.href = 'Login-Page.html';
        return;
    }

    if (!loggedInUser.groupName && matchingUser.groupName) {
        loggedInUser.groupName = matchingUser.groupName;
        localStorage.setItem('loggedInUser', JSON.stringify(loggedInUser));
    }

    document.querySelector('.team-info h2').textContent = loggedInUser.groupName || "No Group Name";
    document.querySelector('.team-info p:nth-of-type(1)').textContent = `Full Name: ${matchingUser.fullName || "N/A"}`;
    document.querySelector('.team-info p:nth-of-type(2)').textContent = `Email: ${matchingUser.email || "N/A"}`;
    document.querySelector('.team-info p:nth-of-type(3)').textContent = `WhatsApp Number: ${matchingUser.whatsappNumber || "N/A"}`;
    document.querySelector('.team-info p:nth-of-type(4)').textContent = `LINE ID: ${matchingUser.lineID || "N/A"}`;
    document.querySelector('.team-info p:nth-of-type(5)').textContent = `Github ID: ${matchingUser.githubID || "N/A"}`;
    document.querySelector('.team-info p:nth-of-type(6)').textContent = `Birth Place: ${matchingUser.birthPlace || "N/A"}`;
    document.querySelector('.team-info p:nth-of-type(7)').textContent = `Birth Date: ${matchingUser.birthDate || "N/A"}`;

    document.querySelector('.document button:nth-of-type(1)').addEventListener('click', function () {
        if (matchingUser.cvFile) {
            window.open(matchingUser.cvFile, '_blank');
        } else {
            alert('CV belum diunggah.');
        }
    });

    document.querySelector('.document button:nth-of-type(2)').addEventListener('click', function () {
        if (matchingUser.flazzFile) {
            window.open(matchingUser.flazzFile, '_blank');
        } else {
            alert('Flazz Card belum diunggah.');
        }
    });

    document.querySelector('.document button:nth-of-type(3)').addEventListener('click', function () {
        if (matchingUser.idFile) {
            window.open(matchingUser.idFile, '_blank');
        } else {
            alert('ID Card belum diunggah.');
        }
    });

    document.getElementById('logout-btn').addEventListener('click', function () {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
    });

    document.getElementById('confirm-btn').addEventListener('click', function () {
        localStorage.removeItem('loggedInUser'); 
        window.location.href = 'Login-Page.html';
    });

    document.getElementById('cancel-btn').addEventListener('click', function () {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
    });
});
