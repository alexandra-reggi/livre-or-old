<?php
    session_start(); // lorsqu'on est connecté, l'ordi nous reconnait toujours lorsqu'on change de pages//
?>


<!DOCTYPE html>


<html>

<head>
    <title>livre-or</title>
    <meta sharset="utf-8">
    <link rel="stylesheet" href="profil.css">
    </head>

        
<body>
<?php
    include("barrenav.php");//j'ai au prealable crée sur un autre fichier une barre nav qui change selon si je suis connecté ou non//
    ?> 

    <main>

        <section>
            <article id="align">  
                <p><strong> Modifiez votre profil sur</p><p id="nom">"PROTECT ANIMAL"</strong></p>
            </article>
        </section>


    <?php

if (isset($_SESSION['login'])){
    echo"bonjour";

$connexion= mysqli_connect("localhost","root","","livreor");
$requete= "select * from utilisateurs where login = '".$_SESSION['login']."'"; //recuperation du profil de la base de donnée pour qu'il n'est pas à retapper son ancien login et pswd//
$query= mysqli_query($connexion, $requete);
$resultat= mysqli_fetch_all($query);
var_dump($resultat);//pour m'afficher à moi ce qu'il y a dans la bdd pour voir s'il n'y a pas de probleme, s'il y a bien quelque chose etc//

    if (isset($_POST['submit'])){ //quand le client valide//

        $login= $_POST['login']; //Avec Udapte je remodifie tout dans la bdd//
        $password= password_hash($_POST['password'] , PASSWORD_BCRYPT, array('cost' => 12));
        $newinsert="update utilisateurs SET  login = '".$login."', password= '".$password."' where login ='".$_SESSION['login']."'";
        echo $newinsert;//j'affiche le nouveau login//
        $reponse=mysqli_query($connexion,$newinsert);
    }
    
           
//          elseif(!empty($login) && !empty($password){
//                 $connexion= mysqli_connect("localhost","root","","livreor");
//                 $newlogin="SELECT id FROM utilisateurs WHERE login='".$login."'";
//                 $reponse=mysqli_query($connexion,$newlogin);
//                 $numberlogin=mysqli_fetch_all($reponse);

//                 if(empty($numberlogin))

//                 echo "Tous les champs doivent etre remplis";  
            
//                else{

//                }


                
// }

?>


        <section>
        
            <article id="form-img">
                <form id="form1" method ="POST">
                    <label> Nouveau Login</label><br>
                    <input type ="text" name ="login" value ="<?php echo $resultat[0][1]?>"/><br><br> 
                    <label>Nouveau Password</label><br>
                    <input type="passeword" name="password" value="<?php echo $resultat[0][2]?>"/><br><br> 
                    <input type = "submit" value="Valider" name="submit"/>
                </form> 
            </article>
        </section>

    </main>
<?php
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