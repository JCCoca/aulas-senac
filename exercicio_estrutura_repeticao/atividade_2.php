<?php 

$usuarios = [ 
    ['user' => 'admin_jose', 'nivel' => 'admin', 'ativo' => true], 
    ['user' => 'aluno_ti', 'nivel' => 'usuario', 'ativo' => true], 
    ['user' => 'estagiario_01', 'nivel' => 'moderador', 'ativo' => false], 
    ['user' => 'coord_senac', 'nivel' => 'admin', 'ativo' => true] 
];

for ($i=0; $i < count($usuarios); $i++) {
    if ($usuarios[$i]['ativo'] == true) {
        switch ($usuarios[$i]['nivel']) {
            case 'admin':
                echo 'Acesso total liberado.';
                break;
            case 'moderador':
                echo 'Acesso restrito liberado.';
                break;
            default:
                echo 'Acesso negado.';
        }
    }
}