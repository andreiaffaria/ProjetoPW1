<?php
include_once 'utilizadores_lib.php';

$message = '';

if (!empty($_POST)) {
    $nome = $_POST['username'];
    $password = $_POST['password'];

    if (!preg_match('/^[a-zA-Z]+$/', $nome)) {
        $message = "O nome de utilizador deve conter apenas letras.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        $message = "A palavra-passe deve ter no mínimo 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula e um número.";
    } else {
        $utilizadores = lerUtilizadores();
        $nomeUnico = true;
        foreach ($utilizadores as $utilizador) {
            if ($utilizador[1] === $nome) {
                $nomeUnico = false;
                break;
            }
        }
        
        if ($nomeUnico) {
            adicionarUtilizador($nome, $password);
            $message = "Utilizador registado com sucesso!";
        } else {
            $message = "O nome de utilizador já existe.";
        }
    }
}
?>

<form action="registar.php" method="post">
    <label>Nome de Utilizador: <input type="text" name="username"></label><br>
    <label>Palavra-passe: <input type="password" name="password"></label><br>
    <input type="submit" value="Registar">
</form>

<?php if ($message) { echo "<p>$message</p>"; } ?>
