<header>
     
        <nav>
            <ul>
                <li><a href="index.php"><img id="cr"src="coeur.webp">P.A</a></li>
                <li class="bas"><a href="inscription.php">INSCRIPTION</a></li>
                <li ><a href="profil.php">PROFIL</a></li>
                <li class="bas"><a href="livre-or.php">LIVRE D'OR</a></li>
                <li><a href="commentaire.php">COMMENTAIRE</a></li>
                <?php 
                if(isset($_SESSION['login'])){
                 ?>
                    <li class="bas"><a href="?disconnect">DECONNEXION</a></li>
               <?php }
               else
               { ?>
                    <li class="bas"><a href="connexion.php">CONNEXION</a></li>
              <?php }
               ?>
            </ul>
        </nav>

    </header>
