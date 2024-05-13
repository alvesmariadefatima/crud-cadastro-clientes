<?php

use PHPMailer\PHPMailer\PHPMailer;

function enviar_email($destinatario, $assunto, $mensagemHTML) {
  require 'vendor/autoload.php';

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 0;
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Username = 'mnunesalves334@gmail.com';
  $mail->Password = 'mfnal1234';
  $mail->setFrom("contato.artmartins@gmail.com", "ART Martins");
  $mail->addAddress($destinatario);
  $mail->isHTML(true);
  $mail->Subject = $assunto;
  $mail->Body = $mensagemHTML;
  $enviado = $mail->send();
  $mail->clearAllRecipients();
  $mail->clearAttachments();

  if ($enviado) {
    return true;
  } else {
    return false;
  }
}

?>