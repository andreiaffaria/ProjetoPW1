<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="home.php">Gestão de Sócios</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['nome'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="change_password.php">Alterar Palavra-passe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Terminar Sessão</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Iniciar Sessão</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registar.php">Registar</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>    

</body>
</html>
