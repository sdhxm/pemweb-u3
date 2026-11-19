@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="card auth-card">
    <h2 style="margin-bottom: 0.25rem;">Login</h2>
    <p class="muted" style="margin-top: 0;">Masuk untuk mengelola artikel kamu.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}" novalidate>
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">

        <label class="checkbox-label">
            <input type="checkbox" name="remember"> Remember me
        </label>

        <div class="form-actions">
            <button type="submit" style="width: 100%;">Masuk</button>
        </div>
    </form>

    <p class="muted" style="margin: 1.25rem 0 0; text-align: center;">
        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
    </p>
</section>
@endsection