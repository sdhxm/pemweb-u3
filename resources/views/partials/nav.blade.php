<nav class="nav" aria-label="Main Navigation">
    <a href="{{ route('home') }}" class="brand">
        <span class="brand-dot" aria-hidden="true"></span>
        <span>Portal Berita</span>
    </a>

    <a href="{{ route('home') }}"
       class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

    @auth
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('articles.index') }}"
           class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">Artikel</a>

        <div class="right">
            <span class="user-pill">Hi, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="right">
            <a href="{{ route('login') }}"
               class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            <a href="{{ route('register') }}"
               class="btn btn-sm {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
        </div>
    @endguest
</nav>