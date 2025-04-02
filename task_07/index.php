<?php
function listarDatas($dataInicial, $dataFinal) {
    $dataAtual = new DateTime($dataInicial);
    $dataFim = new DateTime($dataFinal);

    while ($dataAtual <= $dataFim) {
        echo $dataAtual->format('d/m/Y') . " <br> ";
        $dataAtual->add(new DateInterval('P1D')); // Adiciona 1 dia
    }
}

// Exemplo de uso //DATA INICIO , //DATA FINAL
listarDatas('02-04-2024', '05-04-2024');
?>
