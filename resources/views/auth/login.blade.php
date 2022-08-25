<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
    @if (session()->has('regis'))
        <div class="alert alert-success">
            {{ session()->get('regis') }}
        </div>
    @endif

    <h2>Login</h2>
    <form action="/login" method="post">
        @csrf
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="username">
        </div>
        <input type="submit">
    </form>
    <a href="/register">
        <button>Register</button>
    </a>
</body>

</html>
