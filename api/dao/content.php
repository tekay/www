<?php
require_once("dao.php");
require_once("model/content.php");
class ContentDAO extends DAO{
    public function create($vo){
        $qry="insert into content (cid,uid,gid,ctype,title,subtitle,content,created,active) values (:cid,:uid,:gid,:ctype,:title,:subtitle,:content,:created,:active);";
        $stmt=$this->db->prepare($qry);
        $stmt->bindParam(':cid',$vo->getcid(),PDO::PARAM_INT);
        $stmt->bindParam(':uid',$vo->getuid(),PDO::PARAM_INT);
        $stmt->bindParam(':gid',$vo->getgid(),PDO::PARAM_INT);
        $stmt->bindParam(':ctype',$vo->getctype(),PDO::PARAM_STR);
        $stmt->bindParam(':title',$vo->gettitle(),PDO::PARAM_STR);
        $stmt->bindParam(':subtitle',$vo->getsubtitle(),PDO::PARAM_STR);
        $stmt->bindParam(':content',$vo->getcontent(),PDO::PARAM_STR);
        $stmt->bindParam(':created',$vo->getcreated(),PDO::PARAM_STR);
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
        $u=new ContentVO();
        $qry="select content.id,cid,uid,content.gid,ctype,title,subtitle,content.content,created,content.active,category.name,user.name,grp.name from content join category on cid=category.id join user on uid=user.id join grp on content.gid=grp.id where content.id=:id;";
        $stmt=$this->db->prepare($qry);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->errorCode()==0){
            $r=$stmt->fetch(PDO::FETCH_NUM);
            $u->setid($r[0]);
            $u->setcid($r[1]);
            $u->setuid($r[2]);
            $u->setgid($r[3]);
            $u->setctype($r[4]);
            $u->settitle($r[5]);
            $u->setsubtitle($r[6]);
            $u->setcontent($r[7]);
            $u->setcreated($r[8]);
            $u->setactive($r[9]);
            $u->setcategoryname($r[10]);
            $u->setusername($r[11]);
            $u->setgrpname($r[12]);
        }
        else{
            $this->logger->dberror($stmt->errorInfo());
        }
        return $u;
    }
    public function update($vo){
        $qry="update content (cid,uid,gid,ctype,title,subtitle,content,active) values (:cid,:uid,:gid,:ctype,:title,:subtitle,:content,:active);";
        $stmt=$this->db->prepare($qry);
        $stmt->bindParam(':cid',$vo->getcid(),PDO::PARAM_INT);
        $stmt->bindParam(':uid',$vo->getuid(),PDO::PARAM_INT);
        $stmt->bindParam(':gid',$vo->getgid(),PDO::PARAM_INT);
        $stmt->bindParam(':ctype',$vo->getctype(),PDO::PARAM_STR);
        $stmt->bindParam(':title',$vo->gettitle(),PDO::PARAM_STR);
        $stmt->bindParam(':subtitle',$vo->getsubtitle(),PDO::PARAM_STR);
        $stmt->bindParam(':content',$vo->getcontent(),PDO::PARAM_STR);
        $stmt->bindParam(':active',$vo->getactive(),PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->errorCode()==0){
            return $vo;
        }
        else{
            $this->logger->dberror($stmt->errorInfo());
            return 0;
        }
    }
    public function delete($vo){
		$id=intval($vo->getid());
    	$qry="delete from content where id=".$id.";";
		if($this->db->exec($qry)==0){
            $this->logger->dberror($db->errorInfo());
        }
    }
}
?>
