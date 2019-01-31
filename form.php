<?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
                         $nombreErreur = 0; // Variable qui compte le nombre d'erreur
            // Définit toutes les erreurs possibles
            if (!isset($_POST['mail'])) { // Si la variable "email" du formulaire n'existe pas (il y a un problème)
                $nombreErreur++; // On incrémente la variable qui compte les erreurs
                $erreur1 = '<p>Il y a un problème avec la variable "email".</p>';
            } else { // Sinon, cela signifie que la variable existe (c'est normal)
                if (empty($_POST['mail'])) { // Si la variable est vide
                    $nombreErreur++; // On incrémente la variable qui compte les erreurs
                    $erreur2 = '<p>Vous avez oublié de donner votre email.</p>';
            } else {
                if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $nombreErreur++; // On incrémente la variable qui compte les erreurs
                    $erreur3 = '<p>Cet email ne ressemble pas un email.</p>';
            }
        }
    }
 
            if (!isset($_POST['message'])) {
                $nombreErreur++;
                $erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
            } else {
                if (empty($_POST['message'])) {
                    $nombreErreur++;
                    $erreur5 = '<p>Vous avez oublié de donner un message.</p>';
                }
            }
            
            if (!isset($_POST['captcha'])) {
                $nombreErreur++;
                $erreur6 = '<p>Il y a un problème avec la variable "captcha".</p>';
            } else {
                if ($_POST['captcha']!=4) {
                    // Vérifier que le résultat de l'équation est égal à 4
                    $nombreErreur++;
                    $erreur7 = '<p>Désolé, le captcha anti-spam est erroné.</p>';
                }
            }
            
            if ($nombreErreur==0) {
            // Code PHP pour traiter l'envoie du mail
                    
            
            // Récupération des variables et sécurisation des données
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $mail = htmlentities($_POST['mail']);
            $contact = htmlentities($_POST['contact']);
            $message = htmlentities($_POST['message']);
            
            // Variables concernant l'email
            
            $receveur = 'Akya311@gmail.com'; // Adresse email du receveur - temporaire, à supprimer et modifier avec pascal
            $sujet = 'Message de Passerelle Numerique'; // Titre de l'email
            $contenu = '<html><head><title>Message de Passerelle Numerique</title></head><body>';
            $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web: Passerelle numerique.</p>';
            $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
            $contenu .= '<p><strong>Prenom</strong>: '.$prenom.'</p>';
            $contenu .= '<p><strong>Email</strong>: '.$mail.'</p>';
            $contenu .= 'Value du destinataire :'.$destinataire;
            $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
            $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
            
              // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
            $headers = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
 
            // Envoyer l'email
            mail($receveur, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
            echo '<h2>Message envoyé!</h2>'; // Afficher un message pour indiquer que le message a été envoyé
            // Fin du code pour traiter l'envoi de l'email
            
            } else { // S'il y a un moins une erreur
                echo '<br><div style="border:1px solid #ff0000; padding:5px;">';
                echo '<p style="color:#ff0000;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
                if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
                if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
                if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
                if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
                if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
                if (isset($erreur6)) echo '<p>'.$erreur6.'</p>';
                if (isset($erreur7)) echo '<p>'.$erreur7.'</p>';
                echo '</div>';
  }
        }
    ?>