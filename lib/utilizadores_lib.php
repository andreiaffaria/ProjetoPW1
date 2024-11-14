<?php
function lerUtilizadores(): array {
    $utilizadores = [];
    if (($f = fopen("utilizadores.txt", "r")) !== false) {
        while (($linha = fgets($f)) !== false) {
            $utilizador = explode(";", trim($linha));
            $utilizadores[] = $utilizador;
        }
        fclose($f);
    }
    return $utilizadores;
}

function adicionarUtilizador(string $nome, string $password): bool {
    $utilizadores = lerUtilizadores();
    $id = count($utilizadores) + 1;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $f = fopen("utilizadores.txt", "a");
    fwrite($f, "$id;$nome;$passwordHash;1\n");
    fclose($f);

    return true;
}

function validaUtilizador(string $username, string $password): array|bool {
    $utilizadores = lerUtilizadores();
    foreach ($utilizadores as $utilizador) {
        if ($username === $utilizador[1] && password_verify($password, $utilizador[2]) && $utilizador[3] == 1) {
            session_start();
            $_SESSION['nome'] = $utilizador[1];
            return $utilizador;
        }
    }
    return false;
}

function validaSessao(): bool {
    session_start();
    return isset($_SESSION['nome']);
}

function terminaSessao(): void {
    session_start();
    $_SESSION = [];
    session_destroy();
    header('Location: login.php');
}
