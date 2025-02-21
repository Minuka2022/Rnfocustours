<?php
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'server208.web-hosting.com'; // SMTP server (e.g., smtp.gmail.com)
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@rnfocustours.com'; // Your SMTP email
        $mail->Password   = '#Rnfocus#2025';   // Your SMTP email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('info@rnfocustours.com', 'Rn Focus Tours');
        $mail->addAddress('info@rnfocustours.com'); // Where to send the email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';

        // Updated Email Template
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0; border-radius: 8px;'>
            <!-- Header -->
            <div style='background-color: #007BFF; color: white; padding: 20px; text-align: center; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                <h1 style='margin: 0; font-size: 24px;'>Rn Focus Tours</h1>
                <p style='margin: 0; font-size: 14px;'>New Contact Form Submission</p>
            </div>

            <!-- Booking Details -->
            <div style='padding: 20px;'>
                <h2 style='font-size: 20px; color: #333;'>Contact Details</h2>
                <p style='font-size: 14px; color: #555;'><strong>First Name:</strong> $firstName</p>
                <p style='font-size: 14px; color: #555;'><strong>Last Name:</strong> $lastName</p>
                <p style='font-size: 14px; color: #555;'><strong>Email:</strong> $email</p>
                <p style='font-size: 14px; color: #555;'><strong>Mobile:</strong> $mobile</p>
                <p style='font-size: 14px; color: #555;'><strong>Message:</strong> $message</p>
            </div>

            <!-- Footer -->
            <div style='background-color: #f9f9f9; padding: 15px; text-align: center; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                <p style='font-size: 12px; color: #777; margin: 0;'>Email service provided by <strong>IdeaEigs</strong></p>
                <p style='font-size: 12px; color: #aaa; margin: 0;'>&copy; " . date('Y') . " Rn Focus Tours. All rights reserved.</p>
            </div>
        </div>
        ";

        $mail->send();
        http_response_code(200); // Success
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully!']);
    } catch (Exception $e) {
        http_response_code(500); // Error
        echo json_encode(['status' => 'error', 'message' => 'Message could not be sent.']);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
