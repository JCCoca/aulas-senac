<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'connection/database.php';

        $nome = $_POST['nome'];
        $preco = (float) filter_var($_POST['preco'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $quantidade = (int) filter_var($_POST['quantidade'], FILTER_SANITIZE_NUMBER_INT);
        $descricao = $_POST['descricao'];

        if (!empty($nome) and !empty($preco) and !empty($quantidade) and !empty($descricao)) {
            $create = $connection->prepare('
                INSERT INTO produto (
                    nome, preco, quantidade, descricao
                ) VALUES (
                    :nome, :preco, :quantidade, :descricao
                )
            ');

            $create->bindValue(':nome', $nome);
            $create->bindValue(':preco', $preco);
            $create->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
            $create->bindValue(':descricao', $descricao);

            $create->execute();

            if ($connection->lastInsertId() > 0) {
                header('Location: ?success='.urlencode('Cadastro realizado com sucesso!'));
            } else {
                header('Location: ?error='.urlencode('Ocorreu um erro ao tentar realizar o cadastro!'));
            }
        } else {
            header('Location: ?error='.urlencode('Preencha todos os dados!'));
        }
    }

?>

<?php include_once 'layouts/header.php'; ?>

<h3 class="mb-4">Cadastrar Produto</h3>

<?php include_once 'components/alerts.php' ?>

<div class="card card-body">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" name="preco" id="preco" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="6" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Cadastrar
        </button>
    </form>
</div>

<?php include_once 'layouts/footer.php'; ?>