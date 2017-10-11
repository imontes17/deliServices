<?php
Class Connection {
    private  $server = "mysql:host=localhost;dbname=deli";
    private  $user = "root";
    private  $pass = "";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;
        
    public function openConnection()
    {
        try
        {
	        $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
            return $this->con;
            
        }catch (PDOException $e)
            {
                echo "Error creating DB connection: " . $e->getMessage();
            }
    }

    public function closeConnection() {
   	    $this->con = null;
	}
}

?>