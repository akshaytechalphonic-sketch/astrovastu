<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') — AstroVastuPooja CRM</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box }
        :root { --p:#D4872E; --pd:#B56A17; --pm:#FFF8EF; --t:#1B6B5A; --tm:#EDF8F5; --d:#7A1F1F; --dm:#FDF2F2; --bg:#F8F6F3; --card:#fff; --border:#E8E0D6; --text:#2C1F14; --muted:#7A6652; --sidebar:#1A1410 }
        body { font-family:'DM Sans',system-ui,sans-serif; background:var(--bg); color:var(--text) }
        
        .admin-wrap { display:flex; min-height:100vh }
        .sidebar { width:250px; background:var(--sidebar); color:#B8A694; padding:20px 0; position:fixed; height:100vh; overflow-y:auto; z-index: 100 }
        .sidebar-logo { display:flex; align-items:center; gap:10px; padding:0 20px 24px; border-bottom:1px solid rgba(255,255,255,.06) }
        .sidebar-logo .om { width:36px; height:36px; background:linear-gradient(135deg,var(--p),var(--pd)); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-size:16px; font-weight:700 }
        .sidebar-logo span { font-size:14px; font-weight:600; color:#E8E0D6 }
        .sidebar-nav { padding:16px 0 }
        .sidebar-nav a { display:flex; align-items:center; gap:10px; padding:10px 20px; font-size:13px; color:#B8A694; transition:all .15s; border-left:3px solid transparent; text-decoration:none }
        .sidebar-nav a:hover { background:rgba(255,255,255,.04); color:#E8E0D6 }
        .sidebar-nav a.active { background:rgba(212,135,46,.1); color:var(--p); border-left-color:var(--p); font-weight:600 }
        .sidebar-nav a .icon { font-size:16px; width:20px; text-align:center }
        .sidebar-section { font-size:10px; letter-spacing:2px; text-transform:uppercase; color:#5C4A3A; padding:16px 20px 8px; font-weight:600 }
        
        .main { margin-left:250px; flex:1; padding:24px 32px; min-height:100vh }
        .page-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:24px }
        .page-header h1 { font-size:24px; font-weight:600 }
        
        .btn-admin { display:inline-flex; align-items:center; gap:6px; padding:9px 20px; border-radius:8px; font-size:13px; font-weight:500; cursor:pointer; border:none; font-family:inherit; transition:all .15s; text-decoration:none }
        .btn-admin-p { background:var(--p); color:#fff }
        .btn-admin-p:hover { background:var(--pd) }
        .btn-admin-o { background:transparent; border:1px solid var(--border); color:var(--text) }
        .btn-admin-o:hover { border-color:var(--p) }
        .btn-admin-d { background:var(--dm); color:var(--d); border:1px solid rgba(122,31,31,.2) }
        .btn-admin-d:hover { background:#f5d0d0 }
        .btn-admin-sm { padding:6px 14px; font-size:12px }
        
        .card { background:var(--card); border:1px solid var(--border); border-radius:12px; padding:24px; margin-bottom:20px }
        .card-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px }
        .card-header h2 { font-size:16px; font-weight:600 }
        
        .stat-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(180px,1fr)); gap:16px; margin-bottom:24px }
        .stat-card { background:var(--card); border:1px solid var(--border); border-radius:12px; padding:20px }
        .stat-card .num { font-size:28px; font-weight:700; color:var(--p) }
        .stat-card .label { font-size:12px; color:var(--muted); margin-top:2px }
        .stat-card.highlight { border-left:4px solid var(--p) }
        
        table { width:100%; border-collapse:collapse }
        th { text-align:left; font-size:11px; font-weight:600; color:var(--muted); text-transform:uppercase; letter-spacing:.5px; padding:10px 12px; border-bottom:1px solid var(--border) }
        td { padding:10px 12px; font-size:13px; border-bottom:1px solid var(--border) }
        tr:hover td { background:var(--bg) }
        
        .badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:500; text-transform:capitalize }
        .badge-new { background:var(--pm); color:var(--pd) }
        .badge-contacted { background:var(--tm); color:var(--t) }
        .badge-closed { background:#f0f0f0; color:#666 }
        .badge-inprogress { background:var(--pm); color:var(--p) }
        .badge-active { background:var(--tm); color:var(--t) }
        .badge-inactive { background:#f0f0f0; color:#999 }
        
        /* Forms styling */
        .form-group { margin-bottom:16px }
        .form-group label { display:block; font-size:12px; font-weight:500; color:var(--muted); margin-bottom:6px }
        .form-group input, .form-group select, .form-group textarea { width:100%; padding:9px 14px; border:1px solid var(--border); border-radius:8px; font-size:14px; font-family:inherit; background:var(--bg) }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { outline:none; border-color:var(--p) }
        .form-group textarea { min-height:100px; resize:vertical }
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px }
        
        .toggle-container { display:flex; align-items:center; gap:8px }
        .toggle-switch { position:relative; width:42px; height:22px; display:inline-block }
        .toggle-switch input { opacity:0; width:0; height:0 }
        .toggle-switch .slider { position:absolute; cursor:pointer; inset:0; background:#ccc; border-radius:22px; transition:.3s }
        .toggle-switch .slider:before { content:''; position:absolute; height:16px; width:16px; left:3px; bottom:3px; background:#fff; border-radius:50%; transition:.3s }
        .toggle-switch input:checked+.slider { background:var(--p) }
        .toggle-switch input:checked+.slider:before { transform:translateX(20px) }
        
        .sdc-full-preview { font-size:14px; color:var(--text); line-height:1.7 }
        .sdc-full-preview h4 { font-family:serif; font-size:18px; font-weight:600; margin:18px 0 8px; color:#1A1410 }
        .sdc-full-preview p { margin-bottom:10px }
        .sdc-full-preview ol, .sdc-full-preview ul { margin:8px 0 14px 22px }
        .sdc-full-preview ol li, .sdc-full-preview ul li { margin-bottom:6px; line-height:1.65 }
        .sdc-full-preview ol li::marker, .sdc-full-preview ul li::marker { color:var(--p) }
        
        .toast { position:fixed; top:20px; right:20px; padding:14px 24px; border-radius:10px; font-size:14px; z-index:9999; animation:slideDown .3s ease }
        .toast-success { background:var(--tm); color:var(--t); border:1px solid var(--t) }
        .toast-error { background:var(--dm); color:var(--d); border:1px solid var(--d) }
        @keyframes slideDown { from { opacity:0; transform:translateY(-10px) } to { opacity:1; transform:translateY(0) } }
    </style>
    @stack('styles')
</head>
<body>

    <div class="admin-wrap">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 1px solid rgba(255,255,255,.15);">
                <span>AVP Admin</span>
            </div>
            <nav class="sidebar-nav">
                <div class="sidebar-section">Overview</div>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><span class="icon">📊</span>Dashboard</a>
    
                <div class="sidebar-section">Content Management</div>
                <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}"><span class="icon">🔮</span>Services</a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"><span class="icon">📁</span>Categories</a>
                <a href="{{ route('admin.blogs.index') }}" class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"><span class="icon">📝</span>Blog Posts</a>
                <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"><span class="icon">🖼️</span>Gallery</a>
                <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"><span class="icon">⭐</span>Testimonials</a>
                <a href="{{ route('admin.banners.index') }}" class="{{ request()->routeIs('admin.banners.*') ? 'active' : '' }}"><span class="icon">🖼️</span>Banners</a>
                <a href="{{ route('admin.pages.index') }}" class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}"><span class="icon">📄</span>Pages</a>
    
                <div class="sidebar-section">CRM</div>
                <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}"><span class="icon">📋</span>Inquiries / Leads</a>
    
                <div class="sidebar-section">System</div>
                <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><span class="icon">⚙️</span>Site Settings</a>
                
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon">🚪</span>Logout</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
                <a href="{{ route('home') }}" target="_blank"><span class="icon">🌐</span>View Site</a>
            </nav>
        </aside>
        
        <main class="main">
            @if(session('success'))
                <div class="toast toast-success" id="adminAlert">✓ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="toast toast-error" id="adminAlert">✗ {{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const alert = document.getElementById("adminAlert");
            if (alert) {
                setTimeout(() => alert.style.display = "none", 4000);
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
