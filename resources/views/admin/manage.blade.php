@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('success_message'))
    <div class="alert alert-success mb-2 text-center">
        {{ session()->get('success_message') }}
    </div>
    @endif
    @if(session()->has('error_message'))
    <div class="alert alert-danger mb-2 text-center">
        {{ session()->get('error_message') }}
    </div>
    @endif
    <div class="col-md-8 mx-auto">
        <form method="post" action="/s/delete">
            <div class="d-flex flex-row justify-content-between mb-3">
                <a class="btn btn-primary" href="/email/sendall">Send to all subscribers</a>
                <input class="btn btn-danger" type="submit" value="Mass delete">
            </div>
            @csrf
            @method('DELETE')
            <subscribers-list :subscribers-collection="{{json_encode($subscribers)}}"></subscribers-list>
        </form>
        <div class="pt-3 d-flex justify-content-center">{{$subscribers->links()}}</div>
    </div>
</div>
@endsection
