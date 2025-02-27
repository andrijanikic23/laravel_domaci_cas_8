@extends("layout")

@section("page_content")

    <form method="POST" action="/send-product">
        {{ csrf_field() }}
        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            @endif
        </div>
       
        <div>
            <input name="name" type="text" placeholder="enter the name" value="{{ old('name') }}" required>
        </div>

        <div>
            <input name="description" type="text" placeholder="about product" value="{{ old('description') }}">
        </div>
        
        <div>
            <input name="amount" type="number" placeholder="amount" value="{{ old('amount') }}">
        </div>

        <div>
            <input name="price" type="number" placeholder="price" value="{{ old('price') }}">
        </div>
    
        <button>Save product</button>
    </form>

@endsection