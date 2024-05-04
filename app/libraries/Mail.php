<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require APPROOT . '/libraries/mail/src/Exception.php';
require APPROOT . '/libraries/mail/src/PHPMailer.php';
require APPROOT . '/libraries/mail/src/SMTP.php';
class Mail
{
    public $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to 0 for production
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'routeready.info@gmail.com'; // SMTP username
        $this->mail->Password = 'cuak amkt obvc zkpb'; // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }
    public function send($to, $subject, $body)
    {
        try {
            $this->mail->setFrom('routeready.info@gmail.com', 'RouteReady');
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
