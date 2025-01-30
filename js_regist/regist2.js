function openDatePicker() {
    document.getElementById("birthdate").showPicker();
}

function updateDate() {
    let dateInput = document.getElementById("birthdate");
    document.getElementById("dateDisplay").value = dateInput.value;
}

document.getElementById('submitButton').addEventListener('click', function (event) {
    event.preventDefault();

    const fullName = document.getElementById('groupName').value.trim();
    const email = document.getElementById('Email').value.trim();
    const whatsappNumber = document.getElementById('Number').value.trim();
    const lineID = document.getElementById('LINEID').value.trim();
    const githubID = document.getElementById('GitID').value.trim();
    const birthPlace = document.getElementById('birthPlace').value.trim();
    const birthDate = document.getElementById('birthdate').value;
    
    const cvFile = document.querySelector('.custom-file-input[name="file"]').files[0];
    const flazzFile = document.querySelector('.custom-file-input[name="file"]').files[1];
    const idFile = document.querySelector('.custom-file-input[name="file"]').files[2];

    // Load stored data from localStorage
    let users = JSON.parse(localStorage.getItem('userData')) || [];

    // VALIDATION

    // 1. Check if Full Name is empty
    if (!fullName) {
        showError("Assets_regist/empty_name.png");
        return;
    }

    // 2. Check if email format is correct
    if (!email.endsWith("@gmail.com")) {
        showError("Assets_regist/email_invalid.png");
        return;
    }

    // 3. Check if email is already registered
    if (users.some(user => user.email === email)) {
        showError("Assets_regist/email_invalid.png");
        return;
    }

    // 4. Check if WhatsApp number is already registered
    if (users.some(user => user.whatsappNumber === whatsappNumber)) {
        showError("Assets_regist/min_num_havent_regist.png");
        return;
    }

    // 5. WhatsApp Number Length Validation
    if (whatsappNumber.length < 9) {
        showError("Assets_regist/min_num_havent_regist.png");
        return;
    }

    // 6. Check if LINE ID is already registered
    if (users.some(user => user.lineID === lineID)) {
        showError("Assets_regist/line_registered.png");
        return;
    }

    // 7. Age Validation (Must be 17 or older)
    const birthYear = new Date(birthDate).getFullYear();
    const currentYear = new Date().getFullYear();
    if (currentYear - birthYear < 17) {
        showError("Assets_regist/min_age.png");
        return;
    }

    // 8. Validate that CV is uploaded
    if (!cvFile) {
        showError("Assets_regist/Empty_CV.png");
        return;
    }

    // 9. Validate file formats (CV, Flazz, ID)
    const allowedFormats = ["pdf", "jpg", "jpeg", "png"];

    if (cvFile && !allowedFormats.includes(cvFile.name.split('.').pop().toLowerCase())) {
        showError("Assets_regist/file_format.png");
        return;
    }

    if (flazzFile && !allowedFormats.includes(flazzFile.name.split('.').pop().toLowerCase())) {
        showError("Assets_regist/file_format.png");
        return;
    }

    if (idFile && !allowedFormats.includes(idFile.name.split('.').pop().toLowerCase())) {
        showError("Assets_regist/file_format.png");
        return;
    }

    // STORE DATA IN LOCAL STORAGE
    const newUser = {
        fullName,
        email,
        whatsappNumber,
        lineID,
        githubID,
        birthPlace,
        birthDate,
        cvFile: cvFile ? cvFile.name : null,
        flazzFile: flazzFile ? flazzFile.name : null,
        idFile: idFile ? idFile.name : null
    };

    users.push(newUser);
    localStorage.setItem('userData', JSON.stringify(users));

    // **Console log all stored data**
    console.log("All stored user data:", JSON.parse(localStorage.getItem('userData')));
    window.location.href = "Login-Page.html";
});

// ERROR MODAL
const showError = (imageUrl) => {
    const modal = document.getElementById('errorModal');
    const overlay = document.getElementById('modalOverlay');

    document.getElementById('errorImage').src = imageUrl;

    modal.style.display = 'block';
    overlay.style.display = 'block';
};

// CLOSE MODAL
const closeModal = (event) => {
    const modal = document.getElementById('errorModal');
    const overlay = document.getElementById('modalOverlay');

    if (event.target === overlay) {
        modal.style.display = 'none';
        overlay.style.display = 'none';
    }
};

document.getElementById('modalOverlay').addEventListener('click', closeModal);