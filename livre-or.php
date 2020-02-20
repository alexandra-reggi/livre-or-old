<!DOCTYPE html>
<?php
session_start();
?>
<html>

    <head>
        <title>livre-or</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href="livre-or.css">
    </head>

        
<body>
<?php
    include("barrenav.php");//j'ai au prealable crée sur un autre fichier une barre nav qui change selon si je suis connecté ou non//
    ?> 

<main>

    <section>
        <article id="align">  
            <p><strong>Bienvenue sur le livre d'or de </p><p id="nom">"PROTECT ANIMAL"</strong></p>
        </article>      
    </section>
<?php
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
        <p>Sieges social Rue Montreuil PARIS 75014<br> Siren 648328822774 | Siret 6483874678. </p>
    </article>
  
</footer>