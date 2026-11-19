@extends('layouts.app')

@section('title', $article->title)

@section('content')
<article class="card" style="max-width: 860px; margin: 0 auto;">
    <div class="article-meta" style="margin-bottom: 0.6rem;">
        <span>Dipublikasikan pada <strong>{{ $article->created_at->format('d M Y') }}</strong></span>
        <span>&bull;</span>
        <span>oleh <strong>{{ $article->user->name }}</strong></span>
    </div>

    <h2 style="font-size: 1.75rem; line-height: 1.3; margin-bottom: 0.5rem;">{{ $article->title }}</h2>

    <img src="{{ $article->image_url }}"
         alt="Gambar untuk {{ $article->title }}"
         class="detail-cover">

    <div class="detail-body">
        {!! nl2br(e($article->body)) !!}
    </div>

    <div class="detail-footer">
        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="{{ route('home') }}">&larr; Kembali ke Home</a>
            <a href="{{ route('articles.index') }}">Lihat semua artikel</a>
        </div>

        @auth
            @if ($article->user_id === auth()->id())
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary btn-sm">Edit Artikel</a>
            @endif
        @endauth
    </div>
</article>
@endsection