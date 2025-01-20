<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TestHome</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



</head>
<body>

    
    <a href="{{route('login')}}" class="btn btn-success">Login</a>
    <a href="{{route('register.page1')}}" class="btn btn-success">Register</a>

    <form action="{{ route('logout') }}" method="POST" class="d-flex" >
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
    </form>

    
</body>
</html>