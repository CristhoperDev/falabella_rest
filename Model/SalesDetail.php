<?php

require_once 'DBConnection.php';

class SalesDetail {
  private $codDetailSales;
  private $codBarras;
  private $estado;
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

  public function insert() {
    $i = 0;
    try {
      $sql = 'INSERT INTO detailSales(codBarras, estado) VALUES (?, ?)';
      $stmt = $this->cn->prepare($sql);
      $stmt->bind_param('ii', $this->codBarras, $this->estado);
      $i = $stmt->execute();
      $stmt->close();
      $this->cn->close();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function closeConnection() {
    $this->stmt = null;
    $this->cn = null;
  }
}