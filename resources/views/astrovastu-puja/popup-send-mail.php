<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";


/* =========================================
   REQUEST METHOD
========================================= */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: index.html");
    exit;

}


/* =========================================
   HONEYPOT PROTECTION
========================================= */

if (!empty($_POST['website'])) {

    header("Location: thankyou.php");
    exit;

}


/* =========================================
   GET FORM DATA
========================================= */

$name = trim($_POST['name'] ?? '');

$phone = trim($_POST['phone'] ?? '');

$service = trim($_POST['service'] ?? '');

$time_preference = trim($_POST['time_preference'] ?? '');


/* =========================================
   VALIDATION
========================================= */

if (
    $name === '' ||
    $phone === '' ||
    $service === '' ||
    $time_preference === ''
) {

    die("Please fill all required fields.");

}


if (!preg_match('/^[0-9]{10}$/', $phone)) {

    die("Please enter a valid 10-digit phone number.");

}


/* =========================================
   PHPMailer
========================================= */

$mail = new PHPMailer(true);


try {


    /* =====================================
       SMTP SETTINGS
    ===================================== */

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = true;

    $mail->Username = 'ebrandpromotech1@gmail.com';

    /*
       Yahan Gmail ka 16-digit APP PASSWORD
       paste karna hai.
    */

    $mail->Password = 'ktrw gqly ghdi mxyj';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = 587;


    /* =====================================
       SENDER
    ===================================== */

    $mail->setFrom(
        'ebrandpromotech1@gmail.com',
        'AstroVastuPooja Website'
    );


    /* =====================================
       RECEIVERS
    ===================================== */

 /*  $mail->addAddress(
        'ebranddesigner@gmail.com',
        'AstroVastuPooja'
    );*/

    $mail->addAddress(
        'ebrandindia@gmail.com',
        'AstroVastuPooja'
    );


    /* =====================================
       EMAIL FORMAT
    ===================================== */

    $mail->isHTML(true);


    /* =====================================
       SUBJECT
    ===================================== */

    $mail->Subject =
        'Google Lead - Astrology Consultation | AstroVastuPooja';


    /* =====================================
       EMAIL BODY
    ===================================== */

    $safeName = htmlspecialchars($name);

    $safePhone = htmlspecialchars($phone);

    $safeService = htmlspecialchars($service);

    $safeTime = htmlspecialchars($time_preference);


    $mail->Body = '

    <div style="
        font-family:Arial,sans-serif;
        max-width:650px;
        margin:auto;
        color:#333;
    ">

        <div style="
            background:#8B0000;
            padding:18px 20px;
            color:#fff;
        ">

            <h2 style="
                margin:0;
                font-size:22px;
            ">

                New Google Lead - Astrology Consultation

            </h2>

        </div>


        <div style="
            padding:25px 20px;
            background:#fff;
        ">

            <table
                cellpadding="10"
                cellspacing="0"
                border="1"
                style="
                    border-collapse:collapse;
                    width:100%;
                    border-color:#ddd;
                ">


                <tr>

                    <td style="font-weight:bold;">
                        Name
                    </td>

                    <td>
                        ' . $safeName . '
                    </td>

                </tr>


                <tr>

                    <td style="font-weight:bold;">
                        Phone
                    </td>

                    <td>
                        ' . $safePhone . '
                    </td>

                </tr>


                <tr>

                    <td style="font-weight:bold;">
                        Concern
                    </td>

                    <td>
                        ' . $safeService . '
                    </td>

                </tr>


                <tr>

                    <td style="font-weight:bold;">
                        Time Preference
                    </td>

                    <td>
                        ' . $safeTime . '
                    </td>

                </tr>


                <tr>

                    <td style="font-weight:bold;">
                        Source
                    </td>

                    <td>
                        Google Lead
                    </td>

                </tr>


                <tr>

                    <td style="font-weight:bold;">
                        Website
                    </td>

                    <td>
                        astrovastupooja.com/lp/astrodhiraj
                    </td>

                </tr>


            </table>


            <p style="
                margin-top:20px;
                color:#777;
                font-size:13px;
            ">

                This enquiry was submitted through the
                AstroVastuPooja consultation form.

            </p>

        </div>

    </div>

    ';


    /* =====================================
       PLAIN TEXT VERSION
    ===================================== */

    $mail->AltBody =

        "New Google Lead - Astrology Consultation\n\n" .

        "Name: " . $name . "\n" .

        "Phone: " . $phone . "\n" .

        "Concern: " . $service . "\n" .

        "Time Preference: " . $time_preference . "\n\n" .

        "Source: Google Lead\n" .

        "Website: https://www.astrovastupooja.com/lp/astrodhiraj";


    /* =====================================
       SEND EMAIL
    ===================================== */

    $mail->send();


    /* =====================================
       REDIRECT
    ===================================== */

    header("Location: thankyou-popup.html");

    exit;


} catch (Exception $e) {

    echo "Something went wrong. Please try again later.";

}