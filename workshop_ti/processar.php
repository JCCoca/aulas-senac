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
    
} else {
    header('Location: index.php?error='.urlencode('Preencha todos os campos!'));
}

?>