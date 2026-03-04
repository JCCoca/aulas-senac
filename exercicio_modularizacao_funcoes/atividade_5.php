<?php 

function aplicarFidelidade(float $valor, int $pontos): float
{
    $desconto = match (true) {
        $pontos > 100 => 0.15,
        $pontos >= 50 => 0.1,
        default => 0
    };

    return ($valor - ($valor * $desconto));
}

echo aplicarFidelidade(120.50, 96);