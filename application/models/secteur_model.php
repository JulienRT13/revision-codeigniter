<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secteur_model extends CI_Model {

	public function get()
	{
		$sql = "select * from secteur;";
		$query = $this->db->query($sql);
		return $query;
	}
}