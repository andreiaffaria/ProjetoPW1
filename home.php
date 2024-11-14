<?php
include_once 'lib' . DIRECTORY_SEPARATOR . 'utilizadores_lib.php';

// Verifica se o utilizador está autenticado, caso contrário redireciona para o login
if (!validaSessao()) {
    header('Location: login.php');
    exit;
}

include_once 'header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h1>
            <p class="lead">Esta é a sua área de sócio.</p>
            <p>Utilize o menu acima para acessar seu perfil, atualizar informações ou gerenciar sua conta de sócio.</p>
        </div>
    </div>
</div>

