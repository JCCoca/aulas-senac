<?php 

$vagas = [ 
    "Desenvolvedor Full Stack", 
    "Estagiário de Suporte", 
    "Programador PHP Back-end", 
    "Designer UI/UX", 
    "Analista de Sistemas Back-end", 
    "Técnico em Redes" 
];

for ($i=0; $i < count($vagas); $i++) {
    if (str_contains($vagas[$i], 'Back-end')) {
        echo $vagas[$i].'<br>';
    }
}