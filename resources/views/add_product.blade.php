@extends("layout")

@section("page_content")

    <form method="POST" action="{{ route('product.send') }}">
        {{ csrf_field() }}
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
        </div>

        <div>
            <input name="name" type="text" placeholder="Enter the name" value="{{ old('name') }}" required>
        </div>

        <div>
            <input name="description" type="text" placeholder="About product" value="{{ old('description') }}">
        </div>

        <div>
            <input name="amount" type="number" placeholder="Amount" value="{{ old('amount') }}">
        </div>

        <div>
            <input name="price" type="number" placeholder="Price" value="{{ old('price') }}">
        </div>

        <button>Save product</button>
    </form>

@endsection
