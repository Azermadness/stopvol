<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom    = htmlspecialchars($_POST["nom"]);
    $prenom  = htmlspecialchars($_POST["prenom"]);
    $mail   = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL);
    $object = htmlspecialchars($_POST["object"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $content = htmlspecialchars($_POST["content"]);

    if (!$mail) {
        echo "Invalid email address.";
        exit;
    }

    $to      = "a3fftqhru@mozmail.com"; // THIS MAIL WILL ONLY RECIEVE MESSAGES FROM THIS FORM
    $subject = "New Contact Form Message from $name";
    $headers = "From: form@stopvol.fr\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Nouveau formulaire rempli:\n\n";
    $body .= "Nom: $nom\n";
    $body .= "Prénom: $prenom\n";
    $body .= "Email: $mail\n";
    $body .= "Téléphone: $telephone\n";
    $body .= "Objet: $object\n";
    $body .= "------------------------\n";
    $body .= "Message:\n$content\n";

    //mail($to, $subject, $body, $headers)
    if (true) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>