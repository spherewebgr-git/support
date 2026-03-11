<?php

$to      = 'spherewebgr@gmail.com';
$subject = 'New Support App Rating';
$message = '<h2>New rating</h2>';
foreach($_POST['rating'] as $key => $value ){

    switch ($key) {
        case 'question1':
            $question = 'Πόσο ικανοποιημένος/η είστε από την εξυπηρέτηση που λάβατε;';
            break;
        case 'question2':
            $question =  "Λύθηκε το πρόβλημά σας;";
            break;
        case 'question3':
            $question = "Πόσο ικανοποιημένος/η είστε από τον χρόνο ανταπόκρισης;";
            break;
        case 'question4':
            $question = "Ήταν η επικοινωνία σαφής και κατανοητή;";
            break;
    }
    $message .= '<p>'.$question.'<strong> '.$value.'</strong></p>';
}
$message .= $_POST['improvements'];
$headers = 'From: support@egov.demokritos.gr'       . "\r\n" .
    "Content-type:text/html;charset=UTF-8" . "\r\n".
    'X-Mailer: PHP/' . phpversion();



try {
    mail($to, $subject, $message, $headers);
    header('Location: thank-you.html');
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
