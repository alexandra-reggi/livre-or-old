<!DOCTYPE html>
<html>

<head>
    <title>livre-or</title>
        <meta sharset="utf-8">
    <link rel="stylesheet" href="inscription.css">
</head>

        
<body>

<?php
    include("barrenav.php");//j'ai au prealable crée sur un autre fichier une barre nav qui change selon si je suis connecté ou non//
    ?> 

<main>
    <section>
        <article id="align">  
            <p><strong> Inscrivez-vous à </p><p id="nom"> "PROTECT ANIMAL"</strong></p>
        </article>  
    </section>       

    <section id="form-img">
        <article >
            <form id="form1" action="inscription.php" method ="POST">
                <label class="lab">Login</label><br>
                <input class="ipt" type ="text" name ="login" placeholder ="Entrez votre login"/><br><br>
                <label class="lab">Password</label><br>
                <input class="ipt" type ="password" name ="password" placeholder ="Entrez votre password"/><br><br>
                <label class="lab">Confim Pass</label><br>
                <input class="ipt" type ="password" name ="confirm" placeholder ="Confirmez votre password"/><br><br>
                <input class="ipt" type = "submit" value="s'inscrire" name="submit"/>
            </form>
        </article>

            <article id="imgcouss">
                <img id="couss" src="coussinet-chien.png">
            </article>
    </section>



<?php

$connexion= mysqli_connect("localhost","root","","livreor");//connection à ma base bdd//
$requete= "select * from utilisateurs";
$query= mysqli_query($connexion, $requete);
$resultat= mysqli_fetch_all($query);


if(isset($_POST['submit']))//quand le bouton valider est cliqué, ceci devient ça et celà devient ça//
{
    

     if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm']))//Si les champs ne sont pas vide (donc avec !empty), donc remplis, je vais dans ma bdd à id de l'utilisateur//
        {
            $login = $_POST['login'];
            $pwd = $_POST['password'];
            $confirm = $_POST['confirm'];


                    $connexion= mysqli_connect("localhost","root","","livreor");
                    $newlogin="SELECT id FROM utilisateurs WHERE login='".$login."'";
                    $reponse=mysqli_query($connexion,$newlogin);
                    $numberlogin=mysqli_fetch_all($reponse);
                    var_dump($numberlogin);


                if(empty($numberlogin))//Si le login est libre//
                {
                   

                    if($pwd==$confirm)//Si le psw et la confirmation sont exacts//
                    {
                        $pwd=password_hash($psw,PASSWORD_BCRYPT);
                        $newinsert="INSERT INTO utilisateurs (login, password) VALUES ('$login', '$pwd');";
                        $reponse=mysqli_query($connexion,$newinsert);
                        
                        header('Location: connexion.php');
                        
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