<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) and !empty($senha)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ?vp=login&error='.urlencode('E-mail inválido!'));
            exit;
        }

        $query = $connection->prepare('SELECT * FROM tb_usuarios WHERE email = :email');
        $query->execute([':email' => $email]);

        if ($query->rowCount() == 1) {
            $usuario = $query->fetch();

            if ($usuario->senha === hash('sha256', $senha)) {
                $_SESSION['usuario'] = (array) $usuario;
                header('Location: ?vp=home');
            } else {
                header('Location: ?vp=login&error='.urlencode('Credênciais não encontradas!'));
            }
        } else {
            header('Location: ?vp=login&error='.urlencode('Credênciais não encontradas!'));
        }
    } else {
        header('Location: ?vp=login&error='.urlencode('Preencha as credênciais corretamente!'));
    }
}