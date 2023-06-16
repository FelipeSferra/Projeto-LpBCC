<?php

function dd($p = []) {
    echo "<pre>";
    print_r($p);
    echo "</pre>";
}

function redirect($url) {
    header("Location: " . $url);
}
