@extends('layout.admin')

@section('content')
    <h1>Перегляд категорії</h1>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Назва:</strong> {{ $category->name }}</p>
            <p><strong>ЛЗУ (англ):</strong> {{ $category->slug }}</p>
            <p><strong>Короткий опис</strong></p>
            @isset($category->content)
                <p>{{ $category->content }}</p>
            @else
                <p>Опис відсутній</p>
            @endisset
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/600x200" alt="" class="img-fluid">
        </div>
    </div>
    @if ($category->children->count())
        <p><strong>Дочерні категорії</strong></p>
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th width="45%">Найменування</th>
                <th width="45%">ЛЗУ (англ)</th>
                <th><i class="fas fa-edit"></i></th>
                <th><i class="fas fa-trash-alt"></i></th>
            </tr>
            @foreach ($category->children as $child)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('admin.category.show', ['category' => $child->id]) }}">
                            {{ $child->name }}
                        </a>
                    </td>
                    <td>{{ $child->slug }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', ['category' => $child->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.category.destroy', ['category' => $child->id]) }}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Немає дочерніх категорій</p>
    @endif
    <form method="post"
          action="{{ route('admin.category.destroy', ['category' => $category->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            Видалити категорію
        </button>
    </form>
@endsection
