@extends('layouts.auth')

@section('title', 'Login Form')

@section('content')
<form class="splash-container" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="card shadow">
        <div class="card-header">
            <h3 class="mb-1">Login Form</h3>
            <p>Please enter your user information to login.</p>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group">
                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="Your E-mail" autocomplete="off" value="{{ old('email') }}" @error('email') autofocus @enderror>

                @error('email')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" type="password" placeholder="Type Password" @error('password') autofocus @enderror>

                @error('password')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group pt-1">
                <button class="btn btn-block btn-primary" type="submit">Login</button>
            </div>
            {{-- <p>Already member? <a href="#" class="text-secondary">Login Here.</a></p> --}}
        </div>
    </div>
</form>
@endsection