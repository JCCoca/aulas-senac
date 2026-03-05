<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['arquivo']['name'])['extension'];

            if ($ext == 'bat' || $ext == 'exe') {
                echo 'Tipo de arquivo perigoso bloqueado';
            } else {
                move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/'.$_FILES['arquivo']['name']);
                echo 'Arquivo enviado com sucesso';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de Extensão de Arquivo</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="arquivo">Arquivo</label>
        <input type="file" name="arquivo" id="arquivo" required>

        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>