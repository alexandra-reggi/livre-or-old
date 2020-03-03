<?php
    session_start(); 
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
    include("barrenav.php");
    ?> 

    <main>

        <section>
            <article id="align">  
                <p><strong> Modifiez votre profil sur</p><p id="nom">"PROTECT ANIMAL"</strong></p>
            </article>
        </section>


    <?php

if (isset($_SESSION['login'])){
    echo "<p id='pbm'>Profil bien modifié</p>";

$connexion= mysqli_connect("localhost","root","","livreor");
$requete= "select * from utilisateurs where login = '".$_SESSION['login']."'"; //recuperation du profil de la base de donnée pour qu'il n'est pas à retapper son ancien login et pswd//
$query= mysqli_query($connexion, $requete);
$resultat= mysqli_fetch_all($query);


    if (isset($_POST['submit'])){ 

        $login= $_POST['login']; //Avec Udapte je remodifie tout dans la bdd//
        $password= password_hash($_POST['password'] , PASSWORD_BCRYPT, array('cost' => 12));
        $newinsert="update utilisateurs SET  login = '".$login."', password= '".$password."' where login ='".$_SESSION['login']."'";
        echo $newinsert;//j'affiche le nouveau login//
        $reponse=mysqli_query($connexion,$newinsert);
    }}
           

if (isset($_GET['disconnect'])){
    session_destroy();
    header("location:index.php");
}

?>

        <section>
        
            <article id="form-img">
                <form id="form1" method ="POST">
                    <label> Nouveau Login</label><br>
                    <input class="impt" type ="text" name ="login" value ="<?php echo $resultat[0][1]?>"/><br><br> 
                    <label>Nouveau Password</label><br>
                    <input class="impt" type="password" name="password" value="<?php echo $resultat[0][2]?>"/><br><br> 
                    <input class="impt" type = "submit" value="Valider" name="submit"/>
                </form> 
            </article>
        </section>

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