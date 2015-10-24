<?php
class UserVO{
    private $id;
    private $gid;
    private $login;
    private $password;
    private $name;
    private $email;
    private $groupname;
    private $active;

    public function __construct(){
		$this->id=0;
		$this->gid=0;
        $this->login="";
		$this->password="";
		$this->name="";
        $this->email="";
		$this->groupname="";
    }
    public function setid($id){
		$this->id=$id;
    }
    public function getid(){
		return $this->id;
    }
    public function setgid($gid){
		$this->gid=$gid;
    }
    public function getgid(){
		return $this->gid;
    }
    public function setlogin($login){
        $this->login=$login;
    }
    public function getlogin(){
        return $this->login;
    }
    public function setpassword($password){
		$this->password=$password;
    }
    public function getpassword(){
		return $this->pasword;
    }
    public function setname($name){
		$this->name=$name;
    }
    public function getname(){
		return $this->name;
    }
    public function setemail($email){
        $this->email=$email;
    }
    public function getemail(){
        return $this->email;
    }
    public function setgroupname($groupname){
		$this->groupname=$groupname;
    }
    public function getgroupname(){
		return $this->groupname;
    }
    public function setactive($active){
        $this->active=$active;
    }
    public function getactive(){
        return $this->active;
    }
}
?>
