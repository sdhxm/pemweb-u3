@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="card" style="margin-bottom: 1.5rem;">
    <h2 style="margin-bottom: 0.35rem;">Dashboard</h2>
    <p style="margin: 0 0 0.25rem;">Selamat datang, <strong>{{ $user->name }}</strong></p>
    <p class="muted" style="margin: 0;">Ini adalah ringkasan singkat aktivitas artikel di aplikasi kamu.</p>
</section>

<section class="stats-grid" style="margin-bottom: 1.5rem;">
    <div class="stat-card">
        <div class="stat-label">Total Artikel</div>
        <div class="stat-value">{{ $totalArticles }}</div>
        <p class="muted" style="margin: 0;">Jumlah seluruh artikel yang ada di sistem.</p>
    </div>

    <div class="stat-card">
        <div class="stat-label">Artikel Kamu</div>
        <div class="stat-value">{{ $myArticles }}</div>
        <p class="muted" style="margin: 0;">Artikel yang dibuat oleh akun kamu.</p>
    </div>

    <div class="stat-card">
        <div class="stat-label">Aksi Cepat</div>
        <ul class="clean-list">
            <li><a href="{{ route('articles.create') }}">+ Tambah Artikel Baru</a></li>
            <li><a href="{{ route('articles.index') }}">Lihat Semua Artikel</a></li>
            <li><a href="{{ route('home') }}">Lihat Halaman Home</a></li>
        </ul>
    </div>
</section>

<section class="card" style="margin-bottom: 1.5rem;">
    <div class="section-head">
        <h3>Artikel Terbaru</h3>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary btn-sm">Semua Artikel</a>
    </div>

    @if ($latestArticles->isNotEmpty())
        <div class="row">
            @foreach ($latestArticles as $article)
                <article class="article-card">
                    <a href="{{ route('articles.show', $article) }}">
                        <img src="{{ $article->image_url }}"
                             alt="Thumbnail {{ $article->title }}"
                             class="article-thumb">
                    </a>
                    <div class="article-body">
                        <div class="article-meta">
                            <span>oleh {{ $article->user->name }}</span>
                            <span>&bull;</span>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                        <h4 class="article-title">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h4>
                        <p class="article-excerpt">
                            {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                        </p>
                        <a href="{{ route('articles.show', $article) }}" class="read-more">
                            Buka artikel &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="muted" style="margin: 0;">Belum ada artikel yang bisa ditampilkan.</p>
    @endif
</section>

<section class="card">
    <h3>Info Akun</h3>
    <ul class="clean-list">
        <li><strong>Nama:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>
    <p class="muted" style="margin: 0.85rem 0 0;">
        Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.
    </p>
</section>
@endsection