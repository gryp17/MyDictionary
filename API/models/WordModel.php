<?php

class WordModel {

	private $connection;

	public function __construct() {
		$this->connection = DB::getInstance()->connection;
	}

	/**
	 * Returns all word records
	 * @return array
	 */
	public function getAll(){
		$data = array();

		$query = $this->connection->prepare("SELECT * FROM word ORDER BY en, bg");
		$query->execute();		
		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}
	
	/**
	 * Returns the word data
	 * @param int $id
	 * @return array
	 */
	public function getWord($id){
		$query = $this->connection->prepare("SELECT * FROM word WHERE id = :id");
		$query->execute(array("id" => $id));
		
		return $query->fetch(PDO::FETCH_ASSOC);
	}
	
	/**
	 * Inserts a new word record
	 * @param String $en
	 * @param String $bg
	 * @param String $note
	 * @return array
	 */
	public function addWord($en, $bg, $note){
		$query = $this->connection->prepare("INSERT INTO word (en, bg, note) VALUES (:en, :bg, :note)");
		$params = array("en" => $en, "bg" => $bg, "note" => $note);
		
		if($query->execute($params)){
			$id = $this->connection->lastInsertId();
			return $this->getWord($id);
		}else{
			return false;
		}
	}
	
	/**
	 * Updates the word record
	 * @param int $id
	 * @param String $en
	 * @param String $bg
	 * @param String $note
	 * @return array
	 */
	public function updateWord($id, $en, $bg, $note){
		$query = $this->connection->prepare("UPDATE word SET en = :en, bg = :bg, note = :note WHERE id = :id");
		$params = array("id" => $id ,"en" => $en, "bg" => $bg, "note" => $note);
		
		if($query->execute($params)){
			return $this->getWord($id);
		}else{
			return false;
		}
	}
	
	/**
	 * Deletes the specified word id
	 * @param int $id
	 */
	public function deleteWord($id){		
		$query = $this->connection->prepare("DELETE FROM word WHERE id = :id");
		$params = array("id" => $id);

		if($query->execute($params)){
			return true;
		}else{
			return false;
		}
	}
	
}
