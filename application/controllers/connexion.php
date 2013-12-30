<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connexion extends CI_Controller {

	public function index()
	{	
                $data['afficheConnexion'] = true;
                $this->load->view('header');
		$this->load->view('connexion_view', $data);
		$this->load->view('inscription_view');
		$this->load->view('footer');
	}
	
	public function verifConnexion()
	{
		$this->connect();
	}
	
	private function connect()
	{
		$mail = $this->input->post('mail', TRUE);
		$mdp = $this->input->post('mdp', TRUE);
                $mdpMD5 = md5($mdp);
		
		$this->load->model('membre_model');
		$t = $this->membre_model->identification($mail, $mdpMD5);

		if($t->num_rows() == 1)
		{
			$row = $t->row();
			$id = $row->idMembre;
			$prenom = $row->prenom;
			$nom = $row->nom;
			$data_session = array('idMembre' => $id, 'prenom' => $prenom, 'nom' => $nom);
			$this->session->set_userdata($data_session);
			redirect('accueil/membre');
		}
		else
		{
                    redirect('connexion/error');
		}
	}
        
        public function error()
        {
                $data['afficheConnexion'] = 1;
                $data['error'] = 1;
                $this->load->view('header');
		$this->load->view('connexion_view', $data);
		$this->load->view('inscription_view');
		$this->load->view('footer');
        }
        
        public function success()
        {
                $data['afficheConnexion'] = true;
                $data['success'] = true;
                $this->load->view('header');
		$this->load->view('connexion_view', $data);
		$this->load->view('inscription_view');
		$this->load->view('footer');
        }
}	