<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdp extends CI_Controller {

	public function index()
	{	
		$this->load->view('mdp_view');
	}
	
	public function verif()
	{
		$this->connect();
	}
	
	private function genererMDP()
	{
		$longueur = 8;
		$mdp = "";
		$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
		$longueurMax = strlen($possible);
	 
		if ($longueur > $longueurMax)
		{
			$longueur = $longueurMax;
		}
		$i = 0;
		while ($i < $longueur)
		{
			$caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
			if (!strstr($mdp, $caractere))
			{
				$mdp .= $caractere;
				$i++;
			}
		}
		return $mdp;
	}
	
	private function connect()
	{
		$mail = $this->input->post('mail', TRUE);
		$mdp = $this->genererMDP();
		$this->load->model('membre_model');
		$this->membre_model->mdp($mail, md5($mdp));
		$this->envoieMail($mail, $mdp);
	}

	private function envoieMail($mail, $mdp)
	{
		$this->load->library('email');

		$this->email->from('mdp@offre_emploi.fr', 'offre_emploi.fr');
		$this->email->to($mail); 

		$this->email->subject('Récupération du mot de passe');
		$this->email->message('Bonjour, votre nouveau mot de passe est : '.$mdp.'</br>Vous pouvez le modifi� dans les param�tres de votre page profil.');	

		$this->email->send();
	}
}