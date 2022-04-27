<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Systeme d'authentification</title>
</head>
<body>

<div class="container">

    <?php

        if(isset($_GET["erreurs"]) && !empty($_GET["erreurs"])){
            $erreurs_decode = json_decode($_GET["erreurs"], true);
            if(!empty($erreurs_decode)){
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                            foreach($erreurs_decode as $erreur){
                                echo "<li>$erreur</li>"; 
                            }
                        ?>
                    </div>
                <?php
            }
        }

        if(isset($_GET["informations"]) && !empty($_GET["informations"])){
            $informations_decode = json_decode($_GET["informations"], true);
            var_dump($informations_decode);
        }



    ?>

    <form action="traitement_connexion.php" method="POST" novalidate>

        <div class="group-form mb-3">

            <label for="email" class="form-label">Email:</label>

            <input type="email" id="email" class="form-control" name="email" placeholder="Veuillez saisir votre adresse email" 
            value="<?= (isset($informations_decode["email"]) && !empty($informations_decode["email"])) ? $informations_decode["email"] : '' ;?>"
            required>
                
            <?php
                if(isset($erreurs_decode["email"]) && !empty($erreurs_decode["email"])){

                    echo '<p class="text-danger">' . $erreurs_decode["email"] . '</p>';

                }
            ?>
            

        </div>

        <div class="group-form mb-3">

        <?php

        $mot_de_passe = "";

            if (isset($informations_decode["mot-de-passe"]) && !empty($informations_decode["mot-de-passe"])){
                $mot_de_passe = $informations_decode["mot-de-passe"];
            }

        ?>

            <label for="mot-de-passe" class="form-label">Mot de passse:</label>

            <input type="password" id="mot-de-passe" class="form-control" name="mot-de-passe" placeholder="Veuillez saisir votre mot de passe"

            value="<?= $mot_de_passe ;?>"
            required>

            <?php
                if(isset($erreurs_decode["mot-de-passe"]) && !empty($erreurs_decode["mot-de-passe"])){

                    echo '<p class="text-danger">' . $erreurs_decode["mot-de-passe"] . '</p>';
                    
                }
            ?>

        </div>

        <div class="group-form mb-3">

            <input type="reset" class="btn btn-danger" value="Annuler">

            <input type="submit" class="btn btn-success" value="Se connecter">

        </div>

    </form>

</div>
    
</body>
</html>