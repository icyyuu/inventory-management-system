<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .nav-link {
            width: 100%;
            text-align: center;
            padding: 12px 0;
            font-size: 1.08rem;
            color: #33443;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            border-radius: 8px;
            display: block;
        }
        .nav-link:hover {
            background: #413f3d;
            color: #fff;
            text-decoration: none;
        }
        .nav-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 30%;
            margin-bottom: 16px;
            display: block;
        }
    </style>
</head>
<body style="display:flex;min-height:100vh;background:#F1F2EF;font-family:Arial,sans-serif;color:#33443;">
    <nav style="display:flex;flex-direction:column;align-items:center;gap:28px;padding:40px 0 40px 0;background:#f8fafc;border-right:1px solid var(--border);min-width:260px;max-width:340px;width:22vw;height:100vh;">
        <img src="{{ asset('images/LOGO.png') }}" alt="Logo" class="nav-logo">
        <h1 style="font-size:24px;font-weight:700;margin-bottom:18px;text-align:center;">Inventory Management System</h1>
        <div style="display:flex;flex-direction:column;align-items:center;gap:8px;width:100%;">
            <a href="{{ route('categories.index') }}" class="nav-link">
                Categories
            </a>
            <a href="{{ route('items.index') }}" class="nav-link">
                Items
            </a>
        </div>
    </nav>
    <div class="container" style="flex:1;">
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
