@extends('layouts.home')

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
    <h1 class="text-center">Welcome to our beautiful site!</h1>
    <form method="POST" action="/s/create" class="d-flex flex-column">
        @csrf
        <h2 class="text-center">Subscribe to our email updates:</h2>
        <div class="col my-3">
            <input class="email-input px-4" style="width:100%;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your email here" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="d-flex aligtn-items-center justify-content-center mb-2">
            <label class="subscribe-label pr-3"><b>Choose your gender:</b></label>
            <label class="pr-2" for="male">Male</label>
            <input class="pr-2" type="radio" id="male" name="gender" value="male">
            <label class="pr-2" for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female">
        </div>

        <div class="d-flex aligtn-items-center justify-content-center mb-3">
            <label class="subscribe-label" for="birthday"><b>Birthday:</b></label>
            <input class="p-2 rounded-2" type="date" id="birthday" name="birthday" max="<?= date('Y-m-d'); ?>">
        </div>
        <input class="subscribe-btn" type="submit" value="Subscribe">
    </form>
</div>
@endsection