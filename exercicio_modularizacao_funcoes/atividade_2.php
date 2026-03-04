<?php 

function verificarSenha(string $senha): bool
{
    return strlen($senha) >= 8;
}

$senhasParaTeste = ["123", "senac2024", "admin", "php_is_cool_84", "1234567"];

foreach ($senhasParaTeste as $senha) {
    echo verificarSenha($senha) ? 'Aprovadas<br>' : 'Reprovadas<br>';
}