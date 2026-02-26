<?php 

$temperaturas = [22, 25, 28, 32, 45, 38, 31, 29];

$i = 0;

while (true) {
    if (!isset($temperaturas[$i])) {
        echo 'Temperatura está estável.';
        break;
    }

    if ($temperaturas[$i] >= 40) {
        echo "ALERTA CRÍTICO: Superaquecimento detectado! Sistema interrompido na leitura {$i}";
        break;
    }

    $i++;
}