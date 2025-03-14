<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Register_page_2.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    
    <!-- Navbar atas -->
    <nav>
        <div class="Block">
            <a class="Nav-link" href="{{route('home')}}">HOME</a>
            <a class="Nav-link" href="{{route('home')}}">CHAMPION PRIZE</a>
            <a class="Nav-link" href="{{route('home')}}">MENTOR & JURYS</a>
            <a class="Nav-link" href="{{route('home')}}">ABOUT</a>
            <a class="Nav-link" href="{{route('home')}}">FAQ</a>
            <a class="Nav-link" href="{{route('home')}}">TIMELINE</a>
            <div class="login-block Nav-link">
                <a class="Login" href="{{route('login')}}">LOGIN</a>
            </div>
        </div>
    </nav>

    <!-- Logo -->
    <img class="logo" src="../Assets_regist/Hackathon_logo.png" alt="Hackathon">
    <p style="position: absolute; top: 50px; left: 75px; color: #FFFF;">Hackathon</p>

    
    
    <!-- Form yang sebelah kiri -->
    <div class="submission-container">
        <form id="registrationForm" action="{{ route('register.page2.submit') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            <div>
                <p style="margin-bottom: 10px;">Full Name: </p>
                <input type="text" id="full_name" name="full_name" class="submission" placeholder="Type your Name" value="{{ old('full_name') }}" >
            </div>

            <div>
                <p style="margin-top: 40px; margin-bottom: 10px;">Email: </p>
                <input type="text" id="email" name="email" class="submission" placeholder="Type your Email" value="{{ old('email') }}" >
            </div>

            <div>
                <p style="margin-top: 40px; margin-bottom: 10px;">WhatsApp Number: </p>
                <input type="text" id="whatsapp" name="whatsapp" class="submission" placeholder="Type your WhatsApp Number" value="{{ old('whatsapp') }}" >
            </div>
            <div>
                <p style="margin-top: 40px; margin-bottom: 10px;">LINE ID: </p>
                <input type="text" id="line_id" name="line_id" class="submission" placeholder="Type your LINE ID" value="{{ old('line_id') }}" >
            </div>

            <div>
                <p style="margin-top: 40px; margin-bottom: 10px;">Github / Github ID: </p>
                <input type="text" id="github_id" name="github_id" class="submission" placeholder="Type your Github" value="{{ old('github_id') }}" >
            </div>

            <div>
                <p style="margin-top: 40px; margin-bottom: 10px;">Birth Place: </p>
                <input type="text" id="birthplace" name="birthplace" class="submission" placeholder="Type your Birth Place" value="{{ old('birthplace') }}" >
            </div>

            <div>
                <p style="margin-top: 40px; margin-bottom: 10px;">Birth Date: </p>
                <div class="submission" style="margin-bottom: 40px;">
                    <input type="text" id="dateDisplay" class="date-display" placeholder="Select Date" readonly>
                    <img src="../Assets_regist/Calendar_icon.png" alt="Calendar" class="calendar-icon" onclick="openDatePicker()">
                    <input type="date" id="birthdate" name="birthdate" onchange="updateDate()" value="{{ old('birthdate') }}" >
                </div>

            <div>
                <div style="display: flex; gap: 10px;">
                    <img style="width: 81px; height: 81px;" src="../Assets_regist/Upload_logo.png">
                    <p style="font-size: 29.4px; margin-bottom: -10px;">Upload CV: </p>
                </div>
                <div class="upload-label submission" style="border-radius: 10px; width: 227px; height: 38px; margin-left: 100px; padding: 0px;">
                    <label for="cv">
                        <img src="../Assets_regist/Upload_icon.png" alt="Upload" width="50" height="50">
                        <input type="file" name="cv" id="cv" class="custom-file-input" required>
                    </label>
                </div>
            </div>
            <p class="little-note" style="font-size: 16.19px; left: 100px;">*Format file pdf, jpg, jpeg dan png</p>


            <div style="margin-top: 50px;">
                <div style="display: flex; gap: 10px;">
                    <img style="width: 81px; height: 81px;" src="../Assets_regist/Upload_logo.png">
                    <p style="font-size: 29.4px; margin-bottom: -10px;">Upload Flazz Card (Binusian): </p>
                </div>
                <div class="upload-label submission" style="border-radius: 10px; width: 227px; height: 38px; margin-left: 100px; padding: 0px;">
                    <label for="flazz_card">
                        <img src="../Assets_regist/Upload_icon.png" alt="Upload" width="50" height="50">
                        <input type="file" name="flazz_card" id="flazz_card" class="custom-file-input">
                    </label>
                </div>
            </div>
            <p class="little-note" style="font-size: 16.19px; left: 100px;">*Format file pdf, jpg, jpeg dan png</p>

            <div style="margin-top:50px;">
                <div style="display: flex; gap: 10px;">
                    <img style="width: 81px; height: 81px;" src="../Assets_regist/Upload_logo.png">
                    <p style="font-size: 29.4px; margin-bottom: -10px;">Upload ID Card (Non-Binusian): </p>
                </div>
                <div class="upload-label submission" style="border-radius: 10px; width: 227px; height: 38px; margin-left: 100px; padding: 0px;">
                    <label for="id_card">
                        <img src="../Assets_regist/Upload_icon.png" alt="Upload" width="50" height="50">
                        <input type="file" name="id_card" id="id_card" class="custom-file-input">
                    </label>
                </div>
            </div>
            <p class="little-note" style="font-size: 16.19px; left: 100px;">*Format file pdf, jpg, jpeg dan png</p>

            
            <div class="submit-button">
                <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


    <!-- Error Modal -->
    <div class="modal-overlay" id="modalOverlay"></div>
    <div class="error-modal" id="errorModal">
        <img id="errorImage" src="" alt="Error">
    </div>

    <script src="../js_regist/regist2.js"></script>
</body>
</html>
