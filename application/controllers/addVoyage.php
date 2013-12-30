<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddVoyage extends CI_Controller {

	public function index()
	{
            if($this->session->userdata('idMembre'))
            {
                $data['menu_connexion_inscription'] = false;

                $this->load->view('header', $data);
                $this->load->view('addVoyage_view');
                $this->load->view('footer');
            }
            else
            {
                redirect('accueil');
            }
        }
	
	public function verif()
	{
	
	}
        
	
	public function ajaxVille($val)
	{
		$sql = "select * from ville where cp like ? order by intituleVille ASC;";
		$query = $this->db->query($sql, array($val.'%'));
		
		echo '<label>Ville : </label>';
		echo '<select name="ville" required id="ville" style="width:130px;">';
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				echo '<option value='.$row->idVille.'>'.$row->intituleVille.'</option>';
			}
		}
	}
        
}