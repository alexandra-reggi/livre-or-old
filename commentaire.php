<?php 
session_start();

?>

<!DOCTYPE html>
<html>

    <head>
        <title>livre-or</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href="commentaire.css">
    </head>

        
<body>
<?php
    include("barrenav.php");
    ?> 

<main>

<?php
   $connexion= mysqli_connect("localhost","root","","livreor");
 $login = $_SESSION['login'];
    if (isset($_SESSION['login'])){
        if (isset($_POST['submit'])){
       $requete= "SELECT * FROM utilisateurs WHERE login='".$login."'";
       $query= mysqli_query($connexion,$requete);
       $resultat= mysqli_fetch_all($query);
       
            

      $message =$_POST['message'];
      $iduser =$resultat[0][0];
       $requete2= "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$message', '$iduser', NOW())"; 
       $query2=  mysqli_query($connexion,$requete2);
       header('location: livre-or.php');
        }
    

     ?>   
    <section>
        <article id="align">  
            <p><strong> Laissez un commentaire sur</p><p id="nom"> "PROTECT ANIMAL"</strong></p>
        </article>
    </section>

    <section>
        <form method="post">
                <article  id="zonecom">
                    <textarea class="text" cols="40" rows="15" name="message" placeholder="Votre commentaire"></textarea>
                </article>

                    <article id="zonevalid"> 
                        <input class="text" type="submit" valeur="valider" name="submit"/>
                    </article>
        </form>
    </section>
    <?php
    }

    else{
        echo "<h1 id='phrase'>Pour laisser un commentaire vous devez etre connecté <a href='connexion.php'> CONNECTE</a></p>";
    }
    if (isset($_GET['disconnect'])){ 
        session_destroy();
        header("location:index.php");
    }
?>

</main>

<footer id="logo">

    <article>
        <p>Copyright 2019-2020 | All by Rights Reserved.</p>
    </article>

        <article>
            <img height="60" src="footeror.webp">
        </article>

    <article>
        <p>Sieges social Rue Montreuil PARIS 75014<br> Siren 648328822774 | Siret 6483874678.</p>
    </article>
  
</footer>