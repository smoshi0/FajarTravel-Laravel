@if(session()->has('regis'))
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
        <input type="text" name="password" id="username">
    </div>
    <input type="submit">
</form>