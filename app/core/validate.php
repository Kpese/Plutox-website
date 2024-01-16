<?php
namespace App\core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Validate{
public static function sendConfirmation($email, $name) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'plutox86@gmail.com'; // Your Gmail email address
        $mail->Password   = 'sonnspfsasokxbbl'; // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     
        $mail->Port = 465;

        // Sender and recipient settings
        $mail->setFrom('plutox86@gmail.com', 'PlutoX');
        $mail->addAddress($email, $name);
        
        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to PlutoX';
        $mail->Body    = "Dear $name, <br><br>
        <p>Welcome to PlutoX, your go-to destination for honest and insightful movie reviews! We're thrilled to have you on board. 🎉 </p>
        <p>At PlutoX, we believe in delivering high-quality reviews to help you make informed decisions before diving into your next movie experience.</p>
        <p>Whether you're a film buff or just looking for a great flick, we've got you covered.</p>
        <p> Here's what you can expect from PlutoX:</p>
        <ul>
        <li> Comprehensive Reviews: Our team of experts provides in-depth analyses of the latest releases, helping you choose the perfect movie for your mood.</li>
        <li> User-Friendly Platform: Easily navigate through our website to discover reviews, ratings, and recommendations tailored to your preferences.</li>
        <li>Secure Movie Downloads: Once you've found the perfect movie, enjoy hassle-free and secure downloads to enhance your entertainment experience.</li>
        </ul>
        <p>We appreciate your trust in PlutoX, and we're excited to embark on this cinematic journey with you! If you have any questions or suggestions, feel free to reach out to our support team.</p>
        <p>Stay tuned for the latest reviews and updates. Lights, camera, action!</p>
        <p>Best regards,</p>
        <p>The PlutoX Team</p>
        <p>[PlutoX Logo]</p>
          
        <p>P.S. Start exploring PlutoX today: [http://localhost/plutox/public/movies]</p>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
}
?>
