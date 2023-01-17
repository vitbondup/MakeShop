@extends('layout.admin')

@section('content')
    <h1>Створення нової категорії</h1>
    <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Найменування"
                   required maxlength="100" value="{{ old('name') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="slug" placeholder="ЛЗУ (на англ.)"
                   required maxlength="100" value="{{ old('slug') ?? '' }}">
        </div>
        <div class="form-group">
            <select name="parent_id" class="form-control" title="Батьківська категорія">
                <option value="0">Головна категорія</option>
                @if (count($parents))
                    @include('admin.category.part.branch', ['items' => $parents, 'level' => -1])
                @endif
            </select>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" placeholder="Короткий опис"
                      maxlength="200" rows="3">{{ old('content') ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </div>
    </form>
@endsection
