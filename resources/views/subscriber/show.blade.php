@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 mx-auto">
        <div class="card bg-white">
            <div class="card-body">
                <div class="h3">{{$subscriber->email}}</div>
                <div>{{$subscriber->gender}}</div>
                <div>{{$subscriber->birthday}}</div>
                <a href="/email/send/{{$subscriber->id}}">Send email</a>
                <form method="post" action="/s/{{$subscriber->id}}/delete" class="inline">
                    @csrf
                    <button class="btn btn-outline-danger mt-2" type="submit" name="submit_param" value="submit_value">
                        Delete
                    </button>
                </form>
            </div>
        </div>             
    </div>
</div>
@endsection
