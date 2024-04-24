<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie que tous les champs sont présents et non vides
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) &&
        !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

        // Récupère les données du formulaire
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Adresse email où vous souhaitez recevoir les messages
        $to = "samuelralaikoa@gmail.com";

        // Sujet du message
        $subject = "Nouveau message de la part de $name";

        // Corps du message
        $body = "Nom: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message:\n$message";

        // En-têtes du message
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            // Affiche un message de succès si l'email a été envoyé avec succès
            echo "Votre message a été envoyé avec succès.";
        } else {
            // Affiche un message d'erreur si l'envoi de l'email a échoué
            echo "Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer.";
        }
    } else {
        // Affiche un message d'erreur si tous les champs ne sont pas remplis
        echo "Veuillez remplir tous les champs du formulaire.";
    }
} else {
    // Affiche un message d'erreur si le formulaire n'a pas été soumis via la méthode POST
    echo "Une erreur s'est produite. Veuillez soumettre le formulaire à nouveau.";
}
?>
