<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita') — Portal Berita</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f4f6fb;
            --surface: #ffffff;
            --surface-soft: #f8fafc;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --accent: #0f766e;
            --accent-hover: #115e59;
            --accent-soft: #f0fdfa;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-soft: #eff6ff;
            --danger: #dc2626;
            --danger-soft: #fef2f2;
            --success: #15803d;
            --success-soft: #f0fdf4;
            --radius: 16px;
            --radius-sm: 10px;
            --shadow-xs: 0 1px 2px rgba(15, 23, 42, 0.04);
            --shadow-sm: 0 4px 14px -2px rgba(15, 23, 42, 0.06);
            --shadow-md: 0 16px 32px -8px rgba(15, 23, 42, 0.1);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 0;
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.15s ease;
        }
        a:hover { color: var(--accent-hover); }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Navbar */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 40;
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }

        .nav {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0.85rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            flex-wrap: wrap;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            font-weight: 800;
            font-size: 1.05rem;
            color: var(--text) !important;
            background: transparent !important;
            margin-right: 0.75rem;
            padding: 0.35rem 0.5rem 0.35rem 0 !important;
        }

        .brand-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: linear-gradient(135deg, #0d9488, #2563eb);
            box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.15);
        }

        .nav a:not(.brand) {
            color: var(--muted);
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.48rem 0.85rem;
            border-radius: var(--radius-sm);
            transition: all 0.15s ease;
        }

        .nav a:not(.brand):hover {
            color: var(--text);
            background: #f1f5f9;
        }

        .nav a.active {
            color: var(--accent) !important;
            background: var(--accent-soft) !important;
        }

        .nav .right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            flex-wrap: wrap;
        }

        .user-pill {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text);
            background: var(--surface-soft);
            border: 1px solid var(--border);
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
        }

        .inline { display: inline; }

        /* Main container */
        main {
            max-width: 1140px;
            margin: 2rem auto 3.5rem;
            padding: 0 1.25rem;
        }

        /* Headings & text */
        h1, h2, h3, h4 {
            margin-top: 0;
            letter-spacing: -0.02em;
            color: var(--text);
        }

        .section-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 1.25rem;
        }

        .section-head h2, .section-head h3 {
            margin-bottom: 0;
        }

        .muted {
            color: var(--muted);
            font-size: 0.9rem;
        }

        /* Surface Card */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.6rem;
            box-shadow: var(--shadow-xs);
        }

        /* Hero Banner */
        .hero {
            background: linear-gradient(125deg, #0f172a 0%, #134e4a 58%, #0f766e 100%);
            color: #ffffff;
            border-radius: 20px;
            padding: 2.25rem;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .hero-badge {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            background: rgba(255, 255, 255, 0.14);
            color: #ccfbf1;
            padding: 0.3rem 0.75rem;
            border-radius: 999px;
            margin-bottom: 0.85rem;
        }

        .hero h2 {
            color: #ffffff;
            font-size: 1.85rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .hero p {
            color: #e2e8f0;
            max-width: 680px;
            margin: 0 0 1rem;
        }

        .hero p:last-child { margin-bottom: 0; }

        .hero a {
            color: #ffffff;
            font-weight: 700;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .hero code {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            padding: 0.15rem 0.45rem;
            border-radius: 6px;
            font-size: 0.85em;
        }

        /* Grid & Article Cards */
        .row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
            gap: 1.35rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.25rem;
        }

        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.4rem 1.5rem;
            box-shadow: var(--shadow-xs);
        }

        .stat-label {
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--muted);
            margin-bottom: 0.4rem;
        }

        .stat-value {
            font-size: 2.15rem;
            font-weight: 800;
            line-height: 1.15;
            color: var(--text);
            margin-bottom: 0.35rem;
        }

        .article-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-xs);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: #cbd5e1;
        }

        .article-thumb {
            width: 100%;
            aspect-ratio: 16 / 10;
            object-fit: cover;
            background: #e2e8f0;
        }

        .article-body {
            padding: 1.2rem 1.3rem 1.35rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .article-meta {
            font-size: 0.8rem;
            color: var(--muted);
            margin-bottom: 0.45rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.35rem;
            align-items: center;
        }

        .article-title {
            font-size: 1.08rem;
            font-weight: 700;
            line-height: 1.4;
            margin: 0 0 0.55rem;
        }

        .article-title a {
            color: var(--text);
        }
        .article-title a:hover {
            color: var(--accent);
        }

        .article-excerpt {
            color: var(--muted);
            font-size: 0.9rem;
            margin: 0 0 1rem;
            flex: 1;
        }

        .read-more {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--accent);
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Compact list / table for Articles Index */
        .article-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 0.5rem;
        }

        .article-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 1.15rem;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--surface-soft);
            transition: background 0.15s ease, border-color 0.15s ease;
        }

        .article-row:hover {
            background: #ffffff;
            border-color: #cbd5e1;
        }

        .article-row-title {
            font-weight: 700;
            font-size: 1rem;
            color: var(--text);
            display: block;
            margin-bottom: 0.2rem;
        }

        .article-row-title:hover { color: var(--accent); }

        .article-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-shrink: 0;
        }

        /* Buttons */
        button, .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            font-family: inherit;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.55rem 1.05rem;
            border-radius: var(--radius-sm);
            border: 1px solid transparent;
            background: var(--accent);
            color: #ffffff;
            cursor: pointer;
            transition: all 0.15s ease;
            line-height: 1.2;
        }

        button:hover, .btn:hover {
            background: var(--accent-hover);
            color: #ffffff;
        }

        .btn-secondary {
            background: #ffffff;
            color: var(--text);
            border-color: var(--border);
        }
        .btn-secondary:hover {
            background: #f8fafc;
            color: var(--text);
            border-color: #cbd5e1;
        }

        .btn-danger {
            background: var(--danger-soft);
            color: var(--danger);
            border-color: #fecaca;
        }
        .btn-danger:hover {
            background: var(--danger);
            color: #ffffff;
            border-color: var(--danger);
        }

        .btn-sm {
            padding: 0.4rem 0.75rem;
            font-size: 0.8rem;
        }

        .nav button[type="submit"] {
            background: #ffffff;
            color: var(--text);
            border: 1px solid var(--border);
            padding: 0.42rem 0.8rem;
            font-size: 0.82rem;
        }
        .nav button[type="submit"]:hover {
            background: var(--danger-soft);
            color: var(--danger);
            border-color: #fecaca;
        }

        /* Flash & Errors */
        .flash {
            background: var(--success-soft);
            border: 1px solid #bbf7d0;
            color: var(--success);
            padding: 0.85rem 1.1rem;
            border-radius: 12px;
            margin-bottom: 1.25rem;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .error {
            background: var(--danger-soft);
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 0.95rem 1.15rem;
            border-radius: 12px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }
        .error ul { margin: 0.4rem 0 0 1.15rem; padding: 0; }

        /* Forms */
        .form-card {
            max-width: 720px;
            margin: 0 auto;
        }

        .auth-card {
            max-width: 440px;
            margin: 1.5rem auto;
        }

        form label {
            display: block;
            margin-top: 1rem;
            margin-bottom: 0.4rem;
            font-weight: 600;
            font-size: 0.88rem;
            color: var(--text);
        }

        input[type="text"],
        input[type="url"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 0.7rem 0.9rem;
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text);
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: var(--radius-sm);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        textarea {
            resize: vertical;
            min-height: 160px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.15);
        }

        .checkbox-label {
            display: inline-flex !important;
            align-items: center;
            gap: 0.55rem;
            font-weight: 500 !important;
            cursor: pointer;
            margin-top: 1rem;
        }
        .checkbox-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--accent);
            margin: 0;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        /* Article Detail */
        .detail-cover {
            width: 100%;
            max-height: 420px;
            object-fit: cover;
            border-radius: 14px;
            margin: 1.25rem 0 1.5rem;
        }

        .detail-body {
            font-size: 1.02rem;
            line-height: 1.8;
            color: #1e293b;
        }

        .detail-footer {
            margin-top: 2rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        /* Quick links list */
        .clean-list {
            list-style: none;
            padding: 0;
            margin: 0.5rem 0 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .clean-list li {
            font-size: 0.925rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            gap: 0.35rem;
            list-style: none;
            padding: 0;
            margin: 1.5rem 0 0;
            flex-wrap: wrap;
        }
        .pagination li a, .pagination li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 0.65rem;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: #ffffff;
            color: var(--text);
            font-size: 0.875rem;
            font-weight: 600;
        }
        .pagination li a:hover {
            border-color: var(--accent);
            color: var(--accent);
        }
        .pagination li.active span {
            background: var(--accent);
            border-color: var(--accent);
            color: #ffffff;
        }

        /* Footer */
        .site-footer {
            max-width: 1140px;
            margin: 0 auto;
            padding: 1.5rem 1.25rem 2.5rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.75rem;
            font-size: 0.85rem;
            color: var(--muted);
        }

        @media (max-width: 640px) {
            .hero { padding: 1.5rem; }
            .hero h2 { font-size: 1.45rem; }
            .card { padding: 1.2rem; }
            .article-row { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        @include('partials.nav')
    </header>

    <main>
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        <span>&copy; {{ date('Y') }} Portal Berita — Praktikum Pemrograman Web</span>
        <span>Laravel &bull; UI Modern</span>
    </footer>
</body>
</html>