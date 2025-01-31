<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TestHome</title>

    <link rel="stylesheet" href="Css/Landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background: rgb(118, 164, 225);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        nav a {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .container {
            padding-top: 50px;
        }

        .section {
            padding: 20px;
            min-height: 100vh;
        }
    </style>
</head>
<body>

    <nav>
        <div class="Block">
            <img class="logo" src="Assets_regist/Hackathon_logo.png" alt="Hackathon">
            <p class="hackathon-text">Hackathon</p>
            <div class="nav-links">
                <a class="Nav-link" href="#page1">HOME</a>
                <a class="Nav-link" href="#page2">CHAMPION PRIZE</a>
                <a class="Nav-link" href="#page3">MENTOR & JURYS</a>
                <a class="Nav-link" href="#page4">TIMELINE</a>
                <a class="Nav-link" href="#page5">FAQ</a>
                <a class="Nav-link" href="#page6">ABOUT</a>
            </div>
            <button class="login-block">
                <a class="Login" href="{{route('login')}}">LOGIN</a>
            </button>
        </div>
    </nav>

    {{-- <a href="{{route('login')}}" class="btn btn-success">Login</a>
    <a href="{{route('register.page1')}}" class="btn btn-success">Register</a> --}}

    {{-- <form action="{{ route('logout') }}" method="POST" class="d-flex" >
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
    </form> --}}

    <div id="page1" class="section">
        <div class="body-text">
            <h1>HACKATHON 8.0</h1>
            <p>Innovating the Future: Bridging Humanity and Technology</p>
        </div>
        <div class="picture-left">
            <img class="img-left" src="assets/Img_1.png">
        </div>
        <div class="picture-right">
            <img class="img_right" src="assets/Img_2.png" alt="">
        </div>
    </div>

    <div id="page2" class="section">
        <h1 style="position: absolute; top: 200px;left: 150px; color: #FFFF; white-space: nowrap;">CHAMPION PRIZE
        </h1>
        <p
            style="position: absolute; top: 200px;left: 700px; color: #FFFF; font-size: 34.13px; white-space: nowrap;">
            JUARA 1</p>
        <div class="first-prize">
            <div class="champion-box">
                <p
                    style="font-family: 'Londrina Solid', sans-serif; font-size: 68px; left: 85px; position: absolute; bottom: -50px; color: #2948A8;">
                    1</p>
                <img style="left: 25px ; position: absolute; width: 147.61px;" src="Assets/crown.png">
            </div>
            <img style="position: absolute; width: 86.18px; top: 177px; left: 90px;" src="Assets/trophy.png">
            <p
                style="top: 270px; position: absolute; margin: 0px 50px; justify-content: center; text-align: center; color: #2948A8; font-size: 20.48px; font-weight: 400;">
                Rp. 10.000.000 Merchandise Certificate</p>
        </div>
        <p
            style="position: absolute; top: 435px;left: 340px; color: #FFFF; font-size: 34.13px; white-space: nowrap;">
            JUARA 2</p>
        <div class="second-prize">
            <div class="champion-box">
                <p
                    style="font-family: 'Londrina Solid', sans-serif; font-size: 68px; left: 82px; position: absolute; bottom: -48px; color: #2948A8;">
                    2</p>
                <img style="left: 25px ; position: absolute; width: 147.61px;" src="Assets/crown.png">
            </div>
            <img style="position: absolute; width: 86.18px; top: 177px; left: 90px;" src="Assets/trophy.png">
            <p
                style="top: 270px; position: absolute; margin: 0px 50px; justify-content: center; text-align: center; color: #2948A8; font-size: 20.48px; font-weight: 400;">
                Rp. 5.000.000 Merchandise Certificate</p>
        </div>
        <p
            style="position: absolute; top: 435px; left: 1040px; color: #FFFF; font-size: 34.13px; white-space: nowrap;">
            JUARA 3</p>
        <div class="third-prize">
            <div class="champion-box">
                <p
                    style="font-family: 'Londrina Solid', sans-serif; font-size: 68px; left: 82px; position: absolute; bottom: -50px; color: #2948A8;">
                    3</p>
                <img style="left: 25px ; position: absolute; width: 147.61px;" src="Assets/crown.png">
            </div>
            <img style="position: absolute; width: 86.18px; top: 177px; left: 90px;" src="Assets/trophy.png">
            <p
                style="top: 270px; position: absolute; margin: 0px 50px; justify-content: center; text-align: center; color: #2948A8; font-size: 20.48px; font-weight: 400;">
                Rp. 2.500.000 Merchandise Certificate</p>
        </div>
    </div>

    <div id="page3" class="section">
        <h1 style="position: absolute; top: 200px;left: 150px; color: #FFFF; white-space: nowrap;">MEET OUR MENTORS!
        </h1>
        <div class="mentor-container">
            <img class="mentor-img" src="Assets/SILVER WOLF.jpeg">
            <img class="mentor-img" src="Assets/Gojo_mewing.jpeg">
            <img class="mentor-img" src="Assets/✦ ；  wowwzerz 🤯⁉️.jpeg">
            <img class="mentor-img" src="Assets/All_in.jpeg">
            <img class="mentor-img" src="Assets/_ (1).jpeg">
            <img class="mentor-img" src="Assets/Odd1isout.jpeg">
        </div>
    </div>

    <div id="page4" class="section">
        <h1 style="position: absolute; top: 200px;left: 150px; color: #FFFF;">TIMELINE</h1>
        <div
            style="position: absolute;width: 1113.27px;height: 0px;left: 242.74px;top: 463.39px;border: 6.5971px solid #9CD1FC;transform: rotate(-0.17deg);">
        </div>
        <div
            style="position: absolute;width: 22.27px;height: 0px;left: 840.6px;top: 444.09px;border: 5.77246px solid #9CD1FC;transform: rotate(90deg);">
        </div>
        <div
            style="position: absolute;width: 202.86px;height: 53.6px;left: 273.35px;top: 379.22px;background: #FFFFFF;border-radius: 32.9855px;display: flex; justify-content: center; align-items: center;">
            <p style="color: #2948A8;">OPEN REGISTRATION</p>
        </div>
        <div
            style="position: absolute;width: 22.27px;height: 0px;left: 364.79px;top: 444.09px;border: 5.77246px solid #9CD1FC;transform: rotate(90deg);">
        </div>
        <div
            style="position: absolute;width: 202.86px;height: 53.6px;left: 753.35px;top: 379.22px;background: #FFFFFF;border-radius: 32.9855px;display: flex; justify-content: center; align-items: center;">
            <p style="color: #2948A8;">TECHNICAL MEETING</p>
        </div>
        <div
            style="position: absolute;width: 22.27px;height: 0px;left: 1101.19px;top: 485.09px;border: 5.77246px solid #9CD1FC;transform: rotate(90deg);">
        </div>
        <div
            style="position: absolute;width: 202.86px;height: 53.6px;left: 510.35px;top: 506px;background: #FFFFFF;border-radius: 32.9855px;display: flex; justify-content: center; align-items: center;">
            <p style="color: #2948A8;">CLOSE REGISTRATION</p>
        </div>
        <div
            style="position: absolute;width: 22.27px;height: 0px;left: 597.33px;top: 485.09px;border: 5.77246px solid #9CD1FC;transform: rotate(90deg);">
        </div>
        <div
            style="position: absolute;width: 202.86px;height: 53.6px;left: 1015px;top: 506px;background: #FFFFFF;border-radius: 32.9855px;display: flex; justify-content: center; align-items: center;">
            <p style="color: #2948A8;">COMPETITION DAY</p>
        </div>
        <h1 style="position: absolute; top: 600px;left: 150px; color: #FFFF;">MEDIA PARTNER</h1>
        <div class="horizontal-scroll-container" id="scroll-container">
            <div class="scroll-content" id="scroll-content"></div>
        </div>
    </div>

    <div id="page5" class="section">
        <h1 style="position: absolute; top: 125px;left: 220px; color: #FFFF;">FAQ</h1>
        <div id="qaContainer" style="top: 195px; left: 725px;" class="faq-container"></div>
    </div>

    <div id="page6" class="section">
        <h1 style="position: absolute; top: 200px;left: 150px; color: #FFFF;">ABOUT</h1>
        <div class="about-container">
            <p style="color: #FFFF;">A hackathon is a virtual competition that lasts for 36 hours, where Tech
                Enthusiasts are challenged to solve digital problems that exist in today's era, with the output
                being an application or website.</p>
        </div>
        <div class="guide-book">
            <a class="guidelink">Guidebook</a>
        </div>
        <p
            style="position: absolute; top: 900px; left: 43px; font-size: 25px; font-family: 'Josefin Sans', sans-serif; color: #FFFF; white-space: nowrap;">
            OUR SOCIAL MEDIA</p>
        <div class="socmed-container">
            <div style="display: flex; align-items: center; gap: 20px; color: #FFFF;">
                <img style="width: 30px; height: 30px;" src="Assets/Instagram.png">
                <p>@technoscapebncc</p>
            </div>
            <div style="display: flex; align-items: center; gap: 20px; color: #FFFF;">
                <img style="width: 30px; height: 30px;" src="Assets/twitter.png">
                <p>@technoscapebncc</p>
            </div>
            <div style="display: flex; align-items: center; gap: 20px; color: #FFFF;">
                <img style="width: 30px; height: 30px;" src="Assets/linkedin.png">
                <p>technoscapebncc@gmail.com</p>
            </div>
            <div style="display: flex; align-items: center; gap: 20px; color: #FFFF;">
                <img style="width: 30px; height: 30px;" src="Assets/facebook.png">
                <p>technoscapebncc</p>
            </div>
        </div>
        <div
            style="display: flex; flex-direction: row; align-items: center; padding: 0px; gap: 69.45px; position: absolute; width: 839.9px; height: 23px; left: 22px; top: 1040px; padding: 20px">
            <p style="font-size: 23px; color: #FFFF;">Powered and Organized by BNCC</p>
            <p style="font-size: 23px; color: #FFFF;">Privacy & Policy</p>
            <p style="font-size: 23px; color: #FFFF;">Terms of Service</p>
        </div>
        <button style="position: absolute;left: 1250px; top: 1035px; padding: 1px;" class="contact-button">
            <a href="Landing_page_contactus.html">CONTACT US</a>
        </button>
    </div>

    <script src="js/js_main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


</body>
</html>
