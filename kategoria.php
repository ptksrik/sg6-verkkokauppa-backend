<?php

require_once 'inc/functions.php';
require_once 'inc/headers.php';




// lue parametrit URLIsta
$url = parse_url(filter_input(INPUT_SERVER, 'PATH_INFO', FILTER_SANITIZE_NUMBER_INT), PHP_URL_PATH);
// Parametrit erotellaan /ssilla
$parametrit = explode('/',$url);
// kategoria on ensimmäinen parametri,joka seuraa osoitteen jälkeen ja eroteltu: /
$kirjakategoria_id = $parametrit[0];

try {
    $db = opendb();
    jsonFactory($db,"select * from kirjakategoria where kategoriaNro = $kirjakategoria_id");

} catch (PDOException $pdoex) {
    returnError($pdoex);
};