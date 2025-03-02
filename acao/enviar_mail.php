<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['msg'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['msg']);


//agora vamos fazer um envio direto para o email.

require '../vendor/autoload.php';


$mail = new PHPMailer(TRUE);


try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'oiginho234@gmail.com'; 
    $mail->Password = '';     //caso deseje testar, entre contato pelo mesmo email acima.   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
 
$mail->setFrom('oiginho234@gmail.com', 'Igor');
$mail->addAddress('oiginho234@gmail.com', 'Igor'); // Destinatário

// Conteúdo do e-mail
$mail->isHTML(true);
$mail->Subject = "Contato do site - $nome";
$mail->Body = "Nome: $nome<br>E-mail: $email<br>Mensagem:<br>$msg";

$mail->send();
echo "Mensagem enviada com sucesso!";
} catch (Exception $e) {
echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
}

}else{

    echo "Insira todos os formulários  <a href='../index.html'>";


}




?>
