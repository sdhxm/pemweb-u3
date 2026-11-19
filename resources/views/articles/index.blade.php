@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<section class="card">
    <div class="section-head">
        <div>
            <h2 style="margin-bottom: 0.2rem;">Daftar Artikel</h2>
            <p class="muted" style="margin: 0;">Kelola dan telusuri seluruh artikel yang tersedia.</p>
        </div>
        <a href="{{ route('articles.create') }}" class="btn">+ Artikel Baru</a>
    </div>

    @if ($articles->isNotEmpty())
        <div class="article-list">
            @foreach ($articles as $article)
                <div class="article-row">
                    <div>
                        <a href="{{ route('articles.show', $article) }}" class="article-row-title">
                            {{ $article->title }}
                        </a>
                        <span class="muted">
                            oleh <strong>{{ $article->user->name }}</strong> &bull; {{ $article->created_at->format('d M Y') }}
                        </span>
                    </div>

                    @if ($article->user_id === auth()->id())
                        <div class="article-actions">
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form action="{{ route('articles.destroy', $article) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        {{ $articles->links('pagination::default') }}
    @else
        <p class="muted" style="margin: 0;">Belum ada artikel.</p>
    @endif
</section>
@endsection