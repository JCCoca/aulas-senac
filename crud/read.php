<?php 

    require_once 'connection/database.php';

    $query = $connection->query('SELECT * FROM produto');
    $produtos = $query->fetchAll();

?>

<?php include_once 'layouts/header.php'; ?>

<div class="row mb-4">
    <div class="col-md-6">
        <h3 class="mb-0">Produtos</h3>
    </div>
    <div class="col-md-6 text-end">
        <a href="create.php" class="btn btn-primary">
            Adicionar
        </a>
    </div>
</div>

<?php include_once 'components/alerts.php' ?>

<div class="table-responsive">
    <table class="table table-sm table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto->nome ?></td>
                    <td><?= 'R$ '.number_format($produto->preco, 2, ',', '.') ?></td>
                    <td><?= $produto->quantidade ?></td>
                    <td><?= $produto->descricao ?></td>
                    <td>
                        <div class="d-inline">
                            <a href="update.php?id=<?= $produto->id ?>" class="btn btn-sm btn-outline-primary me-2">
                                Editar
                            </a>
                            <a href="delete.php?id=<?= $produto->id ?>" class="btn btn-sm btn-outline-danger">
                                Excluir
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include_once 'layouts/footer.php'; ?>