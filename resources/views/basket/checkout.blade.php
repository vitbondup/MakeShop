@extends('layout.site')

@section('content')
    <h1 class="mb-4">Оформлення замовлення</h1>

    <form method="post" action="{{ route('basket.saveorder') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Им'я, Фамілія"
                   required maxlength="255" value="{{ old('name') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Електронна пошта"
                   required maxlength="255" value="{{ old('email') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Номер телефону"
                   required maxlength="255" value="{{ old('phone') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Адреса доставки"
                   required maxlength="255" value="{{ old('address') ?? '' }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment" placeholder="Коментарій"
                      maxlength="255" rows="2">{{ old('comment') ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Оформити</button>
        </div>
    </form>
@endsection
