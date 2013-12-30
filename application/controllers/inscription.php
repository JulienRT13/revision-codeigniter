<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscription extends CI_Controller {

	public function index()
	{
                $data['afficheInscription'] = true;
                $this->load->view('header');
		$this->load->view('connexion_view');
		$this->load->view('inscription_view', $data);
		$this->load->view('footer');
	}
	
	public function verifInscription()
	{

		$this->load->library('form_validation'); 
		
		$this->form_validation->set_rules('nom', 'Nom d\'utilisateur', 'trim|required|min_length[2]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
	 
		if($this->form_validation->run())
		{
			/*Verif php*/
			$erreur = 0;
			
			$civilite = $this->input->post('civilite', TRUE);
			$nom = $this->input->post('nom', TRUE);
			$prenom = $this->input->post('prenom', TRUE);
			$jour = $this->input->post('jour', TRUE);
			$mois = $this->input->post('mois', TRUE);
			$annee = $this->input->post('annee', TRUE);
			$ville = $this->input->post('ville', TRUE);
			$mail = $this->input->post('mail', TRUE);
			$telephone = $this->input->post('telephone', TRUE);
			$mdp = $this->input->post('mdp', TRUE);
			$mdp_re = $this->input->post('mdp_re', TRUE);
			
			if($civilite!='Mr' && $civilite!='Mme' && $civilite!='Mlle') $erreur=1;
			if($jour<'01' || $jour>'31') $erreur = 1;
			if($mois<'01' || $mois>'12') $erreur = 1;
			if($annee<'1901' || $annee>'2010') $erreur = 1;
			
			$reg_jour = "/^[0-9]{2}+$/i";
			$reg_annee = "/^[0-9]{4}+$/i";
			$reg_alpha = "/^[a-z]+$/i";
            $reg_mdp = "/^[a-z0-9 ._-]+$/i";
            $reg_tel = "/^[0-9]{10}+$/";
            $reg_num = "/^[0-9]+$/";
            $reg_mail = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]{2,}[.][a-zA-Z]{2,4}$/i";
			
			if (!preg_match($reg_jour, $jour)) $erreur = 1;
			if (!preg_match($reg_jour, $mois)) $erreur = 1;
			if (!preg_match($reg_annee, $annee)) $erreur = 1;
			if (!preg_match($reg_num, $ville)) $erreur = 1;
			if (!preg_match($reg_alpha, $nom)) $erreur = 1;
			if (!preg_match($reg_alpha, $prenom)) $erreur = 1;
			if (!preg_match($reg_num, $ville)) $erreur = 1;
			if (!preg_match($reg_mail, $mail)) $erreur = 1;
			if (!preg_match($reg_tel, $telephone)) $erreur = 1;
			if (!preg_match($reg_mdp, $mdp)) $erreur = 1;
			if (!preg_match($reg_mdp, $mdp_re)) $erreur = 1;
			if (strlen($mdp) < 5) $erreur = 1;
			if ($mdp_re != $mdp) $erreur = 1;
			
			if($erreur == 0)
				$this->dejaInscrit();
			else
				$this->load->view('inscription_view');
		}
		else
		{
			$this->load->view('inscription_view');
		}
	}
	
	private function dejaInscrit()
	{
		$mail = $this->input->post('mail', TRUE);
		
		$this->load->model('membre_model');
		
		if($this->membre_model->verifMail($mail) == TRUE)
			$this->inscrireMembre();
		else
			$this->load->view('inscription_view');
	}

	private function inscrireMembre()
	{
		$civilite = $this->input->post('civilite', TRUE);
		$nom = $this->input->post('nom', TRUE);
		$prenom = $this->input->post('prenom', TRUE);
		$jour = $this->input->post('jour', TRUE);
		$mois = $this->input->post('mois', TRUE);
		$annee = $this->input->post('annee', TRUE);
		$ville = $this->input->post('ville', TRUE);
		$mail = $this->input->post('mail', TRUE);
		$telephone = $this->input->post('telephone', TRUE);
		$type = $this->input->post('type', TRUE);
                $mdp = $this->input->post('mdp', TRUE);
		$naissance = $annee.'-'.$mois.'-'.$jour;
		$dateInscri = date('Y-m-d');
		$dateModif = '0000-00-00';
		$actif = 1;
		
		$this->load->model('membre_model');
		$this->membre_model->inscription($civilite, $nom, $prenom, $naissance, $mail, $telephone, md5($mdp), $dateInscri, $dateModif, $actif, $ville);
		$this->redirectionConnexion();
	}
	
	private function redirectionConnexion()
	{
		redirect('connexion/success');
	}
	
	public function ajaxVille($val)
	{
		$sql = "select * from ville where cp like ? order by intituleVille ASC;";
		$query = $this->db->query($sql, array($val.'%'));
			
		echo '<label>Ville : </label>';
		echo '<select name="ville" id="ville" style="width:130px;">';
			
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				echo '<option value='.$row->idVille.'>'.$row->intituleVille.'</option>';
			}
		}
	}
	
	public function ajaxMail($mail)
	{
		$t = explode('123456789', $mail);
		$m = $t[0].'@'.$t[1];

		$this->load->model('membre_model');
		
		if($this->membre_model->verifMail($m) == FALSE)
			echo 'Adresse mail déjà utilisée';
	}
}