<?php

require_once 'DBConnection.php';

class SalesDetail {
  private $cn;
  private $stmt;

  public function __construct() {
    $this->cn = new DBConnection();
  }

  public function set($attribute, $content) {
    $this->$attribute = $content;
  }

  public function get($attribute) {
    return $this->$attribute;
  }

  public function getAllSalesDetail() {
    $list = [];
    try {
      $sql = 'SELECT * FROM detailsales';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->execute();
      while ($row = $this->stmt->fetchAll(PDO::FETCH_ASSOC)) {
        $list = $row;
      }
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $list;
  }

  public function closeConnection() {
    $this->stmt = null;
    $this->cn = null;
  }
}