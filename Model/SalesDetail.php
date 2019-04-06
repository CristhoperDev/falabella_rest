<?php

require_once 'DBConnection.php';

class SalesDetail {
  private $codDetailSales;
  private $codBarras;
  private $estado;
  private $cn;

  public function __construct() {
    $this->cn = new DBConnection();
  }

  public function set($attribute, $content) {
    $this->$attribute = $content;
  }

  public function get($attribute) {
    return $this->$attribute;
  }

  public function listByStatus()
  {
    $list = [];
    try {
      $sql = 'SELECT * FROM detailSales s JOIN products p ON s.codBarras = p.codBarras WHERE s.estado = ?';
      $stmt = $this->cn->prepare($sql);
      $stmt->bind_param('i', $this->estado);
      $stmt->execute();
      $rs = $stmt->get_result();
      while ($row = $rs->fetch_assoc()) {
        $list[] = $row;
      }
      $rs->close();
      $stmt->close();
      $this->cn->close();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $list;
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

}