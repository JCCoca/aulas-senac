<?php 

function limparNome(string $nome): string
{
    return mb_ucfirst(mb_strtolower(trim($nome)));
}

echo limparNome(' josé coca  ');