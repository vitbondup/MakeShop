<div class="col-md-6 mb-4">
    <div class="card">
        <div class="card-header">
            <h4>Товар: {{ $product->name }}</h4>
        </div>
        <div class="card-body p-0">
            <img src="https://via.placeholder.com/400x120" alt="" class="img-fluid">
        </div>
        <div class="card-footer">
            <!-- Форма додавання товару у кошик -->
            <form action="{{ route('basket.add', ['id' => $product->id]) }}"
                  method="post" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">Додати у кошик</button>
            </form>
            <a href="{{ route('catalog.product', ['slug' => $product->slug]) }}"
               class="btn btn-dark">Перейти до товару</a>
        </div>
    </div>
</div>
