<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['Name']);
    $phone = htmlspecialchars($_POST['Phone Number']);
    $email = htmlspecialchars($_POST['Email']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // Replace with your email
        $mail->Password = 'your-email-password'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your-email@example.com', 'Your Name'); // Replace with your email & name
        $mail->addAddress('recipient@example.com', 'Recipient Name'); // Replace with recipient email & name

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
