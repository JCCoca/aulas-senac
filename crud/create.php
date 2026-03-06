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

        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">Estoque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Início</a>
                    <a class="nav-link" href="#">Produto</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <h3 class="mb-4">Cadastrar Produto</h3>

        <?php if (isset($_GET['success']) and !empty($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_GET['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <?php if (isset($_GET['error']) and !empty($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_GET['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

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
    </div>
</body>
</html>