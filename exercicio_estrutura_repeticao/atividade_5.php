<?php 

$turma = [ 
    'Ana' => ['nota' => 8.5, 'presenca' => 90], 
    'Carlos' => ['nota' => 5.0, 'presenca' => 85], 
    'Bia' => ['nota' => 9.0, 'presenca' => 70], 
    'João' => ['nota' => 7.0, 'presenca' => 95] 
];

foreach ($turma as $nome => $dados) {
    if ($dados['nota'] >= 7 and $dados['presenca'] >= 75) {
        echo "Aluno(a): {$nome} | Situação: Aprovado <br>";
    } else {
        echo "Aluno(a): {$nome} | Situação: Reprovado <br>";
    }
}