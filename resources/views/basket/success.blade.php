@extends('layout.site')

@section('content')
    <h1>Замовлення додано</h1>

    <p>Ваше замовлення успішно було розміщено. Наш менеджер скоро зв'яжеться с Вами для уточнення деталей.</p>

    <h2>Ваше замовлення</h2>
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>Найменування</th>
            <th>Ціна</th>
            <th>Кількість</th>
            <th>Вартість</th>
        </tr>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price, 2, '.', '') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->cost, 2, '.', '') }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="4" class="text-right">Разом</th>
            <th>{{ number_format($order->amount, 2, '.', '') }}</th>
        </tr>
    </table>

    <h2>Ваші дані</h2>
    <p>Им'я, фамілія: {{ $order->name }}</p>
    <p>Адреса пошти: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
    <p>Номер телефону: {{ $order->phone }}</p>
    <p>Адреса доставки: {{ $order->address }}</p>
    @isset ($order->comment)
        <p>Коментарій: {{ $order->comment }}</p>
    @endisset
@endsection
