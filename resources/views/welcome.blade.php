
@extends("layout")

@section("page_title")
    Dashboardpage
@endsection

@section("page_content")

    @if($current_hour >= 0 && $current_hour <= 12)
        <p>Good morning!<p>
    @else
        <p>Good afternoon!</p>
    @endif

    @foreach($products as $product)
       <p>{{ $product->name }}</p> 
    @endforeach

    <form method="POST" action="/send-contact">

        @if($errors->any())
            <p>Greska: {{ $errors->first() }}</p>
        @endif


        {{ csrf_field() }}
        <input name="email" type="email" placeholder="Unesite vasu email adresu">
        <input name="subject" type="text" placeholder="Unesite naslov poruke">
        <textarea name="description"></textarea>
        <button>Posalji poruku</button>  
    </form>


    <p>Current hour is {{ $current_hour }}</p>
    <p>Current time is {{ $current_time }}</p>
@endsection



