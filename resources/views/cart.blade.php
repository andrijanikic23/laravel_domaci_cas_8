@extends("layout")


@section("page_content")

    @foreach($products as $product)
        @foreach($cart as $item)
            @if($item['productId'] == $product->id)
                <p>{{ $product->name }}</p>
                <p>{{ $item["quantity"] }}</p>
                <p>{{ $product->price }}</p>
                <p>{{ $item["quantity"] * $product->price }}</p>
            @endif
        @endforeach

    @endforeach

@endsection
