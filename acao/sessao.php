<?php


if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["id"])){
    die("Você ainda não fez login para acessar esta pagina. 
    <br> <a href='index.php'>Voltar</a>");
}

?>