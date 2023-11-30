<?php
require_once('../vendor/autoload.php');
class Database {
  private $pdo;

  public function __construct() {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $host = $_ENV['DB_HOST'];
    $port = $_ENV['DB_PORT'];
    $dbname = $_ENV['DB_NAME'];
    $charset = 'utf8';
    $username = $_ENV['DB_USER'];
    $db_pw = $_ENV['DB_PASSWORD'];
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
    $this->pdo = new PDO($dsn, $username, $db_pw);
  }

  function db_select($query, $param=array()) {
    try {
      $st = $this->pdo->prepare($query);
      $st->execute($param);
      $result = $st->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch(PDOException $ex) {
      error_log($ex->getMessage());
      return ['error' => 'Database operation failed'];
    } 
  }

  function db_insert($query, $param=array()) {
  
    try {
      $st = $this->pdo->prepare($query);
      $result = $st->execute($param);
      $last_id = $this->pdo->lastInsertId();
  
      if($result) {
        return $last_id;
      }
      return false;
    } catch(PDOException $ex) {
      error_log($ex->getMessage());
      return ['error' => 'Database operation failed'];
    }
  }


  function db_update_delete($query, $param=array()) {
  
    try {
      $st = $this->pdo->prepare($query);
      $result = $st->execute($param);
      return $result;
    } catch(PDOException $ex) {
      error_log($ex->getMessage());
      return ['error' => 'Database operation failed'];
    } 
  }
}










