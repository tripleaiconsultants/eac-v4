<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']); // prevent XSS
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if($email) {
        $to = "e";
        $subject = "Νέο μήνυμα από E.A.C Website";
        $body = "Όνομα: $name\nEmail: $email\nΤηλέφωνο: $phone\nΜήνυμα: $message";

        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n";

        if(mail($to, $subject, $body, $headers)) {
            echo "Ευχαριστούμε! Το μήνυμα στάλθηκε.";
        } else {
            echo "Σφάλμα! Δοκιμάστε ξανά αργότερα.";
        }
    } else {
        echo "Το email δεν είναι έγκυρο.";
    }
} else {
    echo "Μη έγκυρη πρόσβαση.";
}
?>
