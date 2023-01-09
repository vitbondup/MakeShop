@extends('layout.admin')

@section('content')
    <h1>Панель управління</h1>
    <p>Привіт, {{ auth()->user()->name }}</p>
    <p>Це панель управління для адміністратора интернет-магазину.</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Вийти</button>
    </form>
@endsection
