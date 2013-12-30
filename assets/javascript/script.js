function Xhr()
{ // crꢴion d'un requete HTTP en fonction du navigateur
	var obj = null;
	try
	{ 
		obj = new ActiveXObject("Microsoft.XMLHTTP");
	}
	catch(Error)
	{
		try
		{
			obj = new ActiveXObject("MSXML2.XMLHTTP");
		}
		catch(Error)
		{
			try
			{
				obj = new XMLHttpRequest();
				// pour 귩ter un bogue du navigateur Safari
				if (obj.overrideMimeType)
				{
					obj.overrideMimeType("text/xml")
				}
			}
			catch(Error) { alert(' Impossible de crꦲ l\'objet XMLHttpRequest')}
		}
	}
	return obj;
}

function changementEtat(r)
{
	if( r.readyState == 4 ) 
	{ 
		var html = r.responseText;
		var div = document.getElementById('ville_ajax');
		div.innerHTML = html;
	}
}

function changement(r)
{
	if( r.readyState == 4 ) 
	{ 
		var html = r.responseText;
		var div = document.getElementById('mail_verif');
		div.innerHTML = html;
	}
}

function chercheVille(x)
{
	if(x.length>2)
	{
		var req = new Xhr();
		req.onreadystatechange= function()
		{
			if (this.readyState==this.DONE) changementEtat(req)
		};
		req.open("get", "index.php/inscription/ajaxVille/"+x+"", true);
		req.send();
	}
}

function verifForm()
{
	var nom = document.getElementById('nom').value;
	var prenom = document.getElementById('prenom').value;
	var ville = document.getElementById('ville').value;
	var mail = document.getElementById('mail').value;
	var telephone = document.getElementById('telephone').value;
	var mdp = document.getElementById('mdp').value;
	var mdp_re = document.getElementById('mdp_re').value;
	
	var reg_mail=new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$","i");
	var reg_alpha=new RegExp("^[a-zA-Z]+$","i");
	var reg_tel=new RegExp("^[0-9]{10}$","i");
	var reg_mdp=new RegExp("^[a-zA-Z0-9._-]+$","i");
	
	var message = '';
	
	if (!reg_alpha.test(nom)) message += "Nom non valide\n"
	if (!reg_alpha.test(prenom)) message += "Prénom non valide\n"
	
	if(ville == '')
	{
		message += "Le champs ville n'est pas renseigné\n";
	}
	
	if (!reg_mail.test(mail)) message += "Email non valide\n"
	if (!reg_tel.test(telephone)) message += "Téléphone non valide\n"
	
	if(mdp == '') message += "Mot de passe non valide\n"
	if(mdp.length < 5) message += "Mot de passe non valide\n"
	
	if (!reg_mdp.test(mdp)) message += "Mot de passe non valide\n"
	
	if(mdp != mdp_re)
	{
		message += "Les mots de passe ne correspondent pas\n"
	}
	
	if(message.length > 0)
	{
		alert(message);
		return false;
	}
	else
	{
		return true;
	}
}

function verifNom(valeur)
{
	html = "Le nom n'est pas valide";
	var reg_alpha=new RegExp("^[a-z]+$","i");
	var div = document.getElementById('nom_verif');
	
	if (!reg_alpha.test(valeur))
		div.innerHTML = html;
	else
		div.innerHTML = '';
}

function verifPrenom(valeur)
{
	html = "Le prénom n'est pas valide";
	var reg_alpha=new RegExp("^[a-z]+$","i");
	var div = document.getElementById('prenom_verif');
	
	if (!reg_alpha.test(valeur))
		div.innerHTML = html;
	else
		div.innerHTML = '';
}

function verifCp(valeur)
{
	html = "Le code postale n'est pas valide";
	var reg_alpha=new RegExp("^[0-9]+$","i");
	var div = document.getElementById('cp_verif');
	
	if (!reg_alpha.test(valeur))
		div.innerHTML = html;
	else
		div.innerHTML = '';
}

function verifMail(valeur)
{
	html = "Le mail n'est pas valide";
	var reg_alpha=new RegExp("^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$","i");
	var div = document.getElementById('mail_verif');
	
	if (!reg_alpha.test(valeur))
		div.innerHTML = html;
	else
	{
		div.innerHTML = '';
		valeur = valeur.replace('@', '123456789');
		var req = new Xhr();
		req.onreadystatechange= function()
		{
			if (this.readyState==this.DONE) changement(req);
		}
		req.open("get", "index.php/inscription/ajaxMail/"+valeur+"", true);
		req.send();
	}
}

function verifTelephone(valeur)
{
	html = "Le numéro de téléphone n'est pas valide";
	var reg_alpha=new RegExp("^[0-9]{10}$","i");
	var div = document.getElementById('telephone_verif');
	
	if (!reg_alpha.test(valeur))
		div.innerHTML = html;
	else
		div.innerHTML = '';
}

function verifMdp(valeur)
{
	html = "Mot de passe non valide. Caractères autorisés: a-zA-Z0-9._-";
	html2 = " Le mot de passe doit faire 5 caractères minimum";
	var reg_alpha=new RegExp("^[a-zA-Z0-9._-]+$","i");
	var div = document.getElementById('mdp_verif');
	
	if(valeur.length <5)
	{
		div.innerHTML = html2;
		if (!reg_alpha.test(valeur))
			div.innerHTML = html;
	}
	else
		div.innerHTML = '';
}

function verifMdp_re(valeur)
{
	html = "Les mots de passe ne correspondent pas";
	var div = document.getElementById('mdp_re_verif');
	var mdp = document.getElementById('mdp').value;
	
	if (valeur != mdp)
		div.innerHTML = html;
	else
		div.innerHTML = '';
}

$("#bt_connexion").fancybox();
$("#bt_inscription").fancybox();
//$("#bt_itineraire").fancybox();

var map;
var panel;
var direction;
var distance;
var duree;

initialize = function(){
 
  var myOptions = new google.maps.Map(document.getElementById('mapGoogle'), {
        zoom: 7,
        center: new google.maps.LatLng(44, 5.461244),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
  
  map      = new google.maps.Map(document.getElementById('mapGoogle'), myOptions);
  panel    = document.getElementById('panel');
  
  direction = new google.maps.DirectionsRenderer({
    map   : map,
    //panel : panel // Dom element pour afficher les instructions d'itinéraire
  });
  
}

calculate = function(){
    origin      = document.getElementById('origin').value; // Le point départ
    destination = document.getElementById('destination').value; // Le point d'arrivé
    if(origin && destination){
        var request = {
            origin      : origin,
            destination : destination,
            travelMode  : google.maps.DirectionsTravelMode.DRIVING // Mode de conduite
        }
        var directionsService = new google.maps.DirectionsService(); // Service de calcul d'itinéraire
        directionsService.route(request, function(response, status){ // Envoie de la requête pour calculer le parcours
            if(status == google.maps.DirectionsStatus.OK){
                direction.setDirections(response); // Trace l'itinéraire sur la carte et les différentes étapes du parcours
                distance = Math.round(response.routes[0].legs[0].distance.value/1000)+" km";
		duree = parseInt(response.routes[0].legs[0].duration.value/3600)+" heures "+parseInt((response.routes[0].legs[0].duration.value/3600-parseInt(response.routes[0].legs[0].duration.value/3600))*60)+" minutes";
                $("#addDistance").html('').append(distance);
                $("#addDuree").html('').append(duree);
            }
        });
    }
    
}