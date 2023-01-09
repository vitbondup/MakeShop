@extends('layout.site')

@section('content')
    <h1>Особистий кабінет</h1>
    <p>Ласкаво просимо, {{ auth()->user()->name }}</p>
    <p>Це особистий кабінет постійного покупця нашого інтернет магазину.</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Вийти</button>
    </form>
@endsection
