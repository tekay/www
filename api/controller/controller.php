<?php
abstract class Controller{
    protected $dbconf;
    protected $logger;

    public function init($dbconf,$logger){
        $this->dbconf=$dbconf;
        $this->logger=$logger;
    }
}
?>
