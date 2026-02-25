<?php 

$carrinho = [
    ['nome' => 'Teclado Mecânico', 'preco' => 250.00, 'categoria' => 'perifericos'], 
    ['nome' => 'Monitor 24"', 'preco' => 900.00, 'categoria' => 'monitores'], 
    ['nome' => 'Mousepad Gamer', 'preco' => 80.00, 'categoria' => 'acessorios'], 
    ['nome' => 'Headset USB', 'preco' => 320.00, 'categoria' => 'perifericos'] 
];

foreach ($carrinho as $produto) {
    $desconto = match ($produto['categoria']) {
        'perifericos' => 0.1,
        'monitores' => 0.05,
        default => 0,
    };

    $novo_preco = $produto['preco'] - ($produto['preco'] * $desconto);

    echo "Produto: {$produto['nome']}<br>";
    echo "Preço com desconto: {$novo_preco}<br>";
    echo '<hr>';
}