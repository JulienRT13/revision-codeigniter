<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contrat_model extends CI_Model {

	public function get()
	{
		$sql = "select * from contrat;";
		$query = $this->db->query($sql);
		return $query;
	}
}