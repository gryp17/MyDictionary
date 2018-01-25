<?php

class Word extends Controller {

	public function __construct() {

		/**
		 * List of required parameters and permissions for each API endpoint
		 * also indicates the parameter type
		 */
		$this->endpoints = array(
			"getAll" => array (
				"required_role" => self::PUBLIC_ACCESS
			),
			"getWord" => array (
				"required_role" => self::PUBLIC_ACCESS,
				"params" => array (
					"id" => "int"
				)
			),
			"addWord" => array (
				"required_role" => self::PUBLIC_ACCESS,
				"params" => array (
					"en" => array("required", "max-100"),
					"bg" => array("required", "max-100"),
					"note" => array("optional", "max-500")
				)
			),
			"updateWord" => array (
				"required_role" => self::PUBLIC_ACCESS,
				"params" => array (
					"id" => "int",
					"en" => array("required", "max-100"),
					"bg" => array("required", "max-100"),
					"note" => array("optional", "max-500")
				)
			),
			"deleteWord" => array (
				"required_role" => self::PUBLIC_ACCESS,
				"params" => array (
					"id" => "int"
				)
			)
		);

		#request params
		$this->params = $this->checkRequest();
	}

	public function index() {
		
	}

	/**
	 * Returns all words
	 */
	public function getAll() {
		$word_model = $this->loadModel("WordModel");
		$data = $word_model->getAll();
		$this->sendResponse(1, $data);
	}
	
	/**
	 * Returns the word data that matches the provided record id
	 */
	public function getWord() {
		$word_model = $this->loadModel("WordModel");
		$data = $word_model->getWord($this->params["id"]);
		$this->sendResponse(1, $data);
	}
	
	/**
	 * Adds new word record
	 */
	public function addWord() {
		$word_model = $this->loadModel("WordModel");
		$note = isset($this->params["note"]) ? $this->params["note"] : null;
		
		$result = $word_model->addWord($this->params["en"], $this->params["bg"], $note);
		
		if($result){
			$this->sendResponse(1, $result);
		} else {
			$this->sendResponse(0, ErrorCodes::DB_ERROR);
		}
	}
	
	/**
	 * Updates the word record
	 */
	public function updateWord() {
		$word_model = $this->loadModel("WordModel");
		$note = isset($this->params["note"]) ? $this->params["note"] : null;
		
		//get the current tab datas
		$current_word_data = $word_model->getWord($this->params["id"]);
		
		//check if there is such word record
		if($current_word_data === null){
			$this->sendResponse(0, ErrorCodes::NOT_FOUND);
		}else{
			
			$result = $word_model->updateWord($this->params["id"], $this->params["en"], $this->params["bg"], $note);
			
			if ($result) {
				$this->sendResponse(1, $result);
			} else {
				$this->sendResponse(0, ErrorCodes::DB_ERROR);
			}
		}
	}
	
	/**
	 * Deletes the specified word id
	 */
	public function deleteWord() {
		$word_model = $this->loadModel("WordModel");
		$result = $word_model->deleteWord($this->params["id"]);
		
		if($result === true){
			$this->sendResponse(1, $result);
		} else {
			$this->sendResponse(0, ErrorCodes::DB_ERROR);
		}
	}

}
