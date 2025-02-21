<?php
// Include PHPMailer files
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $packageName = htmlspecialchars($_POST['package_name']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $checkin = htmlspecialchars($_POST['checkin']);
    $checkout = htmlspecialchars($_POST['checkout']);
    $adults = htmlspecialchars($_POST['adults']);
    $children = htmlspecialchars($_POST['children']);
    $message = htmlspecialchars($_POST['message']);
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Email server settings
        $mail->isSMTP();
        $mail->Host = 'server208.web-hosting.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@rnfocustours.com';
        $mail->Password = '#Rnfocus#2025';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom('info@rnfocustours.com', 'Rn Focus Tours');
        $mail->addAddress('info@rnfocustours.com', 'Rn Focus Tours');

        $mail->isHTML(true);
        $mail->Subject = 'New Tour Package Booking Request';

        // Email Template with Package Name
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0; border-radius: 8px;'>
            <div style='background-color: #007BFF; color: white; padding: 20px; text-align: center; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                <h1 style='margin: 0; font-size: 24px;'>Rn Focus Tours</h1>
                <p style='margin: 0; font-size: 14px;'>New Tour Package Booking Request</p>
            </div>

            <div style='padding: 20px;'>
                <h2 style='font-size: 20px; color: #333;'>Booking Details</h2>
                <p style='font-size: 14px; color: #555;'><strong>Package Name:</strong> $packageName</p>
                <p style='font-size: 14px; color: #555;'><strong>Name:</strong> $name</p>
                <p style='font-size: 14px; color: #555;'><strong>Email:</strong> $email</p>
                <p style='font-size: 14px; color: #555;'><strong>Phone:</strong> $phone</p>
                <p style='font-size: 14px; color: #555;'><strong>Check-in Date:</strong> $checkin</p>
                <p style='font-size: 14px; color: #555;'><strong>Check-out Date:</strong> $checkout</p>
                <p style='font-size: 14px; color: #555;'><strong>Adult Count:</strong> $adults</p>
                <p style='font-size: 14px; color: #555;'><strong>Child Count:</strong> $children</p>
                <p style='font-size: 14px; color: #555;'><strong>Message:</strong> $message</p>
            </div>

            <div style='background-color: #f9f9f9; padding: 15px; text-align: center; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                <p style='font-size: 12px; color: #777; margin: 0;'>Email service provided by <strong>IdeaEigs</strong></p>
                <p style='font-size: 12px; color: #aaa; margin: 0;'>&copy; " . date('Y') . " Rn Focus Tours. All rights reserved.</p>
            </div>
        </div>
        ";

        // Send email
        $mail->send();
        echo "success"; // Response for AJAX
    } catch (Exception $e) {
        echo "error"; // Response for AJAX
    }
} else {
    echo "Invalid request.";
}
?>
