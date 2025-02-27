@extends("layout")




@section("page_content")
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }} RSD</td>
                    <td>
                        <a href="/admin/delete-product/{{ $product->id }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('product.single', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
