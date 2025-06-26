<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = isset($_POST['name']) ? $_POST['name'] : '';
    $email   = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mahardikahafiz889@gmail.com';
        $mail->Password   = 'unir skja mlhh kwhq'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('mahardikahafiz889@gmail.com', 'Website Sekolah');
        $mail->addAddress('mahardikahafiz889@gmail.com');

        $mail->Subject = $subject;
        $mail->Body = "
        Nama Pengirim: $name<br>
        Email Pengirim: $email<br><br>
        Subjek: $subject<br><br>
        Pesan:<br>$message
        ";


        $mail->send();
        echo "Pesan berhasil dikirim!";
    } catch (Exception $e) {
        echo "Pesan gagal dikirim. Error: {$mail->ErrorInfo}";
    }
}
