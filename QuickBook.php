<?php
// Include PHPMailer files
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $travel_plan = htmlspecialchars($_POST['travel_plan']);
    $accommodation_type = htmlspecialchars($_POST['accommodation_type']);
    $planning_progress = htmlspecialchars($_POST['planning_progress']);
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Email server settings
        $mail->isSMTP();
        $mail->Host = 'server208.web-hosting.com'; // Set SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'info@rnfocustours.com'; // Your email
        $mail->Password = '#Rnfocus#2025'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom('info@rnfocustours.com', 'Rn Focus Tours');
        $mail->addAddress('info@rnfocustours.com', 'Rn Focus Tours');

        $mail->isHTML(true);
        $mail->Subject = 'New Quick Tour Booking Request';

        // Modern & Minimal Email Template
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0; border-radius: 8px;'>
            <!-- Header -->
            <div style='background-color: #007BFF; color: white; padding: 20px; text-align: center; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
                <h1 style='margin: 0; font-size: 24px;'>Rn Focus Tours</h1>
                <p style='margin: 0; font-size: 14px;'>New Quick Tour Booking Request</p>
            </div>

            <!-- Booking Details -->
            <div style='padding: 20px;'>
                <h2 style='font-size: 20px; color: #333;'>Booking Details</h2>
                <p style='font-size: 14px; color: #555;'><strong>Name:</strong> $name</p>
                <p style='font-size: 14px; color: #555;'><strong>Email:</strong> $email</p>
                <p style='font-size: 14px; color: #555;'><strong>Telephone:</strong> $telephone</p>
                <p style='font-size: 14px; color: #555;'><strong>Travel Plan:</strong> $travel_plan</p>
                <p style='font-size: 14px; color: #555;'><strong>Accommodation Type:</strong> $accommodation_type</p>
                <p style='font-size: 14px; color: #555;'><strong>Planning Progress:</strong> $planning_progress</p>
            </div>

            <!-- Footer -->
            <div style='background-color: #f9f9f9; padding: 15px; text-align: center; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
                <p style='font-size: 12px; color: #777; margin: 0;'>Email service provided by <strong>IdeaEigs</strong></p>
                <p style='font-size: 12px; color: #aaa; margin: 0;'>&copy; " . date('Y') . " Rn Focus Tours. All rights reserved.</p>
            </div>
        </div>
        ";

        // Send email
        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
