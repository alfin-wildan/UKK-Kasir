<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Finzzz Store</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/fruit-icon.png') }}"> <!-- ganti sesuai icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(135deg, #e0f7fa, #ffffff);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
    }

    .login-container {
        display: flex;
        flex-wrap: wrap;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        max-width: 1000px;
        width: 100%;
        overflow: hidden;
        transition: 0.3s ease;
    }

    .login-form-section {
        flex: 1 1 500px;
        padding: 50px 40px;
    }

    .login-form-section h1 {
        color:rgb(200, 200, 200);
        margin-bottom: 30px;
        text-align: center;
        font-weight: 700;
    }
    .login-form-section h5 {
        color:rgb(200, 200, 200);
        margin-bottom: 30px;
        text-align: center;
        font-weight: 700;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border-radius: 14px;
        padding: 12px 45px 12px 15px;
        font-size: 1rem;
        border: 1px solid #b3e5fc;
        background: #f0f9ff;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color:rgb(200, 200, 200);
        box-shadow: 0 0 0 0.2rem rgba(41, 182, 246, 0.3);
    }

    .form-group {
        position: relative;
    }

    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #90caf9;
        font-size: 1.2rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #81d4fa, rgb(200, 200, 200));
        border: none;
        border-radius: 14px;
        padding: 12px;
        font-size: 1.1rem;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #4fc3f7, #0288d1);
    }

    .alert {
        border-radius: 12px;
    }

    .login-image-section {
        flex: 1 1 500px;
        background:rgb(181, 181, 181);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }

    .login-image {
        max-width: 90%;
        height: auto;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
        }

        .login-image-section {
            order: -1;
            padding: 20px;
        }

        .login-form-section {
            padding: 30px 20px;
        }
    }
</style>

</head>
<body>

    <div class="login-container">
        <!-- Form Login -->
        <div class="login-form-section">
            <h1>Login</h1>
            <h5>Finzz Store</h5>

            @if (Session::get('failed'))
                <div class="alert alert-warning">{{ Session::get('failed') }}</div>
            @endif
            @if (Session::get('logout'))
                <div class="alert alert-primary">{{ Session::get('logout') }}</div>
            @endif
            @if (Session::get('canAccess'))
                <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4 form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your email">
                    <i class="bi bi-envelope input-icon" style="margin-top:13px;"></i>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4 form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                    <i class="bi bi-lock input-icon" style="margin-top:13px;"></i>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>

     
    </div>

</body>
</html>
