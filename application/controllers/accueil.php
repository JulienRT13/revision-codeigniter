<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function index()
	{	
                $this->load->view('header');
		$this->load->view('index_view');
		$this->load->view('connexion_view');
		$this->load->view('inscription_view');
		$this->load->view('footer');
	}
        
        public function membre()
	{	
                $data['menu_connexion_inscription'] = false;
                $data['nom'] = $this->session->userdata('nom');
                $this->load->view('header', $data);
		$this->load->view('index_view');
		$this->load->view('connexion_view');
		$this->load->view('inscription_view');
		$this->load->view('footer');
	}
}