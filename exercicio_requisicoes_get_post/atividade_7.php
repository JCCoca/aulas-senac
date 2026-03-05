<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
            $imagem = base64_encode(file_get_contents($_FILES['imagem']['tmp_name']));
            $tipo_imagem = $_FILES['imagem']['type'];
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Avatar do Usuário</title>
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <br>

            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="cargo" required>

            <br>

            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" id="imagem" accept="image/jpeg, image/png" required>

            <br>

            <button type="submit">Enviar</button>
        </form>
    <?php else: ?>
        <img src="<?= 'data:'.$tipo_imagem.';base64, '.$imagem ?>" style="width: 200px; height: auto;">
        <br>
        <p>Nome: <?= $nome ?></p>
        <p>Cargo: <?= $cargo ?></p>
    <?php endif ?>
</body>
</html>