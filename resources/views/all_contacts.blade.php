
@extends("layout")




@section("page_content")
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <a href="{{ route('contact.delete', ['contact' => $contact->id]) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('contact.single', ['id' => $contact->id])}}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
