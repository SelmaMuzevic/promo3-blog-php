<?php
/*
On vérifie d'une manière ou d'une autre si on
a bien les informations du formulaire
*/
        if(!isset($_POST['titre']) 
        && !isset($_POST['contenu'])) {
            //Si jamais le titre ou le contenu
            //n'existe pas on affiche un message
            echo '<p>formulaire non envoyé</p>';
            //et on quitte le script
            exit(1);
        }
        //On stock les informations du formulaire
        //dans des variables

        /*
        NE JAMAIS FAIRE CONFIANCE AUX DONNEES UTILISATEUR
        Toute information contenu dans un $_POST, dans
        un $_GET, dans un $_COOKIE est potentiellement
        néfaste pour notre application.
        Il est donc absolument essentiel d'échapper ces
        valeurs avant de les utiliser.
        Plusieurs fonctions existent pour cela. Elles
        ne font pas exactement la même chose mais
        dans les grandes lignes, utiliser l'une ou l'autre.
        */

        // $_GET = filter_input_array(INPUT_GET, 
        // FILTER_SANITIZE_STRING);
        // $_POST = filter_input_array(INPUT_POST, 
        // FILTER_SANITIZE_STRING);
        // $titre = filter_input(INPUT_POST, 
        // 'titre', FILTER_SANITIZE_URL);
        // $contenu = filter_input(INPUT_POST, 
        // 'contenu', FILTER_SANITIZE_SPECIAL_CHARS);
        $titre = htmlspecialchars($_POST['titre']);
        $contenu = htmlspecialchars($_POST['contenu']);
        //On vérifie si le dossier posts existe
        if(!is_dir('posts')) {
            //si non, on le crée
            mkdir('posts');
        }
        //On ouvre un fichier avec fopen en lui
        //donnant en premier argument le chemin
        //du fichier en question et en deuxième
        //argument les droits d'ouverture du
        //fichier (lecture seule, ecriture etc.)
        $fichier = fopen('posts/' . $titre 
        . '.txt', 'w');
        //On met le contenu dans le fichier avec
        //fwrite qui prend le fichier en premier
        //argument et le contenu en deuxième
        fwrite($fichier, $contenu);
        //On ferme le fichier pour ne pas monopoliser
        //la ressource avec le script
        fclose($fichier);
        //On affiche un petit message de succès
        echo '<p>bravo tu as écrit un fichier</p>';


?>