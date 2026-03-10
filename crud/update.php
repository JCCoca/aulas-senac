<?php

require_once 'connection/database.php';

$id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = (float) filter_var($_POST['preco'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantidade = (int) filter_var($_POST['quantidade'], FILTER_SANITIZE_NUMBER_INT);
    $descricao = $_POST['descricao'];

    if (!empty($nome) and !empty($preco) and !empty($quantidade) and !empty($descricao) and !empty($id)) {
        $update = $connection->prepare('
            UPDATE 
                produto 
            SET 
                nome = :nome, 
                preco = :preco, 
                quantidade = :quantidade, 
                descricao = :descricao
            WHERE   
                id = :id
        ');

        $update->bindValue(':nome', $nome);
        $update->bindValue(':preco', $preco);
        $update->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
        $update->bindValue(':descricao', $descricao);
        $update->bindValue(':id', $id, PDO::PARAM_INT);

        $status = $update->execute();

        if ($update->rowCount() > 0 or $status) {
            header('Location: ?id='.$id.'&success='.urlencode('Dados atualizados com sucesso!'));
        } else {
            header('Location: ?id='.$id.'&error='.urlencode('Ocorreu um erro ao tentar atualizar os dados!'));
        }
    } else {
        header('Location: ?id='.$id.'&error='.urlencode('Preencha todos os dados!'));
    }
}

$query = $connection->prepare('SELECT * FROM produto WHERE id = :id');

$query->bindValue(':id', $id, PDO::PARAM_INT);

$query->execute();

$produto = $query->fetch();

?>

<?php include_once 'layouts/header.php'; ?>

<h3 class="mb-4">Editar Produto</h3>

<?php include_once 'components/alerts.php' ?>

<div class="card card-body">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $produto->nome ?>" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" name="preco" id="preco" class="form-control" step="0.01" value="<?= $produto->preco ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control"
                value="<?= $produto->quantidade ?>" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="6"
                required><?= $produto->descricao ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </form>
</div>

<?php include_once 'layouts/footer.php'; ?>