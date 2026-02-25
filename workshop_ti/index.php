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
                <h3 class="text-center mb-4">Inscrição para Workshop de TI</h3>

                <?php if (isset($_GET['error']) and !empty($_GET['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_GET['error']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <div class="card card-body">
                    <form action="processar.php" method="POST">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>  
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required>  
                        </div>

                        <div class="mb-3">
                            <label for="area_interesse" class="form-label">Área de Interesse</label>
                            <select name="area_interesse" id="area_interesse" class="form-select" required>
                                <option value="">Selecione uma área de interesse</option>
                                <option value="Desenvolvimento Web">Desenvolvimento Web</option>
                                <option value="Redes">Redes</option>
                                <option value="Design">Design</option>
                                <option value="Segurança">Segurança</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nivel_iniciante" class="form-label">
                                Nível de Conhecimento
                            </label>
                            
                            <div class="form-check">
                                <input type="radio" name="nivel_conhecimento" id="nivel_iniciante" class="form-check-input" value="Iniciante" required>
                                <label class="form-check-label" for="nivel_iniciante">
                                    Iniciante
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="nivel_conhecimento" id="nivel_intermediario" class="form-check-input" value="Intermediário">
                                <label class="form-check-label" for="nivel_intermediario">
                                    Intermediário
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="nivel_conhecimento" id="nivel_avancado" class="form-check-input" value="Avançado">
                                <label class="form-check-label" for="nivel_avancado">
                                    Avançado
                                </label>
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="termo_uso" id="termo_uso" class="form-check-input" value="1" required>
                            <label class="form-check-label" for="termo_uso">
                                Aceito os termo de uso da plataforma
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Enviar
                        </button>

                        <button type="reset" class="btn btn-secondary">
                            Limpar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>