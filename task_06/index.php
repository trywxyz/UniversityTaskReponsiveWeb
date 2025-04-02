<?php

// Percorre os números de 1 a 100
//1 2 3 5 6 11 13 17 19 23 29 31 37 41 45 47 53 59 61 67 71 73 79 83 89 97
for ($num = 1; $num <= 100; $num++) {
    $ehPrimo = true; // Assume que o número é primo
    
    // Verifica se o número tem divisores além de 1 e ele mesmo
    for ($divisor = 2; $divisor < $num; $divisor++) {
        if ($num % $divisor == 0) {
            $ehPrimo = false; // Se encontrar um divisor, não é primo
            break; // Interrompe o loop pois já sabemos que não é primo
        }
    }
    
    // Se for primo, exibe o número
    if ($ehPrimo) {
        echo $num . " ";
    }
}

?>