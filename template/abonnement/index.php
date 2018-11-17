<?php
  require_once(__DIR__.'/../_includes/header.php');
  require_once(__DIR__.'/../_includes/nav.php');

?>



<!-- main -->
<main role="main-inner-wrapper" class="container">
  <?php foreach($result as $results){ ?>
    <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
      <ul class="grid-lod effect-2" id="grid">
        <li>
          <figure class="effect-oscar">
            <img src="<?= $results->Photo?>" alt="" class="img-responsive"/>
            <figcaption>
              <h1><?= $results->Discipline?><span>  <?= $results->Age?> ans +</span></h1>
              <h2>Par <?= $results->Professeur?></h2>
              <p>à <?= $results->Prix?> EUR</p>
              <p>le <?= $results->Jour?> à <?= $results->Heure?></p>
              <a href="/abonnement/add/<?= $results->Id?>">PLUS</a>
            </figcaption>
          </figure>
        </li>
      </ul>
    </section>
  <?php } ?>
</main>

<?php
  require_once(__DIR__.'/../_includes/footer.php');
?>



