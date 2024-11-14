<?php
session_start();

if (isset($_SESSION['nome'])) {
    header('Location: home.php');
    exit;
}

include_once 'partials/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1>Bem-vindo ao Sistema de Gestão de Sócios</h1>
            <p class="lead">Aqui, os sócios podem gerenciar as suas informações e acessar recursos exclusivos.</p>
            <p>Por favor, inicie sessão para acessar sua área de sócio ou registe-se como novo sócio caso ainda não tenha uma conta.</p>
            
            <div class="mt-4">
                <a href="login.php" class="btn btn-primary btn-lg mx-2">Iniciar Sessão</a>
                <a href="registar.php" class="btn btn-secondary btn-lg mx-2">Registar-se</a>
            </div>
        </div>
    </div>
</div>

