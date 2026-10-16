<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — AstroVastuPooja CRM</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box }
        :root { --p:#D4872E; --pd:#B56A17; --pm:#FFF8EF; --bg:#F8F6F3; --card:#fff; --border:#E8E0D6; --text:#2C1F14; --muted:#7A6652 }
        body { font-family:'DM Sans',system-ui,sans-serif; background:var(--bg); color:var(--text); display:flex; align-items:center; justify-content:center; min-height:100vh; padding:20px }
        .login-card { background:var(--card); border:1px solid var(--border); border-radius:16px; padding:32px; width:100%; max-width:400px; box-shadow:0 12px 30px rgba(44,31,20,.05) }
        .logo-wrap { display:flex; flex-direction:column; align-items:center; gap:8px; margin-bottom:24px; text-align:center }
        .logo-icon { width:48px; height:48px; background:linear-gradient(135deg,var(--p),var(--pd)); border-radius:50%; display:flex; align-items:center; justify-content:center; color:#fff; font-size:22px; font-weight:700 }
        .logo-brand { font-size:18px; font-weight:700; color:var(--text) }
        .logo-sub { font-size:12px; color:var(--muted) }
        .form-group { margin-bottom:16px }
        .form-group label { display:block; font-size:12px; font-weight:500; color:var(--muted); margin-bottom:6px }
        .form-group input { width:100%; padding:10px 14px; border:1px solid var(--border); border-radius:8px; font-size:14px; font-family:inherit; background:var(--bg) }
        .form-group input:focus { outline:none; border-color:var(--p) }
        .btn-submit { width:100%; padding:12px; background:var(--p); border:none; border-radius:8px; color:#fff; font-size:14px; font-weight:600; cursor:pointer; font-family:inherit; transition:all .15s; margin-top:8px }
        .btn-submit:hover { background:var(--pd) }
        .error-message { background:#FDF2F2; color:#7A1F1F; border:1px solid rgba(122,31,31,.2); padding:10px; border-radius:8px; font-size:12px; margin-bottom:16px }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="logo-wrap">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 64px; height: 64px; border-radius: 50%; object-fit: cover; margin-bottom: 8px; border: 1px solid var(--border);">
            <div>
                <div class="logo-brand">AstroVastuPooja CRM</div>
                <div class="logo-sub">Sign in to manage your Vedic platform</div>
            </div>
        </div>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="admin@astrovastupooja.com" value="{{ old('email') }}">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <div class="form-group" style="display:flex; align-items:center; gap:8px">
                <input type="checkbox" name="remember" id="remember" style="width:auto">
                <label for="remember" style="margin-bottom:0; cursor:pointer">Remember me</label>
            </div>

            <button type="submit" class="btn-submit">Sign In →</button>
        </form>
    </div>

</body>
</html>
