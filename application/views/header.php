<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css' />
<link href="<?php echo base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/javascript/jquery.js"></script>



<!-- Add jQuery library -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=fr"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/fancybox/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/javascript/script.js"></script>

        <script type="text/javascript">
            $(function(){
                initialize();
            });
        </script>

</head>

<body>
    
<div id="header">
<div id="logo">
    <?php
        $accueil = site_url("accueil");
        echo '<a href="'.$accueil.'"><h1>Titre du site</h1></a>';
    ?>
</div>
<?php if(isset($menu_connexion_inscription))
{
    $deco = site_url("deconnexion");
    //$this->session->userdata('nom');
    //$addVoyage = site_url("addVoyage");
    echo '<p id="connexion">';
    echo 'Bonjour, '.$nom;
    //echo '<a href="'.$addVoyage.'">Ajouter un voyage</a>';
    echo '<a href="'.$deco.'">Deconnexion</a>';
    echo '</p>';
}
else
    echo '<p id="connexion">
          <a id="bt_connexion" href="#login_form" class="lien"><img src="'.base_url().'/assets/images/lock.png"/> Connexion</a>
          <a id="bt_inscription" href="#inscription_form"><img src="'.base_url().'/assets/images/bullet_bulb_on.png"/> Inscription</a>
          </p>';
?>

</div>

<div id="banierre"><img src="<?php echo base_url() ?>/assets/images/banierre.png"/></div>

<div class="espacement"></div>

<?php
$addVoyage = site_url("addVoyage");
echo '<p><a href="'.$addVoyage.'">Ajouter un trajet</a></p>';
echo '<p><a href="'.$addVoyage.'">Page membre</a></p>';
echo '<p><a href="'.$addVoyage.'">Rechercher un trajet</a></p>';
echo '<p><a href="'.$addVoyage.'">Contact</a></p>';
echo '<p><a href="'.$addVoyage.'">Concept</a></p>';

?>

<div id="contenu">