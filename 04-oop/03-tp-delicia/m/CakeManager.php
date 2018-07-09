<?php
class CakeManager extends Manager {

	// create
	public function create($ck) {
		try {
			$q = $this->db->prepare('INSERT INTO Cake(label, short_description, price)
											VALUES (:label, :s_desc, :price)');
			$q->bindValue(':label', $ck->label());
			$q->bindValue(':s_desc', $ck->shortDescription());
			$q->bindValue(':price', $ck->price());

			$q->execute();

			$ck->setId($db->lastInsertId());
		} catch (Exception $ex) {
			echo 'Error: ' . $ex->getMessage();
			$ck->setId(null);
		}
	}

	// retrieve
	public function retrieve($id) {
		try {
			$q = $this->db->prepare('SELECT * 
											FROM Cake
											WHERE id=:id');
			$q->bindValue(':id', $id, PDO::PARAM_INT);

			$q->execute();

			$res = $q->fetch(PDO::FETCH_ASSOC);

			return new Cake(
				$id,
				$res['label'],
				$res['short_description'],
				$res['price']
			);
		} catch (Exception $ex) {
			echo 'Error: '. $ex->getMessage();
			return null;
		}
	}

	// update
	public function update($ck) {
		try {
			$q = $this->db->prepare('UPDATE Cake
											SET label=:label, price=:price, short_description=:descp
											WHERE id=:id ');
			$q->bindValue(':id', $ck->id(), PDO::PARAM_INT);
			$q->bindValue(':label', $ck->label(), PDO::PARAM_STR);
			$q->bindValue(':price', $ck->price());
			$q->bindValue(':short_description', $ck->shortDescription());

			$q->execute();

		} catch (Exception $ex) {
			echo 'Error: '. $ex->getMessage();
			return null;
		}
	}

	// delete
	public function delete($id) {
		try {
			$q = $this->db->prepare('DELETE FROM Cake
										WHERE id=:id');
			$q->bindValue(':id', $id, PDO::PARAM_INT);

			$q->execute();
		} catch (Exception $ex) {
			echo 'Error: '. $ex->getMessage();
			return null;
		}
	}

	// all
	public static function all($db) {
		$cakes = array();
		try {
			$q = $db->query('SELECT * FROM Cake');
			while($res = $q->fetch(PDO::FETCH_ASSOC)){
				$cakes[] = new Cake($res['id'], $res['label'], $res['short_description'], $res['price']);
			}
			return cakes;
		}catch (Exception $ex) {
			echo 'Error: '. $ex->getMessage();
			return null;
		}
	}
}




