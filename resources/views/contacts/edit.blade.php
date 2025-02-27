@extends("layout")

@section("page_content")

    <form method="POST" action="{{ route('contact.save', ['id' => $contact->id]) }}">

    {{ csrf_field() }}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input value="{{ $contact->email }}" type="email" name="email" class="form-control" id="exampleInputEmail1">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Subject</label>
        <input value="{{ $contact->subject }}" type="text" name="subject" class="form-control" id="exampleInputEmail1">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Message</label>
        <input value="{{ $contact->message }}" type="text" name="message" class="form-control" id="exampleInputEmail1">
    </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection