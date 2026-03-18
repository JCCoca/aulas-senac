<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = $_POST['cliente'];
    $aparelho = $_POST['aparelho'];
    $problema = $_POST['problema'];
    $valor_estimado = (float) filter_var($_POST['valor_estimado'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    if (!empty($cliente) and !empty($aparelho) and !empty($problema) and !empty($valor_estimado) and !empty($id)) {
        $update = $connection->prepare('
            UPDATE 
                tb_ordens_servico 
            SET
                cliente = :cliente, 
                aparelho = :aparelho, 
                problema = :problema, 
                valor_estimado = :valor_estimado
            WHERE
                id = :id
        ');

        $update->bindValue(':cliente', $cliente);
        $update->bindValue(':aparelho', $aparelho);
        $update->bindValue(':problema', $problema);
        $update->bindValue(':valor_estimado', $valor_estimado);
        $update->bindValue(':id', $id, PDO::PARAM_INT);

        $status = $update->execute();

        if ($update->rowCount() == 1 or $st) {
            header('Location: ?vp=editar_servico&id='.$id.'&success='.urlencode('Dados Atualizados com sucesso!'));
        } else {
            header('Location: ?vp=editar_servico&id='.$id.'&error='.urlencode('Ocorreu um erro ao tentar atualizar os dados!'));
        }
    } else {
        header('Location: ?vp=editar_servico&id='.$id.'&error='.urlencode('Preencha todos os dados!'));
    }
}