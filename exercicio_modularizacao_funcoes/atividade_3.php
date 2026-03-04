<?php 

function calcularFrete(string $cidade): float
{
    return match ($cidade) {
        'Rio Branco' => 10.0,
        'Cruzeiro do Sul' => 50.0,
        'Sena Madureira' => 30.0,
        default => 40.0
    };
}

$pedidos = [ 
    ['cliente' => 'João', 'cidade' => 'Rio Branco'], 
    ['cliente' => 'Maria', 'cidade' => 'Cruzeiro do Sul'], 
    ['cliente' => 'Bia', 'cidade' => 'Tarauacá']
];

foreach ($pedidos as $pedido) {
    echo calcularFrete($pedido['cidade']).'<br>';
}