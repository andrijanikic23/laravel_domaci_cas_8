@extends("layout")

@section("page_content")
    <form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="mb-3 form-check">
        <label for="exampleInputPassword1" class="form-label">Message</label>
        <input type="text" name="message" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45298.3957507869!2d20.448219687813324!3d44.79813702249334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a700ca7258e8f%3A0xbe11391a6fc0344c!2z0KXRgNCw0Lwg0KHQstC10YLQvtCzINCh0LDQstC1!5e0!3m2!1ssr!2srs!4v1739958566907!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


@endsection