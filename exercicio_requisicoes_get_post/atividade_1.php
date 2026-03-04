<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O Buscador Dinâmico</title>
</head>
<body>
    <?php if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])): ?>
        <h4>
            Você pesquisou pelo termo: <?= $_GET['pesquisa'] ?>
        </h4>
    <?php endif ?>

    <form action="" method="get">
        <label for="pesquisa">Pesquisa</label>
        <input type="search" name="pesquisa" id="pesquisa" required>
        <button type="submit">Pesquisar</button>
    </form>
</body>
</html>