<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $valor = (float) filter_var($_POST['valor'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $prioridade = (bool) @filter_var($_POST['prioridade'], FILTER_SANITIZE_NUMBER_INT);

        if ($prioridade) {
            $valor += $valor * 0.2;
        }

        echo 'Valor total: R$ '.number_format($valor, 2, ',', '.');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Orçamento com Taxa de Urgência</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="valor">Valor Serviço</label>
        <input type="number" name="valor" id="valor" step="0.01" required>

        <br>

        <label for="prioridade">
            <input type="checkbox" name="prioridade" id="prioridade" value="1"> Entrega Prioritária
        </label>

        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>