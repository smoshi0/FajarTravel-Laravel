<h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
<h2>Kamu Sebagai {{ auth()->user()->level }}</h2>
<form action="/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>