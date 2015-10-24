<?php
require_once("dao.php");
require_once("model/user.php");
class UserDAO extends DAO{
    public function create($vo){
        $qry="insert into user(gid,login,password,name,email,active) values (:gid,':login',':password',':name',':email',0);";
        $stmt=$this->db->prepare($qry);
        $stmt->bindParam(':gid',$vo->getgid(),PDO::PARAM_INT);
        $stmt->bindParam(':login',$vo->getlogin(),PDO::PARAM_STR);
        $stmt->bindParam(':password',$vo->getpassword(),PDO::PARAM_STR);
        $stmt->bindParam(':name',$vo->getname(),PDO::PARAM_STR);
        $stmt->bindParam(':email',$vo->getemail(),PDO::PARAM_STR);
        $stmt->bindParam(':active',$vo->getactive(),PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->errorCode()==0){
            $vo->setid($this->db->lastInsertId());
            return $vo;
        }
        else{
            $this->logger->dberror($stmt->errorInfo());
            return 0;
        }
    }
    public function read($id){
        $u=new UserVO();
        $qry="select user.id,gid,login,password,user.name,email,grp.name,active from user join grp on user.gid=grp.id where user.id=:id;";
        $stmt=$this->db->prepare($qry);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->errorCode()==0){
            $r=$stmt->fetch(PDO::FETCH_NUM);
            $u->setid($r[0]);
            $u->setgid($r[1]);
            $u->setlogin($r[2]);
            $u->setpassword($r[4]);
            $u->setname($r[5]);
            $u->setemail($r[6]);
            $u->setgroupname($r[7]);
            $u->setactive($r[8]);
        }
        else{
            $this->logger->dberror($stmt->errorInfo());
        }
        return $u;
    }
    public function update($vo){
        $qry="update user set gid=:gid,login=':login',password=':password',name=':name',email=':email',active=:active where id=:id;";
        $stmt=$this->db->prepare($qry);
        $stmt->bindParam(':gid',$vo->getgid(),PDO::PARAM_INT);
        $stmt->bindParam(':login',$vo->getlogin(),PDO::PARAM_STR);
        $stmt->bindParam(':password',$vo->getpassword(),PDO::PARAM_STR);
        $stmt->bindParam(':name',$vo->getname(),PDO::PARAM_STR);
        $stmt->bindParam(':email',$vo->getemail(),PDO::PARAM_STR);
        $stmt->bindParam(':active',$vo->getactive(),PDO::PARAM_INT);
        $stmt->bindParam(':id',$vo->getid(),PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->errorCode()==0){
            return $vo->getid();
        }
        else{
            $this->logger->dberror($stmt->errorInfo());
            return 0;
        }
    }
    public function delete($vo){
		$id=intval($vo->getid());
    	$qry="delete from user where id=".$id.";";
		if($this->db->exec($qry)==0){
            $this->logger->dberror($db->errorInfo());
        }
    }
    public function getallids(){
        $qry="select id from user where active=1;";
        $stmt=$this->db->query($qry);
        if($stmt->errorCode()==0){
            $idarr=array();
            while($row=$stmt->fetch(PDO::FETCH_NUM)){
                array_push($idarr,$row[0]);
            }
            return $idarr;
        }
        else{
            $this->logger->dberror($stmt->errorInfo());
            return 0;
        }
    }
}
?>
