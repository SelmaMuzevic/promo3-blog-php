<?php 
    if(isset($_POST['pseudo']) 
        && isset($_POST['mdp'])){
            //On stock les infos du form en variable
        $pseudo = $_POST['pseudo'];
        $mdp = md5($_POST['mdp']);
        //un utilisateur existe si le fichier correspondant
        //existe (on teste avec is_file)
        if(is_file('utilisateur/'.$pseudo.'.txt')){
            //On récupère le contenu du fichier, le mdp crypté
            $contenu = file_get_contents('utilisateur/'.$pseudo.'.txt');
            //Si le contenu correspond au mdp entré par
            //l'utilisateur, la connexion est effective
            if($contenu == $mdp) {
                //On lance la session
                session_start();
                //On stock le nom de l'utilisateur dans celle ci
                $_SESSION['utilisateur'] = $pseudo;
                echo 'vous êtes bien connecté.e';
            }else{
                //sinon messages d'erreur
                echo 'l\'utilisateur ou le mdp n\'existe pas';
            }
            

        } else {
                //sinon messages d'erreur
            echo 'l\'utilisateur ou le mdp n\'existe pas';
        }
    }

?>
<a href="index.php">Retour</a>