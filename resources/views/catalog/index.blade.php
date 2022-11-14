@extends('layout.site')

@section('content')
    <h1>Список категорій</h1>
    <ul>
        @foreach ($roots as $root)
            <li>
                <a href="{{ route('catalog.category', ['slug' => $root->slug]) }}">
                    {{ $root->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
