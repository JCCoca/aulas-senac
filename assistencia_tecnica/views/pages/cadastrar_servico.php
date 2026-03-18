<?php include_once 'views/layouts/header.php'; ?>

<h3 class="mb-4">Cadastrar Serviço</h3>

<?php include_once 'views/components/alerts.php' ?>

<div class="card card-body">
    <form action="?ac=cadastrar_servico" method="POST">
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" name="cliente" id="cliente" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="aparelho" class="form-label">Aparelho</label>
            <input type="text" name="aparelho" id="aparelho" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="problema" class="form-label">Problema</label>
            <textarea name="problema" id="problema" class="form-control" rows="6" required></textarea>
        </div>

        <div class="mb-3">
            <label for="valor_estimado" class="form-label">Valor Estimado</label>
            <input type="number" name="valor_estimado" id="valor_estimado" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Cadastrar
        </button>

        <a href="?vp=servicos" class="btn btn-secondary">
            Voltar
        </a>
    </form>
</div>

<?php include_once 'views/layouts/footer.php'; ?>