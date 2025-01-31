<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/Register_page_1.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&display=swap" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <nav>
        <div class="Block">
            <a class="Nav-link" href="Landing_page.html#page1">HOME</a>
            <a class="Nav-link" href="Landing_page.html#page2">CHAMPION PRIZE</a>
            <a class="Nav-link" href="Landing_page.html#page3">MENTOR & JURYS</a>
            <a class="Nav-link" href="Landing_page.html#page4">ABOUT</a>
            <a class="Nav-link" href="Landing_page.html#page5">FAQ</a>
            <a class="Nav-link" href="Landing_page.html#page6">TIMELINE</a>
            <div class="login-block Nav-link">
                <a class="Login" href="{{route('login')}}">LOGIN</a>
            </div>
        </div>
    </nav>

    <img class="logo" src="../Assets_regist/Hackathon_logo.png" alt="Hackathon">
    <p style="position: absolute; top: 50px;left: 75px; color: #FFFF;">Hackathon</p>

    <div class="submission-container">
        <form id="registrationForm" method="POST" action="{{ route('register.page1') }}" novalidate>
            @csrf
            <div>
                <p style="margin-bottom: 10px">Nama Group: </p>
                <input type="text" id="group_name" name="group_name" class="submission" placeholder="Type your group name" value="{{ old('group_name') }}" required>
                {{-- <input type="text" class="form-control" id="group_name" name="group_name" value="{{ old('group_name') }}" required> --}}
            </div>
            <div>
                <p style="margin-top: 40px; margin-bottom: 10px">Password: </p>
                <input type="password" id="password" name="password" class="submission" placeholder="Type your password" required>
                {{-- <input type="password" class="form-control" id="password" name="password" required> --}}
            </div>
            <div>
                <p style="margin-top: 40px; margin-bottom: 10px">Confirm Password: </p>
                <input type="password" id="password_confirmation" name="password_confirmation" class="submission" placeholder="Confirm your password" required>
                {{-- <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required> --}}
            </div>
            <div class="radio-group">
                <input type="radio" id="binusian_status" class="checkbox" name="binusian_status" value="Binusian">
                <label for="binusian">Binusian</label>
                <input type="radio" id="binusian_status" class="checkbox" name="binusian_status" value="Non-Binusian">
                <label for="nonBinusian">Non-Binusian</label>
            </div>
            
            <div class="submit-button">
                <button type="submit" id="submitButton" class="btn btn-primary">Next</button>
            </div>

            
        </form>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>
    <div class="error-modal" id="errorModal">
        <img id="errorImage" src="" alt="Error">
    </div>

    <script src="../js_regist/regist1.js"></script>
    
</body>
</html>