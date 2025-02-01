<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Londrina+Solid:wght@100;300;400;900&family=Reem+Kufi:wght@400..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adminPanel-view.css') }}">
    <title>Team Details</title>
</head>

<body>
    <div class="team-details-container">
        <header>
            <img src="../assets/logo.png" alt="Logo">
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

        <main>
            <h1>{{ $group->name}}</h1>
            @if (session('status') == 'Edit')
            <p class="subtitle">Please select one of the members</p>
            @else
            <p class="subtitle">Meet the Team</p>
            @endif

            <div class="team-members">
                @foreach ($listOfTeams as $index => $member)
                <div class="member">

                    @if (session('status') == 'Edit')
                    <a href="{{ url("/admin/edit-team/{$member->id}") }}">
                        @else
                        <span>
                            @endif
                            <img src="{{ asset('assets/member' . ($index + 1) . '.png') }}" alt="{{ $member->name }}">
                            @if (session('status') == 'Edit')
                    </a>
                    @else
                    </span>
                    @endif
                    <p>{{ $index + 1 }}.
                        @if ($index == 0) <strong>Leader:</strong> @endif
                        {{ $member->name }}
                    </p>
                </div>
                @endforeach

        </main>

        <a href="adminPanel-show.html">
            <a href="/admin/dashboard">
                <button class="back-button">BACK</button>
            </a>
        </a>
    </div>
</body>

</html>