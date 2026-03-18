<?php 

$id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$delete = $connection->prepare('DELETE FROM tb_ordens_servico WHERE id = :id');
$delete->bindValue(':id', $id, PDO::PARAM_INT);
$delete->execute();

if ($delete->rowCount() > 0) {
    header('Location: ?vp=servicos&success='.urlencode('Dados excluído com sucesso!'));
} else {
    header('Location: ?vp=servicos&error='.urlencode('Ocorreu um erro ao tentar excluir os dados!'));
}