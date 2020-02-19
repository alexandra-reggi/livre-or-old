<!DOCTYPE html>
<?php
    session_start(); // lorsqu'on est connecté, l'ordi nous reconnait toujours lorsqu'on change de pages//
?>


<html>

    <head>
        <title>livre-or</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href="connexion.css"> 
    </head>

        
<body>

    <?php
    include("barrenav.php");//j'ai au prealable crée sur un autre fichier une barre nav qui change selon si je suis connecté ou non//
    ?> 

    <main>
        <section>
            <article id="align">  
                <p><strong> Connectez-vous à </p><p id="nom"> "PROTECT ANIMAL"</strong></p>
            </article>
        </section>

        <section>

            <article id="imgcarotte">
                <img id="carotte" src="carrotte1.png">
            </article>
          

            <article id="form-img">
                <form id="form1" method ="POST">
                    <label>Login</label><br>
                    <input type ="text" name ="login" placeholder ="Entrez votre login"/><br><br>
                    <label>Password</label><br>
                    <input type="passeword" name="password" placeholder=" Entrez votre password"/><br><br>
                    <input type = "submit" value="connexion" name="submit"/>
                </form> 
            </article>

        </section>
    </main>

<?php

$connexion= mysqli_connect("localhost","root","","livreor");

$requete= "select * from utilisateurs";

$query= mysqli_query($connexion, $requete);

$resultat= mysqli_fetch_all($query);


if(isset($_POST['submit'])){
 
    $login= $_POST['login']; //le login sera ce qui sera rentré par le client//
    $password=  password_hash ($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12)); // le password   sera   "       "        "   //
    


    if(!empty($login) && !empty ($password)){ //Si les champs ne sont pas vides//
       
        $requete2= "select * from utilisateurs WHERE login = '$login'"; //je prépare ce que je vais demander (donc ma requet) savoir si à cet emplacement dans la base de donnée si login et pass sont dejà existants//

        $query2= mysqli_query($connexion, $requete2); //j'envoie la demande (donc la requete)//

        $resultat2= mysqli_fetch_all($query2); //je recupere le resultat//

        if(!empty($resultat2)){ // donc si resultat2 n'est pas vide c'est à dire qu'il existe dans la bbd//
            $_SESSION['login'] = $login;
           
            header('Location: connexion.php');// ici le client reste sur la même page lorsqu'il est connecté//
            
        }
            else{
                echo "Désolé nous n'avons pas pu vous identifier";
            }
    }
    else{
       echo "Veuillez remplir tous les champs";
    }
    
} 

if (isset ($_SESSION['login'])){
    echo "bienvenue";    
}

 if (isset($_GET['disconnect'])){ //Dès qu'il se deconnecte//
     session_destroy();
     header("location:index.php");//il est redirigé sur cette page, ici par exemple c'est tjrs la même//
 }

?>
           
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
    
</body>
</html>