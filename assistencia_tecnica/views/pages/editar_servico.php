<?php include_once 'views/layouts/header.php'; ?>

<?php

    $id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = $connection->prepare('SELECT * FROM tb_ordens_servico WHERE id = :id');
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();

    $servico = $query->fetch();

?>

<h3 class="mb-4">Editar Serviço</h3>

<?php include_once 'views/components/alerts.php' ?>

<div class="card card-body">
    <form action="<?= '?ac=editar_servico&id='.$id ?>" method="POST">
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" name="cliente" id="cliente" class="form-control" value="<?= $servico->cliente ?>" required>
        </div>

        <div class="mb-3">
            <label for="aparelho" class="form-label">Aparelho</label>
            <input type="text" name="aparelho" id="aparelho" class="form-control" value="<?= $servico->aparelho ?>" required>
        </div>

        <div class="mb-3">
            <label for="problema" class="form-label">Problema</label>
            <textarea name="problema" id="problema" class="form-control" rows="6" required><?= $servico->problema ?></textarea>
        </div>

        <div class="mb-3">
            <label for="valor_estimado" class="form-label">Valor Estimado</label>
            <input type="number" name="valor_estimado" id="valor_estimado" class="form-control" step="0.01" value="<?= $servico->valor_estimado ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Salvar
        </button>

        <a href="?vp=servicos" class="btn btn-secondary">
            Voltar
        </a>
    </form>
</div>

<?php include_once 'views/layouts/footer.php'; ?>