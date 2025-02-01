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
    <link rel="stylesheet" href="{{ asset('css/adminPanel-show.css') }}">
    <title>Admin Panel</title>
</head>

<body>
    <div class="admin-panel">
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

        <main class="teams">
            <div class="filter-options">
                <div class="input-container">
                    <img src="../assets/inputTeamName.png" class="input-icon">
                    <form action="{{ url()->current() }}" method="GET">
                        <input type="text" id="team-search" name="search" placeholder="Input Team Name"
                            value="{{ request()->query('search') }}" onkeydown="return event.key !== 'Enter';">
                        <img src="../assets/search.png" class="search-icon">
                    </form>
                </div>

                <div class="sort-container">
                    <button id="sort-button">
                        Sort by <img src="../assets/sort.png" alt="Sort">
                    </button>

                    <div id="sort-options" class="hidden">
                        @foreach ($listOfSortOptions as $option)
                        <a href="/admin/dashboard?column={{ $option['column'] }}&sortBy={{ $option['sortBy'] }}">
                            <button class="sort-option">{{ $option['name'] }}</button>
                        </a>

                        @endforeach

                    </div>
                </div>
            </div>

            @foreach ($listOfGroups as $group)
            <div class="team">
                <h2>{{ $group->name}}</h2>
                <div class="actions">
                    <a href="/admin/team/{{ $group->id }}">
                        <button class="view">View Team Details</button>
                    </a>
                    <a href="/admin/team/{{ $group->id }}?edit=1">
                        <button class="edit">Edit Team</button>
                    </a>
                    <form action="{{ route('admin.deleteGroup', ['id' => $group->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Delete Team</button>
                    </form>
                </div>
            </div>
            @endforeach

        </main>
    </div>

    <script src="../Js/adminPanel-show.js">

    </script>
</body>

</html>
