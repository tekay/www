<?php
require_once("dao.php");
require_once("model/content.php");
class ContentDAO extends DAO{
	public function create($vo){
		$qry="insert into content (ctid,uid,gid,title,subtitle,content,created,active) values (:ctid,:uid,:gid,:title,:subtitle,:content,:created,:active);";
		$stmt=$this->db->prepare($qry);
		$stmt->bindParam(':ctid',$vo->getctid(),PDO::PARAM_INT);
		$stmt->bindParam(':uid',$vo->getuid(),PDO::PARAM_INT);
		$stmt->bindParam(':gid',$vo->getgid(),PDO::PARAM_INT);
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
		$qry="select content.id,ctid,uid,content.gid,title,subtitle,content.content,created,content.active,contenttype.name,user.name,grp.name from content join contenttype on ctid=contenttype.id join user on uid=user.id join grp on content.gid=grp.id where content.id=:id;";
		$stmt=$this->db->prepare($qry);
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		if($stmt->errorCode()==0){
			$r=$stmt->fetch(PDO::FETCH_NUM);
			$u->setid($r[0]);
			$u->setctid($r[1]);
			$u->setuid($r[2]);
			$u->setgid($r[3]);
			$u->settitle($r[4]);
			$u->setsubtitle($r[5]);
			$u->setcontent($r[6]);
			$u->setcreated($r[7]);
			$u->setactive($r[8]);
			$u->setcontenttypename($r[9]);
			$u->setusername($r[10]);
			$u->setgrpname($r[11]);
			$u->settaglist($this->gettaglist($id));
		}
		else{
			$this->logger->dberror($stmt->errorInfo());
		}
		return $u;
	}
	public function gettaglist($cid=0){
		if($cid!=0){
			$qry="select tid,tagname from tag_assign join tag on tid=tag.id where cid=:cid;";
			$stmt=$this->db->prepare($qry);
			$stmt->bindParam(':cid',$cid,PDO::PARAM_INT);
			$stmt->execute();
			if($stmt->errorCode()==0){
				$ret=array();
				while($r=$stmt->fetch(PDO::FETCH_NUM)){
					array_push($ret,array($r[0],$r[1]));
				}
				return $ret;
			}
			else{
				$this->logger->dberror($stmt->errorInfo());
			}
		}
	}
	public function updatecontent($vo){
		$qry="update content (ctid,uid,gid,title,subtitle,content,active) values (:ctid,:uid,:gid,:title,:subtitle,:content,:active);";
		$stmt=$this->db->prepare($qry);
		$stmt->bindParam(':ctid',$vo->getctid(),PDO::PARAM_INT);
		$stmt->bindParam(':uid',$vo->getuid(),PDO::PARAM_INT);
		$stmt->bindParam(':gid',$vo->getgid(),PDO::PARAM_INT);
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
	public function updatetaglist($taglist){

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
