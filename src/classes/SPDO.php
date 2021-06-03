<?php

class SPDO
{

  static $instance = null;

  private $connection = null;

  const USER = 'root';
  const HOST = 'localhost';
  const PASSWORD = 'root';
  const DATABASE = 'ajpi_dev';

  private function __construct()
  {
      $this->connection = new PDO(
        'mysql:dbname='.self::DATABASE.';host='.self::HOST,
        self::USER ,
        self::PASSWORD
      );
  }

  public static function getInstance()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new SPDO();
    }
    return self::$instance;
  }

  public function getConnection()
  {
    return $this->connection;
  }

}


?>