<?php
class MembreManager extends Manager {


	public function add(Membre $mb) {
		try {
			$q = $this->db->prepare('INSERT INTO membre(mb_nom, mb_prenom, mb_dt_naiss, sp_id)
											VALUES(:nom, :prenom, :birth, :sp)');
	
			$q->bindParam(':nom', $mb->mbNom(), PDO::PARAM_STR);
			$q->bindParam(':prenom', $mb->mbPrenom(), PDO::PARAM_STR);
			$q->bindParam(':birth', $mb->mbDtNaiss(), PDO::PARAM_STR);
			$q->bindParam(':sp', $mb->mbSpId(), PDO::PARAM_INT);

			$q->exec();
		} catch (Exception $ex) {
			echo 'Error: ' . $ex->getMessage();
		}
	}
}

