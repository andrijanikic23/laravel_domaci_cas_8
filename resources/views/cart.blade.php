@extends("layout")


@section("page_content")

    @foreach($cart as $product)
        <p>{{ $product["productName"] }}</p>
        <p>{{ $product["quantity"] }}</p>
    @endforeach

@endsection
