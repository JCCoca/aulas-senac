<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = $_POST['cliente'];
    $aparelho = $_POST['aparelho'];
    $problema = $_POST['problema'];
    $valor_estimado = (float) filter_var($_POST['valor_estimado'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if (!empty($cliente) and !empty($aparelho) and !empty($problema) and !empty($valor_estimado)) {
        $create = $connection->prepare('
            INSERT INTO tb_ordens_servico (
                cliente, aparelho, problema, valor_estimado
            ) VALUES (
                :cliente, :aparelho, :problema, :valor_estimado
            )
        ');

        $create->bindValue(':cliente', $cliente);
        $create->bindValue(':aparelho', $aparelho);
        $create->bindValue(':problema', $problema);
        $create->bindValue(':valor_estimado', $valor_estimado);

        $create->execute();

        if ($connection->lastInsertId() > 0) {
            header('Location: ?vp=cadastrar_servico&success='.urlencode('Cadastro realizado com sucesso!'));
        } else {
            header('Location: ?vp=cadastrar_servico&error='.urlencode('Ocorreu um erro ao tentar realizar o cadastro!'));
        }
    } else {
        header('Location: ?vp=cadastrar_servico&error='.urlencode('Preencha todos os dados!'));
    }
}