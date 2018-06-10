<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = strip_tags( trim( $_POST["name"] ) );
    $name = str_replace( array("\r", "\n"), array(" ", " "), $name );
    $email = filter_var( trim( $_POST["email"] ), FILTER_SANITIZE_EMAIL );
    $message = trim( $_POST["message"] );

    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR !empty( $_POST["anschrift"] )) {
        http_response_code(400);
        echo "Es gab ein Problem bei der Übertragung. Bitte vervollständigen Sie das Formular und versuchen Sie es erneut.";
        exit;
    }

    $recipient = "hello@holhar.de";
    $subject = "Kontaktanfrage über holhar.de";

    $emailContent = "Name: ".$name."\n";
    $emailContent .= "Email: ".$email."\n\n";
    $emailContent .= "Message:\n".$message."\n";

    $emailHeaders = "From: ".$name." <".$email.">";

    if ( mail($recipient, $subject, $emailContent, $emailHeaders) ) {
        http_response_code(200);
        echo "Vielen Dank! Ihre Nachricht wurde versendet.";
    } else {
        http_response_code(500);
        echo "Etwas ist leider schiefgegangen und die Nachricht konnte nicht verschickt werden.";
    }
} else {
    http_response_code(403);
    echo "Es gab ein Problem mit Ihrer Eingabe. Bitte versuchen Sie es erneut.";
}

?>