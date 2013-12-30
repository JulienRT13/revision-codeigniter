<form method="post" action="<?php echo site_url('addVoyage/verif'); ?>">
  
  <fieldset>
      
	<p>
	<label>Ville de départ : </label>
        <input type="text" name="addVilleDepart" class="input" id="origin" required/><span id="_verif" style="color:red;"></span>
	</p>
	
	<p>
	<label>Ville d'arrivé : </label>
        <input type="text" name="addVilleArrivee" id="destination" class="input" required /><span id="addVilleArrivee_verif" style="color:red;"></span>
	</p>
	
	<p>
	<label>Date et heure du départ : </label>
        <input type="text" name="addDateDepart" id="addDateDepart" class="input" /><span id="addDateDepart_verif" style="color:red;"></span>
	</p>
	
	<p>
	<label>Prix par passager : </label>
        <input type="text" name="addPrix" id="addPrix" class="input" /><span id="addPrix_verif" style="color:red;"></span>
	</p>
	
	<p>
	<label>Nbr de place disponible : </label>
        <input type="text" name="addPlace" id="addPlace" class="input" /><span id="addPlace_verif" style="color:red;"></span>
	</p>
        
        <p>Distance : <span id="addDistance"></span></p>
        <p>Durée : <span id="addDuree"></span></p>
        
	<p><input type="button" class="buttonG" id="bt_itineraire" href="#panel" onclick="javascript:calculate()" value="Calculer la distance et la durée du voyage"/></p>
        
  </fieldset>

</form>
    
<div id="mapGoogle" style="width:500px; height:300px;">
    <p>Veuillez patienter pendant le chargement de la carte...</p>
</div>
<div id="panel"></div>