<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Londrina+Solid:wght@100;300;400;900&family=Reem+Kufi:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminPanel-edit.css') }}">
    <title>Edit Team</title>
</head>
<body>
    <header>
        <img src="{{asset('assets/logo.png')}}" alt="Logo">
        <nav>
            <a href="Landing_page.html#page1">HOME</a>
            <a href="Landing_page.html#page2">CHAMPION PRIZE</a>
            <a href="Landing_page.html#page3">MENTOR & JURYS</a>
            <a href="Landing_page.html#page4">ABOUT</a>
            <a href="Landing_page.html#page5">FAQ</a>
            <a href="Landing_page.html#page6">TIMELINE</a>
            <a href="Login-Page.html" class="login-button">LOGIN</a>
        </nav>
    </header>

    <div class="form-container">
        <form id="editForm" action="{{ route('team.update', $group->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="fullname" value="{{ $group->name }}" required>
            </div>
                
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="{{ $group->email }}" required>
            </div>
                
            <div class="form-group">
                <label>WhatsApp Number:</label>
                <input type="text" name="whatsapp" value="{{ $group->whatsapp }}" required>
            </div>
                
            <div class="form-group">
                <label>LINE ID:</label>
                <input type="text" name="lineid" value="{{ $group->lineid }}">
            </div>
                
            <div class="form-group">
                <label>Github / Github ID:</label>
                <input type="text" name="github" value="{{ $group->github }}">
            </div>
                
            <div class="form-group">
                <label>Birth Place:</label>
                <input type="text" name="birthplace" value="{{ $group->birthplace }}" required>
            </div>
                
            <div class="form-group">
                <label>Birth Date:</label>
                <input type="date" name="birthdate" value="{{ $group->birthdate }}" required>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>

        <div class="profile">
            <img src="{{asset('assets/member4.png')}}" alt="Tesalonika Halim">
            <p>Tesalonika Halim</p>
        </div>
    </div>

    <script src="adminPanel-edit.js"></script>
</body>
</html>