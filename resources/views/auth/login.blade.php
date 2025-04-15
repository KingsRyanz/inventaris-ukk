<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Pro - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-color: #4f46e5;
            --secondary-color: #1e1b4b;
            --accent-color: #818cf8;
            --gradient-start: #4f46e5;
            --gradient-end: #06b6d4;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4f46e5, #06b6d4);
            /* Gradasi warna */
            position: relative;
            overflow: hidden;
        }

        /* Particle Animation */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
        }

        @keyframes moveParticle {
            0% {
                transform: translate(0, 0);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translate(var(--tx), var(--ty));
                opacity: 0;
            }
        }

        /* Neon Grid Background */
        .grid-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            background-image: url('path_to_inventory_image.png');
            /* Gambar atau Ilustrasi Inventaris */
            background-repeat: no-repeat;
            background-size: 100px 100px;
            background-position: center;
            opacity: 0.15;
            animation: gridMove 20s linear infinite;
            /* Efek gerakan latar belakang */
        }


        @keyframes gridMove {
            0% {
                transform: rotateX(60deg) translateY(0);
            }

            100% {
                transform: rotateX(60deg) translateY(50px);
            }
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: moveParticle 4s linear infinite;
        }

        @keyframes moveParticle {
            0% {
                transform: translate(0, 0);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translate(var(--tx), var(--ty));
                opacity: 0;
            }
        }

        .login-container {
            width: 100%;
            max-width: 520px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: rgba(30, 27, 75, 0.7);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            box-shadow:
                0 0 20px rgba(79, 70, 229, 0.3),
                0 0 40px rgba(79, 70, 229, 0.2),
                0 0 60px rgba(79, 70, 229, 0.1);
            padding: 40px;
            transform: translateY(0);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 0 30px rgba(79, 70, 229, 0.4),
                0 0 60px rgba(79, 70, 229, 0.3),
                0 0 90px rgba(79, 70, 229, 0.2);
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
            position: relative;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end));
            border-radius: 3px;
        }

        .login-header i {
            font-size: 4rem;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
            display: inline-block;
            filter: drop-shadow(0 0 10px rgba(79, 70, 229, 0.5));
        }

        .login-header h2 {
            color: #fff;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 10px;
            text-shadow: 0 0 10px rgba(79, 70, 229, 0.5);
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 15px 20px 15px 50px;
            font-size: 1rem;
            transition: all 0.3s ease;
            color: #fff;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent-color);
            box-shadow: 0 0 20px rgba(79, 70, 229, 0.3);
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .input-group {
            margin-bottom: 15px;
            /* Menambah jarak antar input */
        }


        .form-control:focus+.input-icon {
            color: var(--accent-color);
        }

        .btn-login {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            border: none;
            border-radius: 15px;
            padding: 15px 30px;
            color: white;
            font-weight: 600;
            width: 100%;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(79, 70, 229, 0.5);
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .login-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .login-footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            position: relative;
        }

        .login-footer a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }

        .login-footer a:hover {
            color: var(--accent-color);
        }

        .login-footer a:hover::after {
            width: 100%;
        }

        .error-message {
            color: #f87171;
            font-size: 0.85rem;
            margin-top: 5px;
            padding-left: 15px;
        }

        .alert {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: #fff;
            backdrop-filter: blur(10px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }

        /* Input Autofill Style */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #fff;
            -webkit-box-shadow: 0 0 0px 1000px rgba(0, 0, 0, 0) inset;
            transition: background-color 5000s ease-in-out 0s;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            padding: 0;
            cursor: pointer;
        }
        .toggle-password:focus {
            outline: none;
            box-shadow: none;
        }
        .password-container {
            position: relative;
        }
    </style>
</head>

<body>
    <div class="grid-background"></div>
    <div class="particles" id="particles"></div>

    <div class="login-container">
        <div class="login-card animate__animated animate__fadeIn">
            <div class="login-header">
                <i class="ri-store-2-line"></i>
                <h2>Inventaris Pro</h2>
                <p>Sistem Manajemen Inventaris Modern</p>
            </div>

            @if (session('status'))
            <div class="alert animate__animated animate__fadeIn" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                @csrf

                <div class="input-group">
                    <input type="email"
                        class="form-control @error('email') is-invalid animate-shake @enderror"
                        id="email"
                        name="email"
                        placeholder="Email Address"
                        value="{{ old('email') }}"
                        required
                        autofocus>
                    <i class="ri-mail-line input-icon"></i>
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group password-container">
                    <input type="password"
                        class="form-control @error('password') is-invalid animate-shake @enderror"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required>
                    <i class="ri-lock-2-line input-icon"></i>
                    <button type="button" class="toggle-password" onclick="togglePassword()">
                        <i class="ri-eye-off-line" id="toggleIcon"></i>
                    </button>
                    @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Ingat Saya
                    </label>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="ri-login-circle-line me-2"></i>Masuk
                </button>

                <div class="login-footer">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        <i class="ri-question-line me-1"></i>Lupa Password?
                    </a>
                    @endif
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        <i class="ri-user-add-line me-1"></i>Daftar Baru
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            }
        }

        // Form validation
        (function() {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()

        // Create particles
        function createParticles() {
            const particles = document.getElementById('particles');
            const numberOfParticles = 50;

            for (let i = 0; i < numberOfParticles; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';

                // Random position
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = Math.random() * 100 + 'vh';

                // Random movement
                const tx = (Math.random() - 0.5) * 200;
                const ty = (Math.random() - 0.5) * 200;  // Added missing ty variable
                particle.style.setProperty('--tx', tx + 'px');
                particle.style.setProperty('--ty', ty + 'px');

                // Random animation duration
                const duration = Math.random() * 5 + 3;
                particle.style.animation = `moveParticle ${duration}s linear infinite`;

                particles.appendChild(particle);
            }
        }

        // Run particle animation
        window.addEventListener('load', createParticles);
    </script>
</body>
</html>