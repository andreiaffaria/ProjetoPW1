<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php
    include_once 'lib' . DIRECTORY_SEPARATOR . 'utilizadores_lib.php';
    include_once 'partials/menu.php';

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
        <label>Nome: <input type="text" name="username"></label><br>
        <label>NIF: <input type="text" name="password"></label><br>
        <label>Data De Nascimento: <input type="date" id="birthday" name="birthday"></label><br>
        <label>Morada: <input type="text" name="password"></label><br>
        <label>Código Postal: <input type="Integer" name="Cp" maxlength="4" size="4"> - <input type="Integer" name="Cp2" maxlength="3" size="1"><br>
        <label for="localidade">Localidade:</label>
            <select name="localidade" id="localidade" form="select">
            <option value="pdl">Ponta Delgada</option>
            <option value="lagoa">Lagoa</option>
            <option value="arrifes">Arrifes</option>
            <option value="capelas">Capelas</option>
            </select><br>
        <label>Email: <input type="text" name="password"></label><br>
        <label>Sexo: <input style="20px;" type="radio" name="gender" value="male" checked>Masculino<br>
                <input type="radio" name="gender" value="female">Feminino<br>
                <input type="radio" name="gender" value="other"> Outro<br>
        
        
        
        
        <input type="submit" class="btn btn-primary btn-lg mx-2" value="Registar">
    </form>

    <?php if ($message) { echo "<p>$message</p>"; } ?>
</body>
</html>



