<?php

function dd($p = []) {
    echo "<pre>";
    print_r($p);
    echo "</pre>";
}

function redirect($url) {
    header("Location: " . $url);
}

function searchCEP($cep) {
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
}
