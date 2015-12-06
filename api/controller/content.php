<?php
require_once('controller.php');
require_once('dao/content.php');
require_once('model/content.php');
class ContentController extends Controller{

	/**
	* Gets the content
	*
	* @url GET /content/$id
	*/
	public function getcontent($id){
		$dao=new ContentDAO($this->dbconf,$this->logger);
		$content=$dao->read($id);
		return $content;
	}
}
?>
