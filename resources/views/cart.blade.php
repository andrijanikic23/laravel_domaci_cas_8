@extends("layout")


@section("page_content")

    @foreach($combinedItems as $item)
        <p>{{ $item["name"] }}</p>
        <p>{{ $item["quantity"] }}</p>
        <p>{{ $item["price"] }}</p>
        <p>{{ $item["total"] }}</p>
    @endforeach

@endsection
