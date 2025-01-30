function showPopup() {
    const popup = document.querySelector(".image-popup");
    popup.classList.remove("hide");
    popup.classList.add("show");
    popup.style.visibility = "visible";
}

function hidePopup() {
    const popup = document.querySelector(".image-popup");
    popup.classList.remove("show");
    popup.classList.add("hide");
    setTimeout(() => {
        popup.style.visibility = "hidden";
    }, 500);
}

function handleSubmit() {
    const name = document.querySelector("#name").value;
    const email = document.querySelector("#email").value;
    const subject = document.querySelector("#subject").value;
    const message = document.querySelector("#message").value;


    const submissionData = { name, email, subject, message };
    localStorage.setItem("formSubmission", JSON.stringify(submissionData));

    console.log("Stored Data:", submissionData);

    showPopup();

    setTimeout(() => {
        hidePopup();
    }, 2500);
}

const qaData = [
    { question: "Apa saja persyaratan untuk berpartisipasi di Hackathon 8.0?", 
    answer: "Peserta hanya dapat bergabung dalam 1 tim, baik secara individu maupun tim (setiap tim dapat beranggotakan maksimal 4 orang).\n Peserta adalah warga negara Indonesia berusia 18 hingga 25 tahun untuk memenuhi syarat.\n\n Untuk Informasi lebih lanjut, peserta dapat melihat buku panduan Hackathon 8.0 (Link Guidebook Hackathon 8.0)\n Peserta harus menyerahkan dokumen yang dibutuhkan pada halaman pendaftaran Hackathon, seperti:\n1. CV (Curriculum Vitae)\n2. Portfolio (tidak wajib)\n3. Non-Binusian: KTP (KTP/sIM/dii)\n4. Binusian: Kartu Binusian (Kartu Flazz)" },
    { question: "Apakah Hackathon 8.0 gratis?", 
    answer: "Hackathon 8.0 adalah acara berbayar. Setiap tim harus melakukan pembayaran sesuai periode:\n1. Early Bird (30 Mei - 3 Juni 2024)\nBinusian: Rp. 190.000\nNon-Binusian: Rp. 210.000\n2. Harga Biasa (4 Juni - 11 Juni 2024)\nBinusian: Rp. 200.000\nNon-Binusian: Rp. 225.000" },
    { question: "Kapan batas waktu pendaftaran?", 
    answer: "Batas akhir pendaftaran adalah Selasa, 11 Juni 2025" },
    { question: "Bisakah saya bergabung dengan lebih dari satu tim?",
     answer: "Peserta hanya diperbolehkan bergabung dalam satu tim. Jika lebih dari satu tim, peserta tidak akan terdaftar sebagai peserta Hackathon 8.0." },
    { question: "Jika saya tidak memiliki dasar pemrograman atau desain, bolehkah saya berpartisipasi?", 
    answer: "Peserta tanpa latar belakang pemrograman atau dasar-dasar coding dan desain masih diperbolehkan untuk berpartisipasi pada acara Hackathon. Namun, akan ada seleksi untuk menentukan tim yang akan lolos." }
];

const container = document.getElementById('qaContainer');

qaData.forEach(item => {
    const card = document.createElement('div');
    card.classList.add('card');

    const questionBox = document.createElement('div');
    questionBox.classList.add('question-box');

    const questionText = document.createElement('span');
    questionText.textContent = item.question;

    const toggleButton = document.createElement('button');
    toggleButton.classList.add('toggle-button');

    toggleButton.addEventListener('click', () => {
        card.classList.toggle('active');
        toggleButton.classList.toggle('active');
    });

    questionBox.appendChild(questionText);
    questionBox.appendChild(toggleButton);

    const answerBox = document.createElement('div');
    answerBox.classList.add('answer-box');
    answerBox.textContent = item.answer;

    card.appendChild(questionBox);
    card.appendChild(answerBox);
    container.appendChild(card);
});

window.onload = function () {
    function createScrollItem(imageFile) {
        const item = document.createElement('div');
        item.className = 'scroll-item';

        const img = document.createElement('img');
        img.src = imageFile;
        img.alt = "Media Partner";

        item.appendChild(img);
        return item;
    }

    async function fetchFilesFromFolder(folderPath) {
        return [
            `${folderPath}/medpar1.png`,
            `${folderPath}/medpar2.png`,
            `${folderPath}/medpar3.png`,
            `${folderPath}/medpar4.png`,
            `${folderPath}/medpar5.png`
        ];
    }

    const scrollContainer = document.getElementById('scroll-container');
    const scrollContent = document.getElementById('scroll-content');

    scrollContainer.style.display = 'flex';
    scrollContainer.style.overflowX = 'auto';
    scrollContainer.style.scrollBehavior = 'smooth';
    scrollContainer.style.whiteSpace = 'nowrap';

    fetchFilesFromFolder('Assets').then((imageFiles) => {
        const fullImages = [...imageFiles, ...imageFiles];

        fullImages.forEach((imageFile) => {
            const item = createScrollItem(imageFile);
            scrollContent.appendChild(item);
        });

        function checkScroll() {
            if (scrollContainer.scrollLeft === 0) {
                scrollContainer.scrollLeft = scrollContent.scrollWidth / 2;
            } else if (scrollContainer.scrollLeft >= scrollContent.scrollWidth / 2) {
                scrollContainer.scrollLeft = 0;
            }
        }

        scrollContainer.addEventListener('scroll', checkScroll);
    }).catch((error) => {
        console.error('Error fetching files:', error);
    });
};
