@extends("layout")

@section("page_content")

    <p>{{ $product->name }}</p>
    <p>{{ $product->description }}</p>
    <p>{{ $product->amount }}</p>
    <p>{{ $product->price }}</p>


    <form method="POST" action="{{ route('cart.add') }}">
        {{ csrf_field() }}
        <input name="id" type="hidden" value="{{ $product->id }}">
        <input name="quantity" type="number" placeholder="Enter desired quantity">
        <button>Add to cart</button>
    </form>

@endsection
