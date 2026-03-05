<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $peso = (float) filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $altura = (float) filter_var($_POST['altura'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        $imc = ($peso / ($altura**2));

        echo match (true) {
            $imc < 16 => '<p style="background: #ffff00">magreza grave</p>',
            $imc < 17 => '<p style="background: #ffff00">magreza moderada</p>',
            $imc < 18.5 => '<p style="background: #99ff33">magreza leve</p>',
            $imc < 25 => '<p style="background: #00cc00">peso ideal</p>',
            $imc < 30 => '<p style="background: #ff6600">sobrepeso</p>',
            $imc < 35 => '<p style="background: #ff6600">obesidade grau I</p>',
            $imc < 40 => '<p style="background: #ff0000">obesidade grau II ou severa</p>',
            default => '<p style="background: #ff0000">obesidade grau III ou mórbida</p>'
        };
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC (Processamento Interno)</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="peso">Peso</label>
        <input type="number" name="peso" id="peso" step="0.01" required>

        <br>

        <label for="altura">Altura</label>
        <input type="number" name="altura" id="altura" step="0.01" required>

        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>