<!-- header -->
<header role="header">
   <div class="container">
      <!-- logo -->
      <h3>
         <?php if(@$_SESSION['Pseudo'] != null){  echo 'Salut '.$_SESSION['Pseudo'].' ! <br><a href="/contact/form/'.$_SESSION['Pseudo'].'">Mon Compte</a>'; } ?>
         <p><?php if(!empty($login)){ echo "<p class='alert alert-success'>Hey ! $login</p>"; } ?></p>
      </h3>
      <!-- logo -->
      <!-- nav -->
      <nav role="header-nav" class="navy">
         <ul>
            <?php if(@$_SESSION['Pseudo'] == null){
               echo'
               <li><a href="../../" title="index">index</a></li>
               <li><a href="/contact/form/" title="inscription">inscription</a></li>
               <li><a href="/connexion" title="connexion">connexion</a></li>';
            }else{
               echo'
               <li><a href="../../" title="index">index</a></li>
               <li><a href="/contact/form/'.$_SESSION["Pseudo"].'" title="contact">Mon Compte</a></li>
               <li><a href="/deconnection" title="deconnection">deconnection</a></li>';
            }
            ?>
         </ul>
      </nav>
      <!-- nav -->
   </div>
</header>
<!-- header -->