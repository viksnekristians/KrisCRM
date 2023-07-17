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
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <h2 class="mb-3">Latest subscribers:</h2>
                    <div class="d-flex flex-column algn-items-left mb-5">
                        @for ($i=0; $i<3; $i++) 
                        @isset($subscribers[$i])
                        <a class="link-black mb-2" href="/s/{{$subscribers[$i]->id}}">{{$subscribers[$i]->email}}</a>
                        @endisset
                        @endfor
                    </div>
                    <h2 class="mb-1">Total subscriber count:</h2>
                    <div class="subscriber-count">
                        {{$subscribers->count()}}
                    </div>
                    <h2 class="mb-1">Average subscriber age:</h2>
                    <div class="subscriber-count">
                        {{$avgAge}}
                    </div>

                </div>
            </div>
    </div>
</div>

@endsection