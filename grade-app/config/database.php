<?php
  interface DatabaseConnection
  {
    public function connectToDatabase();
    public function closeConnection();
  }

  class MySQLConnection implements DatabaseConnection
  {
    private $connection;
    public function __construct()
    {
      $this->connectToDatabase(); 
    }

    public function connectToDatabase()
    {
      try 
      {
        // Logic to Connect to the DBMS.
      } 
      catch (PDOException $e) 
      {
        // Logic to handle the DBMS Connection errors.
      }
    }

    public function closeConnection()
    {
      $this->connection = null;
    }

    public function getConnection()
    {
      return $this->connection;
    }
  }
 
