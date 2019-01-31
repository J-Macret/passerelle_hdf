<?php


$errors = [];
$emails = ['contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev', 'contact@local.dev',];

if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {
    $errors['name'] = "Vous n'avez pas renseigné votre nom";
}
if(!array_key_exists('surname', $_POST) || $_POST['surname'] == '') {
    $errors['surname'] = "Vous n'avez pas renseigné votre prénom";
}
if(!array_key_exists('mail', $_POST) || $_POST['mail'] == '' || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $errors['mail'] = "Vous n'avez pas renseigné un e-mail valide";
}
if(!array_key_exists('message', $_POST) || $_POST['message'] == '') {
    $errors['message'] = "Vous n'avez pas renseigné votre message";
}
if(!array_key_exists('contact', $_POST) || !isset($emails[$_POST['contact']])) {
    $errors['contact'] = "Le destinataire que vous demandez n'existe pas";
}

    session_start();


if(!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST; //Afin que l'utilisateur ne perde pas ce qu'il a renseigné dans le formulaire en cas d'erreur.

    header('Location: contact.php');
}else{
    $_SESSION['success'] = 1;
    $headers = 'FROM: ' . $_POST;
    
    mail($emails[$_POST['contact']], 'Formulaire de contact de ' . $_POST['name'], $_POST['message'], $headers);
    header('Location: index.html');
}
