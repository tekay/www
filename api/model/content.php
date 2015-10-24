<?php
class ContentVO{
    private $id;
    private $cid; //category id
    private $uid; //author id
    private $gid; //group id - for visibility
    private $ctype; // yeah

    private $title;
    private $subtitle;
    private $content;
    private $created;
    private $active;

    private $categoryname;
    private $username;
    private $grpname;

    public function __construct(){
        $this->id=0;
        $this->cid=0;
        $this->uid=0;
        $this->gid=0;
        $this->title="";
        $this->content="";
        $this->active=0;
        $this->categoryname="";
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
    public function setcid($cid){
        $this->cid=$cid;
    }
    public function getcid(){
        return $this->cid;
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
    public function setctype($ctypename){
        $this->ctype=$ctypename;
    }
    public function getctype(){
        return $this->ctypename;
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
    public function setcategoryname($categoryname){
        $this->categoryname=$categoryname;
    }
    public function getcategoryname(){
        return $this->categoryname;
    }
    public function setusername($username){
        $this->username=$username;
    }
    public function getusername($username){
        return $this->username;
    }
    public function setgrpname($hrpname){
        $this->grpname=$grpname;
    }
    public function getgrpname(){
        return $this->grpname;
    }
}
?>
