<?php if(!isset($afficheInscription)) echo '<div style="display:none;">'; else echo '<div>';?>

	<form method="post" id="inscription_form" onsubmit="return verifForm()" action="<?php echo site_url('inscription/verifInscription'); ?>">

	<h2>Inscription :</h2></br>
  
	<div id="inscrit_form">
	<p>
	<label>Civilité : </label>
	<input type="radio" name="civilite" value="Mr" checked/>Mr
	<input type="radio" name="civilite" value="Mme"/>Mme
	<input type="radio" name="civilite" value="Mlle"/>Mlle
	</p>
	</br>
	<p>
	<label>Nom : </label>
    <input type="text" class="input" name="nom" id="nom" required onkeyup="verifNom(this.value)" value="<?php echo set_value('nom'); ?>" /></br><span id="nom_verif" style="color:red;"></span>
	</p>
	</br>
	<p>
	<label>Prénom : </label>
    <input type="text" class="input" name="prenom" id="prenom" required onkeyup="verifPrenom(this.value)" value="<?php echo set_value('prenom'); ?>" /></br><span id="prenom_verif" style="color:red;"></span>
	</p>
	</br>
	<p>
	<label>Date de naissance : </label>
	<select name="jour">
	<?php
		$i=1;
		while($i<32)
		{
			if($i<10)
				$i = '0'.$i;
			echo '<option value='.$i.'>'.$i.'</option>';
			$i++;
		}
	?>
	</select>
	<select name="mois">
	<option value="01">Janvier</option>
	<option value="02">Février</option>
	<option value="03">Mars</option>
	<option value="04">Avril</option>
	<option value="05">Mai</option>
	<option value="06">Juin</option>
	<option value="07">Juillet</option>
	<option value="08">Août</option>
	<option value="09">Septembre</option>
	<option value="10">Octobre</option>
	<option value="11">Novembre</option>
	<option value="12">Décembre</option>
	</select>
    <select name="annee">
	<?php
		$i=2010;
		while($i>1900)
		{
			echo '<option value='.$i.'>'.$i.'</option>';
			$i--;
		}
	?>
	</select>
	</p>
	</br>
	<p>
	<label>CP : </label>
    <input type="text" name="cp" class="input" required id="cp" onkeyup="verifCp(this.value)" onkeypress="chercheVille(this.value)" value="<?php echo set_value('cp'); ?>" /></br><span id="cp_verif" style="color:red;"></span>
	</p>
	</br>
	<p id="ville_ajax">
	<label>Ville : </label>
	<select name="ville" id="ville" style="width:130px;">
	<option value=""></option>
	</select><span id="ville_verif" style="color:red;"></span>
	</p>
	</br>
	<p>
	<label>Adresse e-mail : </label>
    <input type="text" class="input" name="mail" required id="mail" onkeyup="verifMail(this.value)" value="<?php echo set_value('mail'); ?>" /></br><span id="mail_verif" style="color:red;"></span>
	</p>
	</br>
	<p>
	<label>Téléphone : </label>
    <input type="text" class="input" name="telephone" required id="telephone" onkeyup="verifTelephone(this.value)" value="<?php echo set_value('telephone'); ?>" /></br><span id="telephone_verif" style="color:red;"></span>
	</p>
	</br>
	<p>
	<label>Mot de passe :</label>
    <input type="password" class="input" name="mdp" required id="mdp" onkeyup="verifMdp(this.value)" value="" /></br><span id="mdp_verif" style="color:red;"></span>
	</p>
	</br>
	<p>
	<label>Retaper le Mot de passe :</label>
    <input type="password" class="input" name="mdp_re" required id="mdp_re" onkeyup="verifMdp_re(this.value)" value="" /></br><span id="mdp_re_verif" style="color:red;"></span>
	</p>
	</br>
    <p>
	<input type="submit" class="button" value="Envoyer" />
	</p>
	</div>
	</form>
</div>