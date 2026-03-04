<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            move_uploaded_file($_FILES['imagem']['tmp_name'], 'uploads/'.$_FILES['imagem']['name']);
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
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" id="imagem" accept="image/jpeg, image/png" required>

        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>