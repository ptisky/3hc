<?php
  require_once(__DIR__.'/../_includes/header.php');
  require_once(__DIR__.'/../_includes/nav.php');
//var_dump($form);
?>



<!-- main -->
<main role="main-inner-wrapper" class="container">
   <div class="blog-details">
      <div class="commentys-form">
        <h4>Connectez-vous !</h4>
        <p><?php if(!empty($notice)){ echo "<p class='alert alert-danger'>$notice</p>"; } ?></p>
        <div class="row">
          <form method="POST">
            <div class="col-xs-12 col-sm-4 col-md-4">
              <label for="Pseudo">Pseudo</label>
              <input type="text" class="form-control" name="Pseudo" aria-describedby="pseudoH" placeholder="Pseudo">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <label for="password">Mot de passe</label>
              <input type="password" class="form-control" name="password" aria-describedby="password" placeholder="Mot de Passe"  >
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <br>
              <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</main>

<?php
  require_once(__DIR__.'/../_includes/footer.php');
?>



