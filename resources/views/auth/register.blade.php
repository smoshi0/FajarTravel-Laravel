<h2>Register Form</h2>
<form action="/register" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <input type="hidden" value="user" name="level" id="level">
    <input type="submit">
</form>
<a href="/login">
    <button>
        Login Page
    </button>
</a>