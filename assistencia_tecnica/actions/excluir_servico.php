<?php 

require_once '../connection/database.php';

$id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$delete = $connection->prepare('DELETE FROM tb_ordens_servico WHERE id = :id');
$delete->bindValue(':id', $id, PDO::PARAM_INT);
$delete->execute();

if ($delete->rowCount() > 0) {
    header('Location: ../views/pages/servicos.php?success='.urlencode('Dados excluído com sucesso!'));
} else {
    header('Location: ../views/pages/servicos.php?error='.urlencode('Ocorreu um erro ao tentar excluir os dados!'));
}