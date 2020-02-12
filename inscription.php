<!DOCTYPE html>
<html>

<head>
    <title>livre-or</title>
        <meta sharset="utf-8">
    <link rel="stylesheet" href="inscription.css">
</head>

        
<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.php"><img id="cr"src="coeur.webp">P.A</a></li>
                <li><a href="connexion.php">CONNEXION</a></li>
                <li id="bas"><a href="inscription.php">INSCRIPTION</a></li>
                <li><a href="profil.php">PROFIL</a></li>
                <li id="bas"><a href="livre-or.php">LIVRE D'OR</a></li>
                <li><a href="commentaire.php">COMMENTAIRE</a></li>
            </ul>
        </nav>
    </header>

<main>
    <section>
        <article id="align">  
            <p><strong> Inscrivez-vous à </p><p id="nom"> "PROTECT ANIMAL"</strong></p>
        </article>  
    </section>       

    <section id="form-img">
        <article >
            <form id="form1" action="inscription.php" method ="POST">
                <label>Login</label><br>
                <input type ="text" name ="login" placeholder ="Entrez votre login"/><br><br>
                <label>Password</label><br>
                <input type ="password" name ="psw" placeholder ="Entrez votre password"/><br><br>
                <label>Confirmez le Password</label><br>
                <input type ="password" name ="confirm" placeholder ="Confirmez votre password"/><br><br>
                <input type = "submit" value="s'inscrire" name="submit"/>
            </form>
        </article>

            <article id="imgcouss">
                <img id="couss" src="coussinet-chien.png">
            </article>
    </section>



<?php

$connexion= mysqli_connect("localhost","root","","livreor");
$requete= "select * from utilisateurs";
$query= mysqli_query($connexion, $requete);
$resultat= mysqli_fetch_all($query);


if(isset($_POST['submit']))
{
    $login= ($_POST['login']);
    $psw= ($_POST['psw']);
    $confirm= ($_POST['confirm']);


     if(!empty($login) && !empty($psw) && !empty($confirm))
        { 
                    $connexion= mysqli_connect("localhost","root","","livreor");
                    $newlogin="SELECT id FROM utilisateurs WHERE login='".$login."'";
                    $reponse=mysqli_query($connexion,$newlogin);
                    $numberlogin=mysqli_fetch_all($reponse);
                    var_dump($numberlogin);


                if(empty($numberlogin))
                {
                   

                    if($psw==$confirm)
                    {
                        $psw=password_hash($psw,PASSWORD_BCRYPT);
                        $newinsert="INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES (NULL, '".$login."', '".$psw."');";
                        $reponse=mysqli_query($connexion,$newinsert);
                        
                        
                    }
                     else
                    {
                        echo "Les passwords doivent etre identiques.";
                    }
                }   
                else
                {
                    echo "Ce login est dejà utilisé.";
                }
        }
        else
        {
            echo "Tous les champs doivent etre remplis.";    
        }
               
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
    
</body>
</html>