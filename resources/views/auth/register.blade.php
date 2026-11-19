@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="card auth-card">
    <h2 style="margin-bottom: 0.25rem;">Register</h2>
    <p class="muted" style="margin-top: 0;">Buat akun baru untuk mulai menulis berita.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}" novalidate>
        @csrf

        <label for="name">Nama</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">

        <label for="password_confirmation">Ulangi Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">

        <div class="form-actions">
            <button type="submit" style="width: 100%;">Daftar</button>
        </div>
    </form>

    <p class="muted" style="margin: 1.25rem 0 0; text-align: center;">
        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </p>
</section>
@endsection