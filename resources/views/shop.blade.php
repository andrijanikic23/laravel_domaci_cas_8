@extends ("layout")

@section("page_content")

    @foreach($products as $product)
        @if ($product == "iPhone 14" || $product == "iPhone 13 pro")
            <p>{{ $product }} - SUPER DISCOUNT</p>
        @else
            <p>{{ $product }}</p>
        @endif
    @endforeach

@endsection