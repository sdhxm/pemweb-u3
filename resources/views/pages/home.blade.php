@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero">
    <span class="hero-badge">Edisi Terbaru</span>
    <h2>Portal Berita Sederhana</h2>
    <p>
        Selamat datang di portal berita sederhana berbasis Laravel.
        Berita di bawah ini diambil dari tabel <code>articles</code>.
    </p>
    @guest
        <p>
            Kamu belum login. Untuk mengelola berita, silakan
            <a href="{{ route('login') }}">Login</a> atau
            <a href="{{ route('register') }}">Register</a>.
        </p>
    @endguest
    @auth
        <p>
            Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>.
            Kamu dapat menambah berita di menu
            <a href="{{ route('articles.index') }}">Artikel</a>.
        </p>
    @endauth
</section>

<section style="margin-top: 2rem;">
    <div class="section-head">
        <h3>Berita Terbaru</h3>
        @auth
            <a href="{{ route('articles.create') }}" class="btn btn-sm">+ Tulis Berita</a>
        @endauth
    </div>

    @if ($articles->isNotEmpty())
        <div class="row">
            @foreach ($articles as $article)
                <article class="article-card">
                    <a href="{{ route('articles.show', $article) }}">
                        <img src="{{ $article->image_url }}"
                             alt="Gambar {{ $article->title }}"
                             class="article-thumb">
                    </a>
                    <div class="article-body">
                        <div class="article-meta">
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                            <span>&bull;</span>
                            <span>oleh <strong>{{ $article->user->name }}</strong></span>
                        </div>
                        <h4 class="article-title">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h4>
                        <p class="article-excerpt">
                            {{ \Illuminate\Support\Str::limit($article->body, 140) }}
                        </p>
                        <a href="{{ route('articles.show', $article) }}" class="read-more">
                            Baca selengkapnya &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="card">
            <p class="muted" style="margin: 0;">
                Belum ada berita yang tersedia.
                @auth
                    Silakan buat berita baru di menu
                    <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
                @endauth
            </p>
        </div>
    @endif
</section>
@endsection