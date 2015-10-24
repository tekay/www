<?php
abstract class DAO{
    protected $db;
    protected $dbconf;
    protected $logger;

    public function __construct($dbconf,$logger){
        $this->dbconf=$dbconf;
        $this->logger=$logger;
        try{
            $this->db=new PDO($dbconf["dsn"],$dbconf["user"],$dbconf["password"]);
        }
        catch (PDOException $e){
            $this->logger->critical($e->getMessage());
            die();
        }
    }
}
?>
