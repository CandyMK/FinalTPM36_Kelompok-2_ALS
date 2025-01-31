{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1, h2 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .section {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST" class="d-flex">
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
    </form>

    <div class="container">
        @php
            $user = $registrations->where('id', session('user_id'))->first();
        @endphp

        @if ($user)
            <!-- Team Name -->
            <div class="section">
                <h1>Team: {{ $user->group_name }}</h1>
            </div>

            <!-- Leader Information -->
            <div class="section">
                <h2>Leader Information</h2>
                <ul>
                    <li><strong>Full Name:</strong> {{ $user->full_name }}</li>
                    <li><strong>Email:</strong> {{ $user->email }}</li>
                    <li><strong>WhatsApp:</strong> {{ $user->whatsapp }}</li>
                    <li><strong>GitHub ID:</strong> {{ $user->github_id }}</li>
                    <li><strong>Birthplace:</strong> {{ $user->birthplace }}</li>
                    <li><strong>Birthdate:</strong> {{ $user->birthdate }}</li>
                </ul>
            </div>

            <div class="mb-4">
                <h2>Uploaded Files</h2>
                <p>
                    <strong>CV:</strong>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cvModal">View CV</button>
                </p>
                <p>
                    <strong>ID Card:</strong>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#idCardModal">View ID Card</button>
                </p>
            </div>

            <!-- CV Modal -->
            <div class="modal fade" id="cvModal" tabindex="-1" aria-labelledby="cvModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cvModalLabel">CV Viewer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe src="{{ asset('storage/' . $user->cv) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ID Card Modal -->
            <div class="modal fade" id="idCardModal" tabindex="-1" aria-labelledby="idCardModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="idCardModalLabel">ID Card Viewer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('storage/' . $user->id_card) }}" alt="ID Card" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>User data not found.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 --}}






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Londrina+Solid:wght@100;300;400;900&family=Reem+Kufi:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Css/userDashboard.css')}}">
    <title>User Dashboard</title>
</head>
<body>
    <div class="dashboard">
        <header>
            <img src="{{asset('assets/logo.png')}}" alt="Logo">
            <nav>
                <a href="{{route('home')}}">HOME</a>
                <a href="{{route('home')}}">CHAMPION PRIZE</a>
                <a href="{{route('home')}}">MENTOR & JURYS</a>
                <a href="{{route('home')}}">ABOUT</a>
                <a href="{{route('home')}}">FAQ</a>
                <a href="{{route('home')}}">TIMELINE</a>
                <a href="{{route('login')}}" class="login-button">LOGIN</a>
              </nav>
        </header>

        <main>
            @if ($user)
                <div class="team-info">
                    <h2>{{ $user->group_name }} Profile</h2>
                    <h3>Leader</h3>
                    <p>Full Name: {{ $user->full_name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>WhatsApp Number: {{ $user->whatsapp }}</p>
                    <p>LINE ID: {{ $user->line_id }}</p>
                    <p>Github / Github ID: {{ $user->github_id }}</p>
                    <p>Birth Place: {{ $user->birthplace }}</p>
                    <p>Birth Date: {{ $user->birthdate }}</p>
                </div>

                <div class="document">
                    <p>View CV:</p>
                    <button id="view-cv">View CV</button>
                    <p>View Flazz Card (Binusian):</p>
                    <button id="view-flazz">View Flazz Card</button>
                    <p>View ID Card (Non-Binusian):</p>
                    <button id="view-id">View ID Card</button>
                </div>

                <div class="contact">
                    <p>Contact Person</p>
                    <p>IG: @devinac</p>
                    <p>LINE: @devinac</p>
                    <p>Number: 081278348654</p>
                </div>
            @else
                <p>User profile not found.</p>
            @endif
        </main>

        <div class="timeline-container">
            <section class="timeline">
                <h3>TIMELINE</h3>
                <div class="timeline-bar">
                    <div class="timeline-item up">
                        <p>Open Registration</p>
                    </div>
                    <div class="timeline-item down">
                        <p>Close Registration</p>
                    </div>
                    <div class="timeline-item up">
                        <p>Technical Meeting</p>
                    </div>
                    <div class="timeline-item down">
                        <p>Competition Day</p>
                    </div>
                </div>
            </section>

                <form action="{{ route('logout') }}" method="POST" class="d-flex" >
            @csrf
            <button class="btn btn-danger" type="submit">LOGOUT</button>
        </form>

            {{-- <form action="{{ route('logout') }}" method="POST" class="d-flex" >
                @csrf
                <button type="submit" class="logout-button" id="logout-btn">LOGOUT</button>
            </form> --}}


            <div class="overlay" id="overlay"></div>
            <div class="popup" id="popup">
                <img src="assets/confirmation.png" class="popup-logo">
                <h2>Are you sure you want to log out?</h2>
                <div class="actions">
                    <button type="button" id="confirm-btn">
                        Yes <img src="assets/confirm.png" alt="Confirm">
                    </button>
                    <button type="button" id="cancel-btn">
                        No <img src="assets/cancel.png" alt="Cancel">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src=""></script>
</body>
</html>
