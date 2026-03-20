<?php
require_once(__DIR__.'/bootstrap.php');

if ($_POST) {
    $date = now();
    $name = db_input($_POST['name']);
    $msg  = db_input($_POST['message']);

    db_query("INSERT INTO ost_feedback (`name`,`message`) VALUES ($name,$msg)");
}

$to      = 'spherewebgr@gmail.com';
$subject = 'Νέα Υποβολή Ερωτηματολογίου σχετικά με το Support';

$message = '<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial, Helvetica, sans-serif;">';
$message .='<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8;padding:30px 0;">';
$message .='<tr>';
$message .='<td align="center">';
$message .='<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.05);">';
$message .='<tr>';
$message .='<td style="background:#1f3c88;padding:20px;text-align:center;color:#ffffff;font-size:20px;font-weight:bold;">Αποτελέσματα Ερωτηματολογίου</td>';
$message .='</tr>';
$message .='<tr>';
$message .='<td style="padding:30px;">';
$message .='<table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">';

foreach($_POST['rating'] as $key => $value ) {
    switch ($key) {
        case 'question1':
            $question = 'Πόσο ικανοποιημένος/η είστε από την εξυπηρέτηση που λάβατε;';
            break;
        case 'question2':
            $question = "Λύθηκε το πρόβλημά σας;";
            break;
        case 'question3':
            $question = "Πόσο ικανοποιημένος/η είστε από τον χρόνο ανταπόκρισης;";
            break;
        case 'question4':
            $question = "Ήταν η επικοινωνία σαφής και κατανοητή;";
            break;
    }

    $message .= '<tr style="border-bottom:1px solid #e5e7eb;">';
    $message .= '<td style="color:#374151;font-size:14px;">' . $question . '</td>';
    $message .= '<td align="right" style="font-weight:bold;color:#1f3c88;"> ⭐ ' . $value . ' </td>';
    $message .= '</tr>';
}
$message .='</table>';
$message .='<table width="100%" cellpadding="0" cellspacing="0" style="margin-top:25px;">';
$message .='<tr>';
$message .='<td style="font-size:14px;color:#4b5563;line-height:1.6;">'.$_POST['improvements'].'</td>';
$message .='</tr>';
$message .='</table>';
$message .='</td>';
$message .='</tr>';
$message .='<tr>';
$message .='<td style="background:#f9fafb;text-align:center;padding:15px;font-size:12px;color:#6b7280;">© 2026 Customer Support Team - NCSR Demokritos</td>';
$message .='</tr>';
$message .='</table>';
$message .='</td>';
$message .='</tr>';
$message .='</table>';
$message .='</body>';


$headers = 'From: support@egov.demokritos.gr'       . "\r\n" .
    "Content-type:text/html;charset=UTF-8" . "\r\n".
    'X-Mailer: PHP/' . phpversion();



try {
    mail($to, $subject, $message, $headers);
    header('Location: thank-you.html');
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
