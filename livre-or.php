<!DOCTYPE html>
<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "livreor");
$requete = "SELECT*FROM commentaires ORDER by id DESC";
$resultat = mysqli_query($connexion, $requete);
if (isset($_SESSION['login']))
			{
			
			} else header('location: connexion.php');

?>

<html>

    <head>
        <title>livre-or</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href="livre-or.css">
    </head>

        
<body>
<?php
    include("barrenav.php");
    ?> 

<main>

    <section>
        <article id="align">  
            <p><strong>Bienvenue sur le livre d'or de </p><p id="nom">"PROTECT ANIMAL"</strong></p>
        </article>      
    </section>

    <?php
         while($data1 = mysqli_fetch_array($resultat))
         {
                
    ?>
                      
    <section id="container">
        <article id="split">
            <box-sizing><p id="texte"> 
            <?php
                $requete = "SELECT login FROM utilisateurs WHERE id = '".$data1['id-utilisateur']."'";
                $query = mysqli_query($connexion, $requete);
                $data2 = mysqli_fetch_assoc($query);
                                            
                    echo "Posté le: ", $data1['date']," par ", $data2['login'], "";
            ?>
            <?php echo $data1['commentaire']; ?></p></box-sizing>
           
        </article>
    </section>

    <?php
         }
                            
    ?>

 <?php   
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
        <p>Sieges social Rue Montreuil PARIS 75014<br> Siren 648328822774 | Siret 6483874678. </p>
    </article>
  
</footer>

</html>