<?php

namespace app\Modules;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    public PHPMailer $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = trim(getenv('SMTP_HOST'));
        $this->mail->SMTPAuth = true;
        $this->mail->Username = trim(getenv('SMTP_USER'));
        $this->mail->Password = trim(getenv('SMTP_PASS'));
    }

    /**
     * @throws Exception
     */
    public function send(string $fromEmail, string $fromName, string $toEmail, string $toName, string $title, string $message): bool
    {
        $this->mail->setFrom($fromEmail, $fromName);
        $this->mail->addAddress($toEmail, $toName);
        /*
        if (!$filePath && !$fileName) {
            $this->mail->addAttachment($filePath, $fileName);
        }*/
        $this->mail->isHTML(true);
        $this->mail->Subject = $title;
        $this->mail->Body = $message;
        if($this->mail->send())return true;

        return false;
    }
}
