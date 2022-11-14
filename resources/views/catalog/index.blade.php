@extends('layout.site')

@section('content')
    <h1>Каталог товарів</h1>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ducimus, eligendi
        exercitationem expedita, iure iusto laborum magnam qui quidem repellat similique
        tempora tempore ullam! Deserunt doloremque impedit quis repudiandae voluptas?
    </p>

    <h2>Розділи каталога</h2>
    <div class="row">
        @foreach ($roots as $root)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $root->name }}</h4>
                    </div>
                    <div class="card-body p-0">
                        <img src="https://via.placeholder.com/400x120" alt="" class="img-fluid">
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('catalog.category', ['slug' => $root->slug]) }}"
                           class="btn btn-dark">Перейти в разділ</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
