<?php
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture and sanitize input fields
    $travel_plan = isset($_POST['travel_plan']) ? htmlspecialchars($_POST['travel_plan']) : '';
    $travel_planning = isset($_POST['travel_planning']) ? htmlspecialchars($_POST['travel_planning']) : '';
    $accommodation_type = isset($_POST['accommodation_type']) ? htmlspecialchars($_POST['accommodation_type']) : '';
    $meals_information = isset($_POST['meals_information']) ? htmlspecialchars($_POST['meals_information']) : '';
    $additional_requirements = isset($_POST['additional_requirements']) ? htmlspecialchars($_POST['additional_requirements']) : '';
    $number_of_adults = isset($_POST['number_of_adults']) ? htmlspecialchars($_POST['number_of_adults']) : '';
    $number_of_children = isset($_POST['number_of_children']) ? htmlspecialchars($_POST['number_of_children']) : '';
    $start_date = isset($_POST['start_date']) ? htmlspecialchars($_POST['start_date']) : '';
    $end_date = isset($_POST['end_date']) ? htmlspecialchars($_POST['end_date']) : '';
    $flight_number = isset($_POST['flight_number']) ? htmlspecialchars($_POST['flight_number']) : '';
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Handling holiday type checkboxes
    $holiday_types_text = 'None';
    if (isset($_POST['holiday_type']) && !empty($_POST['holiday_type'])) {
        $holiday_types = $_POST['holiday_type'];
        if (is_array($holiday_types)) {
            $holiday_types_text = implode(", ", array_map('htmlspecialchars', $holiday_types));
        }
    }

    // Email content
    $subject = "New Trip Planning Request";
    $message = "
    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0; border-radius: 8px;'>
        <div style='background-color: #007BFF; color: white; padding: 20px; text-align: center; border-top-left-radius: 8px; border-top-right-radius: 8px;'>
            <h1 style='margin: 0; font-size: 24px;'>Rn Focus Tours</h1>
            <p style='margin: 0; font-size: 14px;'>New Customized Tour Plan</p>
        </div>
        <div style='padding: 20px;'>
            <h2 style='font-size: 20px; color: #333;'>Booking Details</h2>
            <p style='font-size: 14px; color: #555;'><strong>Name:</strong> $name</p>
            <p style='font-size: 14px; color: #555;'><strong>Email:</strong> $email</p>
            <p style='font-size: 14px; color: #555;'><strong>Travel Plan:</strong> $travel_plan</p>
            <p style='font-size: 14px; color: #555;'><strong>Holiday Types:</strong> $holiday_types_text</p>
            <p style='font-size: 14px; color: #555;'><strong>Accommodation Type:</strong> $accommodation_type</p>
            <p style='font-size: 14px; color: #555;'><strong>Meals Information:</strong> $meals_information</p>
            <p style='font-size: 14px; color: #555;'><strong>Additional Requirements:</strong> $additional_requirements</p>
            <p style='font-size: 14px; color: #555;'><strong>Number of Adults:</strong> $number_of_adults</p>
            <p style='font-size: 14px; color: #555;'><strong>Number of Children:</strong> $number_of_children</p>
            <p style='font-size: 14px; color: #555;'><strong>Start Date:</strong> $start_date</p>
            <p style='font-size: 14px; color: #555;'><strong>End Date:</strong> $end_date</p>
            <p style='font-size: 14px; color: #555;'><strong>Flight Number:</strong> $flight_number</p>
        </div>
        <div style='background-color: #f9f9f9; padding: 15px; text-align: center; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;'>
            <p style='font-size: 12px; color: #777; margin: 0;'>Email service provided by <strong>IdeaEigs</strong></p>
            <p style='font-size: 12px; color: #aaa; margin: 0;'>&copy; " . date('Y') . " Rn Focus Tours. All rights reserved.</p>
        </div>
    </div>";

    // PHPMailer Configuration
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'server208.web-hosting.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@rnfocustours.com';
        $mail->Password = '#Rnfocus#2025';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('info@rnfocustours.com', 'Rn Focus Tours');
        $mail->addAddress('info@rnfocustours.com');
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "success";  // Return plain text for success
    } catch (Exception $e) {
        // Return the error message
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
