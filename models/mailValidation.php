<?php
require '../libraries/phpmailer/Exception.php';
require '../libraries/phpmailer/PHPMailer.php';
require '../libraries/phpmailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;

function sendActivationMail($activation_code,$mailAdress,$prenom,$nom){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mail'; 
    $mail->Password = 'password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('mail', 'name');



    $mail->addAddress($mailAdress, $prenom." ".$nom);
    $mail->Subject = 'Validez votre compte';
    $mail->isHTML(true);
    $mail->CharSet = "UTF-8";
    $mailContent = "
    <h1>Code de confirmation</h1>
    <p>Bonjour $prenom, voici votre lien de confirmation pour activer votre compte ESIEAsso.</p>
    <a href='http://localhost/validate?mail=$mailAdress&activation_code=$activation_code'>Cliquez ici pour valider votre compte</a>
    <p>Si ce lien ne fonctionne pas, entrez le code suivant : $activation_code</p>
    <p>Ce  lien expire dans 24h.</p>
    <p>Si vous n'êtes pas à l'origine de cette demande, veuillez ignorer ce mail.</p>
    ";

    $mail->Body = $mailContent;

    if(!$mail->send()){
        
        echo 'Message could not be sent.';
        
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        
    }
}
?>