
<?php

require_once(__DIR__.'/../_includes/header.php');
require_once(__DIR__.'/../_includes/nav.php');
//var_dump($form);

?>

<!-- main -->
<main role="main-inner-wrapper" class="container">
   <div class="blog-details">
      <article class="post-details" id="post-details">
         <header role="bog-header" class="bog-header text-center">
         	<?php foreach($result as $results){?>
            	<h3><span><?= $results->getPrenom()?></span> <?= $results->getNom()?></h3>
            <?php } ?>
            <h2> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
               Sed volutpat vitae facilisis sodales, eu nibh ultricies semper.
            </h2>
         </header>
      </article>
      <a href="/contact/form" type="button" class="btn btn-success">Ajouter un nouveau Contact</a><br><br><br><br>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Pseudo</th>
					<th scope="col">Mot de passe</th>
					<th scope="col">Nom</th>
					<th scope="col">Prenom</th>
					<th scope="col">Date de Naissance</th>
					<th scope="col">Code Postale</th>
					<th scope="col">Ville</th>
					<th scope="col">Adresse</th>
					<th scope="col">Numéro de Téléphone</th>
					<th scope="col">Email</th>
					<th scope="col">Date d'inscription</th>
					<th scope="col">Photo</th>
					<th scope="col">Modifier</th>
					<th scope="col">Supprimer</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($result as $results){?>
					<tr>
					  <td><?= $results->getPseudo()?></td>
					  <td><?= $results->getPassword()?></td>
					  <td><?= $results->getNom()?></td>
					  <td><?= $results->getPrenom()?></td>
					  <td><?= $results->getDate_Naissance() ?></td>
					  <td><?= $results->getCode_Postale()?></td>
					  <td><?= $results->getVille()?></td>
					  <td><?= $results->getAdresse()?></td>
					  <td><?= $results->getTelephone() ?></td>
					  <td><?= $results->getEmail()?></td>
					  <td><?= $results->getDate_Inscription()?></td>
					  <td><?= $results->getPhoto()?></td>
					  <td><a href="/contact/form/<?= $results->getPseudo() ?>" type="button" class="btn btn-warning">Modifier</a></td>
					  <td><a href='/contact/Supprimer/<?= $results->getPseudo() ?>' type="button" class="btn btn-danger">Supprimer</a></td>
					</tr>
				<?php } ?>
		</table>   </div>
</main>

<?php

require_once(__DIR__.'/../_includes/footer.php');

?>
