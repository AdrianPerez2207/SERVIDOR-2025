<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action="recibir_datos.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input name="nombre" type="text" class="form-control" id="floatingNombre" placeholder="name@example.com" required>
                <label for="floatingNombre">Nombre</label>
            </div>
            <div class="form-floating">
                <input name="apellidos" type="text" class="form-control" id="floatingApellidos" placeholder="Apellidos">
                <label for="floatingApellidos">Apellidos</label>
            </div>
            <div class="form-floating">
                <input name="telefono" type="tel" class="form-control" id="floatingTelefono" placeholder="xxxxxxxxx"
                       pattern="[0-9]{9}" required>
                <label for="floatingTelefono">Teléfono</label>
            </div>
            <div class="form-floating">
                <input name="email" type="text" class="form-control" id="floatingEmail" placeholder="email@example.com" required>
                <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required minlength="8">
                <label for="floatingPassword">Contraseña (mín. 8 caracteres)</label>
            </div>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Registrar</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
