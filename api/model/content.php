<?php
class ContentVO{
	private $id;
	private $ctid; //contenttype id
	private $uid; //author id
	private $gid; //group id - for visibility

	private $title;
	private $subtitle;
	private $content;
	private $created;
	private $active;

	private $contenttypename;
	private $username;
	private $grpname;

	private $taglist=array();

	public function __construct(){
		$this->id=0;
		$this->ctid=0;
		$this->uid=0;
		$this->gid=0;
		$this->title="";
		$this->content="";
		$this->active=0;
		$this->contenttypename="";
		$this->ctype="";
	}
	public function serialize(){
		$retarr=array();
		$vars=get_class_vars(__CLASS__);
		foreach($vars as $name=>$val){
			$retarr+=array($name=>$this->$name);
		}
		return $retarr;
	}
	public function setid($id){
		$this->id=$id;
	}
	public function getid(){
		return $this->id;
	}
	public function setctid($cid){
		$this->ctid=$cid;
	}
	public function getctid(){
		return $this->ctid;
	}
	public function setuid($uid){
		$this->uid=$uid;
	}
	public function getuid(){
		return $this->uid;
	}
	public function setgid($gid){
		$this->gid=$gid;
	}
	public function getgid(){
		return $this->gid;
	}
	public function settitle($title){
		$this->title=$title;
	}
	public function gettitle(){
		return $this->title;
	}
	public function setsubtitle($title){
		$this->subtitle=$title;
	}
	public function getsubtitle(){
		return $this->subtitle;
	}
	public function setcontent($content){
		$this->content=$content;
	}
	public function getcontent(){
		return $this->content;
	}
	public function setcreated($created){
		$this->created=$created;
	}
	public function getcreated(){
		return $created;
	}
	public function setactive($active){
		$this->active=$active;
	}
	public function getactive(){
		return $active;
	}
	public function setcontenttypename($contenttypename){
		$this->contenttypename=$contenttypename;
	}
	public function getcontenttypename(){
		return $this->contenttypename;
	}
	public function setusername($username){
		$this->username=$username;
	}
	public function getusername($username){
		return $this->username;
	}
	public function setgrpname($grpname){
		$this->grpname=$grpname;
	}
	public function getgrpname(){
		return $this->grpname;
	}
	public function settaglist($arr){
		$this->taglist=$arr;
	}
	public function gettaglist(){
		return $this->taglist;
	}
}
?>
