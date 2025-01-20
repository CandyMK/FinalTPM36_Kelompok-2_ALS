<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Team Name Field -->
        <div>
            <label for="group_name">Team Name</label>
            <input type="text" id="group_name" name="group_name" required value="{{ old('group_name') }}">
            @error('group_name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Field -->
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

</body>
</html>
