<?php

abstract class Model
{
  protected $dbh;
  protected $stmt;

  public function __construct()
  {
    $this->dbh = new PDO(
      "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
      DB_USER,
      DB_PASS
    );
  }

  // get the query to be executed and prepare it
  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  /**
   * bind the prepared sql stmt to its value
   * @param $param the parameter inside the sql stmt
   * @param $value the value of the param
   * @param $type the type to be use in the database
   */
  public function bind($param, $value, $type=null)
  {
    if (is_null($type)) {
      // match if some one of the following statements is true
      // define the type according to it
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;

        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;

        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  // execute the query after binding values
  public function execute()
  {
    $this->stmt->execute();
  }

  // get the results of the query
  public function resultset()
  {
    // execute the query before getting results using the
    // class execute method
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }

  // get one record
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }
}