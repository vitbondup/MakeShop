@extends('layout.admin')

@section('content')
    <h1>Усі категорії</h1>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Найменування</th>
            <th width="65%">Опис</th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @include('admin.category.part.tree', ['items' => $roots, 'level' => -1])
    </table>
@endsection
