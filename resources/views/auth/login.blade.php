<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Londrina+Solid:wght@100;300;400;900&family=Reem+Kufi:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Login-Page.css">
    <title>Login</title>
</head>
<body>
    <header>
        <img src="assets/logo.png" alt="Logo">
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

    <div class="login-container">
        <h1>LOGIN</h1>

        <form action="userDashboard.html" method="get">
            <div class="group-container">
                <div class="input">
                    <img src="assets/group.png" alt="Group">
                    <a href="#" class="group-name">Group Name</a>
                </div>
                <input type="text" placeholder="Group Name..." required>
             </div>

            <div class="password-container">
                <div class="input">
                    <img src="assets/key.png" alt="Key">
                    <a href="#" class="password">Password</a>
                </div>
                <input type="password" placeholder="Password..." id="password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <a href="#" class="no-account">Don't have an account?</a>
        <a href="{{route('register.page1')}}">Sign Up</a>
    </div>

    <script src="login-Page.js"></script>
</body>
</html>
