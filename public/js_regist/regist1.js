const showError = (message, imageUrl) => {
    const modal = document.getElementById('errorModal');
    const overlay = document.getElementById('modalOverlay');
    document.getElementById('errorImage').src = imageUrl;

    modal.style.display = 'block';
    overlay.style.display = 'block';
};

const storeMultipleEntries = (groupName, password, userType) => {
    let allEntries = JSON.parse(localStorage.getItem('userData'));

    if (!Array.isArray(allEntries)) {
        allEntries = [];
    }

    const newEntry = {
        groupName: groupName,
        password: password,
        userType: userType ? userType.value : null
    };

    allEntries.push(newEntry);

    localStorage.setItem('userData', JSON.stringify(allEntries));
};

const closeModal = (event) => {
    const modal = document.getElementById('errorModal');
    const overlay = document.getElementById('modalOverlay');

    if (event.target === overlay) {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    }
};

document.getElementById('modalOverlay').addEventListener('click', closeModal);

document.getElementById('submitButton').addEventListener('click', function(event) {
    // event.preventDefault();

    const groupName = document.getElementById('group_name').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    const userType = document.querySelector('input[name="binusian_status"]:checked');

    if (!groupName) {
        showError("Group name is required.", "../Assets_regist/empty_group.png");
        return;
    }

    const passwordRequirements = [
        { regex: /[a-z]/, image: "../Assets_regist/lowercase.png", message: "Password must contain at least one lowercase letter." },
        { regex: /[A-Z]/, image: "../Assets_regist/uppercase.png", message: "Password must contain at least one uppercase letter." },
        { regex: /[0-9]/, image: "../Assets_regist/number.png", message: "Password must contain at least one number." },
        { regex: /[\W_]/, image: "../Assets_regist/symbol.png", message: "Password must contain at least one special character." },
        { regex: /.{8,}/, image: "../Assets_regist/pass_length.png", message: "Password must be at least 8 characters long." }
    ];

    for (const requirement of passwordRequirements) {
        if (!requirement.regex.test(password)) {
            showError(requirement.message, requirement.image);
            return;
        }
    }

    if (!userType) {
        showError("Please select a user type.", "../Assets_regist/empty_group.png");
        return;
    }

    if (password === confirmPassword) {
        storeMultipleEntries(groupName, password, userType);

        window.location.href = "page2"; // Redirect after successful validation
    } else {
        showError("Passwords do not match.", "../Assets_regist/pass_doesnt_match.png");
    }
});

window.addEventListener('load', function() {
    const storedData = JSON.parse(localStorage.getItem('userData'));

    if (storedData) {
        storedData.forEach(entry => {
            console.log(entry);
        });
    } else {
        console.log("No data found in localStorage.");
    }
});