<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Annonce_model extends CI_Model {

	public function getAll()
	{
		$sql = "select * from annonce;";
		$query = $this->db->query($sql);
		return $query;
	}
	
	public function getOne($id)
	{
		$sql = "select * from annonce where idAnnonce = ?;";
		$query = $this->db->query($sql, array($id));
		return $query;
	}
	
	public function getMembreAnnonce($idMembre)
	{
		$sql = "select * from annonce where idMembreAnnonce = ?;";
		$query = $this->db->query($sql, array($idMembre));
		return $query;
	}
	
	public function getVilleAnnonce($idVille)
	{
		$sql = "select * from annonce where idVilleAnnonce = ?;";
		$query = $this->db->query($sql, array($idVille));
		return $query;
	}
	
	public function getContratAnnonce($idContrat)
	{
		$sql = "select * from annonce where idContratAnnonce = ?;";
		$query = $this->db->query($sql, array($idContrat));
		return $query;
	}
	
	public function getSecteurAnnonce($idSecteur)
	{
		$sql = "select * from annonce where idSecteurAnnonce = ?;";
		$query = $this->db->query($sql, array($idSecteur));
		return $query;
	}
	
	public function getDepartementAnnonce($idVille)
	{
		$sql = "select * from annonce, ville, departement where annonce.idVilleAnnonce=ville.idVille and ville.idDepartement=departement.codeDepartement and idVilleAnnonce = ?;";
		$query = $this->db->query($sql, array($idVille));
		return $query;
	}
	
	public function getRegionAnnonce($idVille)
	{
		$sql = "select * from annonce, ville, departement, region where annonce.idVilleAnnonce=ville.idVille and ville.idDepartement=departement.codeDepartement and departement.idRegion=region.idRegion and idVilleAnnonce = ?;";
		$query = $this->db->query($sql, array($idVille));
		return $query;
	}
	
	public function supp($id)
	{
		$sql = "delete from annonce where idAnnonce = ?;";
		$query = $this->db->query($sql, array($id));
		return $query;
	}
	
	public function add($intitule, $entreprise, $duree, $salaire, $mission, $competence, $autre, $mail, $telephone, $date, $idMembre, $idVille, $idSecteur, $idContrat)
	{
		$sql = "insert into annonce values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		$query = $this->db->query($sql, array('', $intitule, $entreprise, $duree, $salaire, $mission, $competence, $autre, $mail, $telephone, $date, $idMembre, $idVille, $idSecteur, $idContrat));
		return $query;
	}
}