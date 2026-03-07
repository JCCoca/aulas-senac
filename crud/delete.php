<?php 

require_once 'connection/database.php';

$id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$delete = $connection->prepare('DELETE FROM produto WHERE id = :id');

$delete->bindValue(':id', $id, PDO::PARAM_INT);

$delete->execute();

if ($delete->rowCount() > 0) {
    header('Location: read.php?success='.urlencode('Produto excluído com sucesso!'));
} else {
    header('Location: read.php?error='.urlencode('Ocorreu um erro ao tentar excluir o produto!'));
}