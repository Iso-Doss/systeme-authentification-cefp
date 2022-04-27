<?php
$email = "";
$mot_de_passe = "";

$erreurs = [];
$message_success = "";
$informations = [];

if(isset($_POST["email"])  && !empty($_POST["email"])){
    $email = $_POST["email"];
    $informations["email"] = $_POST["email"];
    $email_valide = filter_var($email, FILTER_VALIDATE_EMAIL);
    if(!$email_valide){
        $erreurs["email"] = "Le champs email n'est pas valide. Veuillez réesayer!";
    }
}else{
    $erreurs["email"] = "Le champs email est requis. Veuillez réesayer!";
}

if(isset($_POST["mot-de-passe"])  && !empty($_POST["mot-de-passe"])){
    $mot_de_passe = $_POST["mot-de-passe"];
    $informations["mot-de-passe"] = $_POST["mot-de-passe"];
}else{
    $erreurs["mot-de-passe"] = "Le champs mot de passe est requis. Veuillez réesayer!";
}

// if(!$email_valide){
//     $erreurs["email"] = "Le champs email n'est pas valide. Veuillez réesayer!";
// }

header("location: connexion.php?erreurs=" . json_encode($erreurs) . "&informations=". json_encode($informations));

//var_dump($erreurs);
