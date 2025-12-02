<?php

$predmetiString = file_get_contents(__DIR__ . "/predmeti.json");
$predmeti = json_decode($predmetiString, true);

$filter = $_GET['filter'] ?? '';
?>