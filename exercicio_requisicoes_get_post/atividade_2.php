<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $senha = $_POST['senha'];

        if ($senha === 'Senac2024') {
            echo 'Acesso Autorizado';
        } else {
            echo 'Senha Incorreta';
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Login Seguro </title>
</head>
<body>
    <form action="" method="POST">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>

        <br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>

        <br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>