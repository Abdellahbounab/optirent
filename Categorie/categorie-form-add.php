<?php
	require("../head.php");
	require("../fonctions.php");
	menu("categorie");
	require("../connexion.php");
	$r = "select * from categorie";
	$res = mysqli_query($con, $r);
	$nbr_cat = mysqli_num_rows($res);
?>
<div class="container" style="margin-top: 100px;">
<form method="POST" action="categorie-add.php">
	<fieldset>
		<legend>Formulaire Categorie</legend>
		<label>Id Categorie</label>
		<input type="text" class="form-control" value =<?php echo ++$nbr_cat ;?> disabled>
		<input type="text" name="idc" class="form-control" value =<?php echo $nbr_cat; ?> hidden>
		<label>Titre Categorie</label>
		<input type="text" name="titrec" class="form-control">
        <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>
	</fieldset>
</form>
</div>
