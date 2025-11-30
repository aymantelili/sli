<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLI - Smart Logistics Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #003087, #005eb8);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            max-width: 440px;
            width: 100%;
        }
        .btn-login {
            background: #003087;
            border: none;
            padding: 12px;
            font-weight: 600;
        }
        .btn-login:hover { background: #E2001A; }
        .demo-box { background: #f8f9fa; padding: 15px; border-radius: 10px; font-size: 0.9rem; }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-primary">SLI</h1>
        <p class="text-muted fs-5">Smart Logistics Information</p>
        <h5>Dräxlmaier Jemmel</h5>
    </div>

    <form action="login.php" method="POST">
        <div class="mb-3">
            <label class="form-label fw-bold">Matricule</label>
            <input type="text" name="matricule" class="form-control form-control-lg" 
                   placeholder="e.g. D16000001" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control form-control-lg" 
                   value="demo123" required>
        </div>
        <button type="submit" class="btn btn-login text-white w-100">Login</button>
    </form>

    <div class="demo-box mt-4">
        <strong>Demo Accounts (Password: demo123)</strong><br>
        D16000001 → Directeur<br>
        sd16000002 → Sous-Directeur MH<br>
        s16000003 → Supervisor MH<br>
        tl16000123 → Team Leader INR L1<br>
        O16001234 → Operator INR L1
    </div>

    <div class="text-center mt-3 text-muted small">
        © 2025 Dräxlmaier Group – Internal Use Only
    </div>
</div>

</body>
</html>
