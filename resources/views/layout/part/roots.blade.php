<h4>Розділи каталогу</h4>
<div id="catalog-sidebar">
    <ul>
        @foreach($items as $item)
            <li>
                <a href="{{ route('catalog.category', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                @if($item->children->count())
                    <span class="badge badge-dark float-right">
                        <i class="bi bi-plus"></i>
                    </span>
                    <ul>
                        @foreach($item->children as $child)
                            <li>
                                <a href="{{ route('catalog.category', ['slug' => $child->slug]) }}">
                                    {{ $child->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
