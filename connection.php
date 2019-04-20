<?php

$connection = new mysqli("localhost","root","","bleez_produtos");

if ($connection->connect_error) {
    die("Conexão Falha : " . $connection->connect_error);
}