<?php

function validaUtilizador(string $username, string $password): array|bool
{
    $futilizadores = fopen("utilizadores.txt", "r");
    while(($linha = fgets($futilizadores)) !== false) {
        $utilizador = explode(",", $linha);

        if ($username == $utilizador[0]) {
            if (password_verify($password, $utilizador[1])) {
                return $utilizador;
            } else {
                return false;
            }
        }
    }

    return false;
}


function validaSessao() {
    session_start();
    if(empty($_SESSION)) {
        echo "Não pode ver a página";
        echo '<a href="login.php">Iniciar Sessão</a>';
    }
}