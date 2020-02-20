<?php 
session_start()
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
    include("barrenav.php");//j'ai au prealable crée sur un autre fichier une barre nav qui change selon si je suis connecté ou non//
    ?> 

<main>

<?php

    if (isset($_SESSION['login'])){
     ?>   
    <section>
        <article id="align">  
            <p><strong> Laissez un commentaire sur</p><p id="nom"> "PROTECT ANIMAL"</strong></p>
        </article>
    </section>

    <section>
        <article  id="zonecom">
            <textarea id="text" cols="40" rows="20"></textarea>
        <article>
    </section>
    <?php
    }

    else{
        echo "<h1 id='phrase'>Pour laisser un commentaire vous devez etre &nbsp<a href='connexion.php'> CONNECTE</a></p>";
    }
    if (isset($_GET['disconnect'])){ //Dès qu'il se deconnecte//
        session_destroy();
        header("location:index.php");//il est redirigé sur cette page, ici par exemple c'est tjrs la même//
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