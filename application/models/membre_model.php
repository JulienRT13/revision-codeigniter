<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membre_model extends CI_Model {

	public function verifMail($mail)
	{
		$sql = "select * from membre where mailMembre = ?;";
		$query = $this->db->query($sql, array($mail));
		if($query->num_rows() == 1)
			return false;
		else
			return true;
	}
	
	public function inscription($civilite, $nom, $prenom, $naissance, $mail, $tel, $mdp, $dateInscri, $dateModif, $actif, $ville)
	{
		$sql = "insert into membre values('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		$this->db->query($sql, array($civilite, $nom, $prenom, $naissance, $mail, $tel, $mdp, $dateInscri, $dateModif, $actif, $ville));
	}
	
	public function identification($mail, $mdp)
	{
		$sql = "select * from membre where mailMembre = ? and mdpMembre = ?;";
		$query = $this->db->query($sql, array($mail, $mdp));
		return $query;
	}
	
	public function mdp($mail, $mdp)
	{
		$sql = "update membre set mdpMembre = ? where mailMembre = ?;";
		$this->db->query($sql, array($mdp, $mail));
	}
}