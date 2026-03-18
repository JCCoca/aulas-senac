<?php

    $query = $connection->query('SELECT * FROM tb_ordens_servico');
    $servicos = $query->fetchAll();

?>

<?php include_once 'views/layouts/header.php'; ?>

<div class="row mb-4">
    <div class="col-md-6">
        <h3 class="mb-0">Serviços</h3>
    </div>
    <div class="col-md-6 text-end">
        <a href="?vp=cadastrar_servico" class="btn btn-primary">
            Adicionar
        </a>
    </div>
</div>

<?php include_once 'views/components/alerts.php' ?>

<div class="table-responsive">
    <table class="table table-sm table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>Aparelho</th>
                <th>Problema</th>
                <th>Valor Estimado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $servico): ?>
                <tr class="<?= $servico->valor_estimado > 500 ? 'table-warning' : '' ?>">
                    <td><?= $servico->cliente ?></td>
                    <td><?= $servico->aparelho ?></td>
                    <td><?= $servico->problema ?></td>
                    <td><?= 'R$ '.number_format($servico->valor_estimado, 2, ',', '.') ?></td>
                    <td>
                        <div class="d-flex">
                            <a href="?vp=editar_servico&id=<?= $servico->id ?>" class="btn btn-sm btn-outline-primary me-2">
                                Editar
                            </a>
                            <a href="?ac=excluir_servico&id=<?= $servico->id ?>" class="btn btn-sm btn-outline-danger">
                                Excluir
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include_once 'views/layouts/footer.php'; ?>