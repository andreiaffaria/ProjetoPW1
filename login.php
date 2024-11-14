<?php
include_once 'utilizadores_lib.php';

$message = '';

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica as credenciais do utilizador
    if (($utilizador = validaUtilizador($username, $password)) !== false) {
        header('Location: home.php');
        exit; // Evita que o script continue após o redirecionamento
    } else {
        $message = "Utilizador ou palavra-passe incorretos";
    }
}
?>

<?php include_once 'header.php'; ?>

<div class="row mt-5">
    <div class="col">
        <h1 class="text-center">SGS</h1>
        <p class="lead text-center mt-2">Sócios</p>
        <p class="text-center">
            <img src="assets/img/icon.png" alt="" style="height: 50px">
        </p>
    </div>
</div>

<?php if (!empty($message)) { ?> 
    <div class="row justify-content-center">
        <div class="col-6">
            <p class="alert alert-danger text-center"><?php echo $message; ?></p>
        </div>
    </div>
<?php } ?>

<form action="login.php" method="post">
    <div class="row justify-content-center mt-3">
        <label for="username" class="col-2 text-end fw-bold">Nome de Utilizador</label>
        <div class="col-4">
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
    </div>
    
    <div class="row justify-content-center mt-3">
        <label for="password" class="col-2 text-end fw-bold">Palavra-passe</label>
        <div class="col-4">
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
    </div>
    
    <div class="row justify-content-center mt-3">
        <div class="col text-center">
            <input class="btn btn-success btn-large" type="submit" value="Iniciar Sessão">
        </div>
    </div>
</form>

<div class="row justify-content-center mt-3">
    <div class="col text-center">
        <a href="register.php" class="btn btn-link">Registar Novo Utilizador</a>
    </div>
</div>

