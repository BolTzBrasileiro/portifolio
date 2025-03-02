<?php

$net = "127.0.0.1"; /* Endereço conexão local */
$name = "root";  /* nome da conexão  */
$pass= "";  /* senha da conexão */
$db = "user";  /* nome do banco de dados */


$conn = new mysqli ($net,$name,$pass,$db); 

/* preparando conexão com o banco de dados */

if ($conn -> connect_error){
    die("conexão não encontrada". $conn->connect_error);
}


/* Parte com código dash */

    

/* Parte com código dash */

/* Recebendo as escritas inseridas pelo usuários dentro do form action no html*/
if($_SERVER ["REQUEST_METHOD"] = $_POST){
    $nome = htmlspecialchars ($_POST["nome"]); /* recebendo input com nome "nome" */
    $senha = htmlspecialchars($_POST["senha"]); /* recebendo input com nome "senha" */

    if(empty($nome) || empty($senha)){
        die("Preenchimento inválido.");
    } /* Demostra preenchimento inválido se os 2 input estiverem vazios */

    $sql = "SELECT *FROM usuario WHERE nome = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute(); 
    $result = $stmt->get_result();


    /* Verificação se existe o usuário dentro do banco de dados. */
    if($result->num_rows < 1 ){

        echo"Usuário não existe, tente novamente <a href='../login.html'>Voltar</a><br> ou faça cadastro,
        <a href='../cadastrar.html'> Cadastrar </a>";

    }else{
    
    $rows = $result->fetch_assoc();
 
    

                    /* O rows, tá absorvendo a senha dentro do COLCHETE */
    $hashsenha = $rows['senha'];

    if(password_verify($senha, $hashsenha)){

        header("location:../index.html");
      
    }else{

        echo"Login com falha. <a href='../login.html'> Tela de Login </a>" ;
 
    }$stmt->close();
 }
}else{
    echo "Nenhum assoc encontrado";
}
$conn->close();


?>

<!-- 

base 16 -> senhas criptografadas com hash


aprender o conceito de segurança para evitar invasão de hacker, como a senha protegido com criptografia hash ( O básico de tudo )





 -->