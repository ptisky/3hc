<?php
  require_once(__DIR__.'/../_includes/header.php');
  require_once(__DIR__.'/../_includes/nav.php');
//var_dump($form);
  if(@$form->getFields()['Photo']['value'] == null){
    $photo = "default.png";
  }else{
    $photo = $form->getFields()['Photo']['value'];
  }
  $prix = null;

?>
<!-- main -->
<main role="main-inner-wrapper" class="container">
   <div class="blog-details">
    <?php if($_SESSION["Pseudo"] != null){ ?>
      <article class="post-details" id="post-details">
        <header role="bog-header" class="bog-header text-center">
          <h3><span><?= $form->getFields()['Prenom']['value'] ; ?> </span><?= $form->getFields()['Nom']['value'] ; ?></h3>
          <p><?php if(!empty($notice)){ echo "<p class='alert alert-success'>$notice</p>"; } ?></p>
          <div class="row">
            <h2>Vos Abonnement(s) 2019/2020</h2>
            <?php foreach($abonnements as $abonnement){ ?>
              <?php $prix = $prix + $abonnement->Prix; ?>
              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?= $abonnement->Discipline?> <?= $abonnement->Age?> ans +</h5>
                    <p class="card-text">Le <?= $abonnement->Jour?> à <?= $abonnement->Heure?></p>
                    <p class="card-text">avec <?= $abonnement->Professeur?></p>
                    <a href="/abonnement/delete/<?= $abonnement->getId()?>" class="btn btn-danger">Supprimer</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <br>
          <a class="btn btn-success" href="/abonnement">Ajouter des cours</a>
          <i>Montant annuel : <?= $prix ?> EUR</i>
        </header>
      </article>
    <?php } ?>
      <div class="commentys-form">
            <h4>Informations Personnelles</h4>
            <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4">
                <br><br>
                <img src="../../PhotoA/<?= $photo; ?>"  width="600px" alt="..." class="img-thumbnail rounded-circle">
                <div class="col-xs-12 col-sm-4 col-md-4">
                  <?php if($_SESSION["Pseudo"] != null){ ?>
                  <form action="/uploadPhoto/<?= $form->getFields()['Pseudo']['value'] ; ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="Photo" id="Photo" class="btn btn-success">
                    <input type="submit" value="Modifier" name="submit" class="btn btn-success">
                  </form>
                  <?php } ?>
                </div>
              </div>
               <form method="POST" action="/contact/form/update/<?= $form->getFields()['Pseudo']['value'] ; ?>">
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Pseudo">Pseudo</label>
                    <?php if($_SESSION["Pseudo"] != null){ ?>
                      <input type="text" class="form-control" name="Pseudo" aria-describedby="pseudoH" placeholder="Pseudo" 
                        value="<?= $form->getFields()['Pseudo']['value'] ; ?>" disabled>
                    <?php }else{ ?>
                      <input type="text" class="form-control" name="Pseudo" aria-describedby="pseudoH" placeholder="Pseudo" 
                        value="<?= $form->getFields()['Pseudo']['value'] ; ?>">
                    <?php } ?>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" aria-describedby="password" placeholder="Mot de Passe" 
                        value="<?= $form->getFields()['password']['value']; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" name="Nom" aria-describedby="Nom" placeholder="Nom" 
                        value="<?= $form->getFields()['Nom']['value'] ; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Prenom">Prénom</label>
                    <input type="text" class="form-control" name="Prenom" aria-describedby="Prenom" placeholder="Prenom" 
                        value="<?= $form->getFields()['Prenom']['value'] ; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Date_Naissance">Date de Naissance</label>
                    <input type="Date" class="form-control" name="Date_Naissance" aria-describedby="Date_Naissance" placeholder="Date de Naissance" 
                        value="<?= $form->getFields()['Date_Naissance']['value'] ; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Code_Postale">Code Postale</label>
                    <input type="text" class="form-control" name="Code_Postale" aria-describedby="Code_Postale" placeholder="Code Postale" 
                        value="<?= $form->getFields()['Code_Postale']['value'] ; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Ville">Ville</label>
                    <input type="text" class="form-control" name="Ville" aria-describedby="Ville" placeholder="Ville" 
                        value="<?= $form->getFields()['Ville']['value'] ; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Adresse">Adresse</label>
                    <input type="text" class="form-control" name="Adresse" aria-describedby="Adresse" placeholder="Adresse" 
                        value="<?= $form->getFields()['Adresse']['value'] ; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Telephone">Numéro de Téléphone</label>
                    <input type="text" class="form-control" name="Telephone" aria-describedby="Telephone" placeholder="Numéro de Téléphone" 
                        value="<?= $form->getFields()['Telephone']['value'] ; ?>">
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="E-mail" 
                        value="<?= $form->getFields()['Email']['value'] ; ?>">
                        <br><br>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">GO</button>
                  </div>
               </form>
            </div>
         </div>
    </div>
</main>

<?php
  require_once(__DIR__.'/../_includes/footer.php');
?>



