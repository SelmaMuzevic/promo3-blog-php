<?php 
    if(isset($_POST['pseudo']) 
        && isset($_POST['mdp'])){
        $pseudo = $_POST['pseudo'];
        $mdp = md5($_POST['mdp']);

        if(is_file('utilisateur/'.$pseudo.'.txt')){
            $contenu = file_get_contents('utilisateur/'.$pseudo.'.txt');
            if($contenu == $mdp) {
                echo 'vous êtes bien connecté.e';
            }else{
                echo 'le mot de passe n\'est pas bon';
            }
            

        } else {
            echo 'l\'utilisateur '.$pseudo.' n\'existe pas';
        }
    }