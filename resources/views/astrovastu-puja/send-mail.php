<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}


/* =========================
   Honeypot Protection
========================= */

if (!empty($_POST['website'])) {
    header("Location: thankyou.html");
    exit;
}


/* =========================
   Get Form Data
========================= */

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$service = trim($_POST['service'] ?? '');
$message = trim($_POST['message'] ?? '');


/* =========================
   Validation
========================= */

if ($name === '' || $phone === '' || $service === '') {

    die("Please fill all required fields.");

}

if (!preg_match('/^[0-9]{10}$/', $phone)) {

    die("Please enter a valid 10-digit phone number.");

}


/* =========================
   PHPMailer
========================= */

$mail = new PHPMailer(true);

try {

    /* SMTP */

    $mail->isSMTP();

    $mail->Host       = 'smtp.gmail.com';

    $mail->SMTPAuth   = true;

    $mail->Username   = 'ebrandpromotech1@gmail.com';

    $mail->Password   = 'ktrw gqly ghdi mxyj';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port       = 587;


    /* Sender */

    $mail->setFrom(
        'ebranddesigner@gmail.com   ',
        'AstroVastuPooja Website'
    );



/* =========================
   Receiver
========================= */

 /*  $mail->addAddress(
        'ebranddesigner@gmail.com',
        'AstroVastuPooja'
    );*/
    
$mail->addAddress(
    'ebrandindia@gmail.com',
    'AstroVastuPooja'
);


    /* Email */

    $mail->isHTML(true);

$mail->Subject = 'Google Ads Lead - Astro Dhiraj | Astrology Consultation';

    $mail->Body = '

    <div style="font-family:Arial,sans-serif;">

        <h2 style="color:#8B0000;">
            New Astrology Consultation Enquiry
        </h2>

        <table cellpadding="10" cellspacing="0" border="1"
            style="border-collapse:collapse;width:100%;">

            <tr>
                <td><strong>Name</strong></td>
                <td>' . htmlspecialchars($name) . '</td>
            </tr>

            <tr>
                <td><strong>Phone</strong></td>
                <td>' . htmlspecialchars($phone) . '</td>
            </tr>

            <tr>
                <td><strong>Service</strong></td>
                <td>' . htmlspecialchars($service) . '</td>
            </tr>

            <tr>
                <td><strong>Message</strong></td>
                <td>' . nl2br(htmlspecialchars($message)) . '</td>
            </tr>

        </table>

    </div>

    ';


    $mail->AltBody =
        "New Astrology Consultation Enquiry\n\n" .
        "Name: $name\n" .
        "Phone: $phone\n" .
        "Service: $service\n" .
        "Message: $message";


    /* Send */

    $mail->send();


    /* Redirect */

    header("Location: thankyou.html");

    exit;


} catch (Exception $e) {

    echo "Something went wrong. Please try again later.";

}