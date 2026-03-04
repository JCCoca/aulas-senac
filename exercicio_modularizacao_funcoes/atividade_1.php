<?php 

$precosDolar = [10.50, 25.00, 100.99, 5.25]; 
$taxaHoje = 5.28;

function converterParaReal(float $valorDolar, float $taxaHoje): float 
{
    return $valorDolar * $taxaHoje;
}

foreach ($precosDolar as $dolar) {
    echo converterParaReal($dolar, $taxaHoje).'<br>';
}