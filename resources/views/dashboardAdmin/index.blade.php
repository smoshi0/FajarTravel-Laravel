@extends('dashboardAdmin.layouts.main')

@section('container')
    
<h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
<h2>Kamu Sebagai {{ auth()->user()->level }}</h2>


@include('dashboardAdmin.layouts.list')

<form action="/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
</form>

@endsection