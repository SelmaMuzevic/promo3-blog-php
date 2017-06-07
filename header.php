<!--A afficher que si l'utilisateur n'est pas
loggé -->
<?php
session_start();
if(isset($_SESSION['utilisateur'])){
    echo '<p>Salut, '.$_SESSION['utilisateur']
        .', ça va ma gueule ?';
}else{
    
?>
<form action="inscription.php" method="POST">
    <label>Pseudo :</label>
    <input type="text" name="pseudo">
    <label>Mot de Passe :</label>
    <input type="password" name="mdp">
    <button>S'inscrire</button>
</form>
<form action="login.php" method="POST">
    <label>Pseudo :</label>
    <input type="text" name="pseudo">
    <label>Mot de Passe :</label>
    <input type="password" name="mdp">
    <button>Connexion</button>
</form>
<?php } ?>
<!--Affiché "salut [utilisateur]" si l'utilisateur
est loggé-->

