<?php if(!isset($afficheConnexion)) echo '<div style="display:none;">'; else echo '<div>';?>

<?php if(isset($error)) echo '<p style="color:red;">Mauvais mot de passe ou mauvaise adresse e-mail !</p>' ?>

<?php if(isset($success)) echo '<p style="color:green;">Vous êtes inscrit !! Vous pouvez maintenant vous connecter</p>' ?>

	<form id="login_form" method="post" action="<?php echo site_url('connexion/verifConnexion'); ?>">

	<h2>Connexion :</h2></br>
	<p>
	<label>Adresse e-mail : </label></br>
	<input type="text" class="input" name="mail" required/>
	</p>
	</br>
	<p>
	<label>Mot de passe : </label></br>
	<input type="password" class="input" name="mdp" required/>
	</p>
	</br>
	<p>
	<input type="submit" class="button" value="Se connecter"/>
	</p>

	</form>
</div>