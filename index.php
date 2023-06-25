<?php
$dataAtual = new DateTime();  // Cria um objeto DateTime com a data atual

$dataAtual->add(new DateInterval('P5D'));  // Adiciona um intervalo de 5 dias à data atual

echo $dataAtual->format('Y-m-d');