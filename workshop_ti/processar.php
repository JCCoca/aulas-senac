<?php 

$nome = $_POST['nome'];
$email = $_POST['email'];
$area_interesse = $_POST['area_interesse'];
$nivel_conhecimento = $_POST['nivel_conhecimento'];
$termo_uso = $_POST['termo_uso'];

if (
    !empty($nome) 
    and !empty($email) 
    and !empty($area_interesse) 
    and !empty($nivel_conhecimento) 
    and !empty($termo_uso)
) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php?error='.urlencode('Informe um e-mail válido!'));
    }
} else {
    header('Location: index.php?error='.urlencode('Preencha todos os campos!'));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop TI</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-body-secondary">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-5 col-md-6 mx-auto">
                <h3 class="text-center mb-4">Parabéns, você esta inscrito para o Workshop de TI!</h3>

                <div class="card card-body">
                    <p>
                        <strong>Nome:</strong> <?= $nome ?>
                    </p>
                    <p>
                        <strong>E-mail:</strong> <?= $email ?>
                    </p>
                    <p>
                        <strong>Área de Interesse:</strong> <?= $area_interesse ?>
                    </p>

                    <?php if ($nivel_conhecimento == 'Iniciante'): ?>
                        <p>
                            <strong>Segestão:</strong> Recomendamos você realizar um curso introdutório nossa na sua área de interesse.
                        </p>
                    <?php endif ?>
                    <?php if ($nivel_conhecimento == 'Avançado'): ?>
                        <p>
                            <strong>Segestão:</strong> Recomendamos você participar de um fórum de especialistas na sua área de interesse.
                        </p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>