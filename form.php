<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['captcha_code']) {
        echo "Captcha verification failed!";
        exit;
    }

    $name = htmlspecialchars($_POST['Name']);
    $phone = htmlspecialchars($_POST['Phone Number']);
    $email = htmlspecialchars($_POST['Email']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'https://drritubhandari.in/'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'enquiry@drritubhandari.in'; // Replace with your email
        $mail->Password = 'OTy7}Y$%#-te'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Appointment Request';
        $mail->Body = "<h3>Appointment Details</h3>
                      <p><strong>Name:</strong> $name</p>
                      <p><strong>Phone:</strong> $phone</p>
                      <p><strong>Email:</strong> $email</p>";

        $mail->send();
        echo 'Message has been sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request!";
}
?>
