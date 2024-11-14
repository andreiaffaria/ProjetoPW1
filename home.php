<?php
include_once 'lib' . DIRECTORY_SEPARATOR . 'utilizadores_lib.php';


if (!validaSessao()) {
    header('Location: login.php');
    exit;
}

include_once 'partials/header.php';
include_once 'partials/menu.php';
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

<?php include_once 'logout.php'; ?>
