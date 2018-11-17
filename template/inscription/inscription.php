<?php
require_once(__DIR__.'/../_includes/header.php');
require_once(__DIR__.'/../_includes/nav.php');
//var_dump($form);

?>

<h1>Contact</h1>
<?php 
	$html = '<ul>';
	foreach($form->getMessage() as $key => $value){
		$html .="<li class='text-danger'>$value</li>";
	}
	$html .= '</ul>';
	echo $html;

?>
<form method="POST">
  <div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" aria-describedby="emailHelp" placeholder="Enter pseudo" value="<?= $form->getFields()['pseudo']['value'] ; ?>">
    <small id="pseudoHelp" class="form-text text-muted">phss..hey, pls enter ur best pseudo here.</small>
  </div>
  <div class="form-group">
    <label for="mdp">mot de passe</label>
    <input type="password" class="form-control" name="mdp" placeholder="mdp" value="<?=$form->getFields()['mdp']['value']; ?>">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

require_once(__DIR__.'/../_includes/footer.php');

?>
