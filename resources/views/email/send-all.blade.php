@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write email to all subscribers</div>
                <div class="card-body">
                    <form method="POST" action="/email/sendall">
                        @csrf
                        <div class="col mb-3">
                            <label for="subject" class="col-form-label">Subject</label>
                            <div class="w-100">
                                <input id="subject" type="text" class="form-control" name="subject" required  autofocus>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="body" class="col-form-label">Main text</label>
                            <div class="w-100">
                                <textarea id="body" type="text" class="form-control" style="min-height: 300px;" name="body" required  autofocus></textarea>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection