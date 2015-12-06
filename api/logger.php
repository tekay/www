<?php
class Logger{
	private $path;

	public function __construct($path){
		$this->path=$path;
	}
	public function dberror($error){
		$errorstring="DBError: SQLState: ".$error[0]." // Driver Code: ".$error[1]." // Driver Message: ".$error[2].PHP_EOL;
		$this->writemsg("db.err",$errorstring);
	}
	public function critical($msg){
		$this->writemsg("sys.err",$msg);
	}
	private function writemsg($datei,$msg){
		$handle=fopen($this->path."/".$datei,"a");
		fputs($handle,$msg."\n");
		fclose($handle);
	}
}
?>
