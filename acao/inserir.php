<?php

$net = "127.0.0.1"; /* Endereço conexão local */
$name = "root";  /* nome da conexão  */
$pass= "";  /* senha da conexão */
$db = "formulario";  /* nome do banco de dados */


$conn = new mysqli ($net,$name,$pass,$db); 

/* preparando conexão com o banco de dados */

if ($conn -> connect_error){
    die("conexão não encontrada". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['msg'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['msg']);


  
    $stmt = $conn->prepare("INSERT INTO form (nome, email, msg) VALUES (?, ?, ?)"); 
    $stmt->bind_param("sss", $nome, $email, $msg );                          
    if ($stmt->execute()) {
        header("location:../index.php?sucesso=1");
       return $sucesso = "Mensagem enviada com sucesso! <a href='../index.html'>Tela de principal</a>";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }
    




// Fecha a conexão com o banco de dados
$conn->close();





    

}
?>