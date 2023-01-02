@extends('layout.site')

@section('content')
    <h1>Ваш кошик</h1>
    @if (count($products))
        @php
            $basketCost = 0;
        @endphp
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Найменування</th>
                <th>Ціна</th>
                <th>Кількість</th>
                <th>Вартість</th>
            </tr>
            @foreach($products as $product)
                @php
                    $itemPrice = $product->price;
                    $itemQuantity =  $product->pivot->quantity;
                    $itemCost = $itemPrice * $itemQuantity;
                    $basketCost = $basketCost + $itemCost;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('catalog.product', [$product->slug]) }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ number_format($itemPrice, 2, '.', '') }}</td>
                    <td>
                        <i class="fas fa-minus-square"></i>
                        <span class="mx-1">{{ $itemQuantity }}</span>
                        <i class="fas fa-plus-square"></i>
                    </td>
                    <td>{{ number_format($itemCost, 2, '.', '') }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Разом</th>
                <th>{{ number_format($basketCost, 2, '.', '') }}</th>
            </tr>
        </table>
    @else
        <p>Ваш кошик пустий</p>
    @endif
@endsection
