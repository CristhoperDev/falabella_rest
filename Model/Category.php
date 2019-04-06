<?php

require_once 'DBConnection.php';

class Category {
  private $idCat;
  private $descripcion;
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

  public function getAllCategories() {
    $list = [];
    try {
      $sql = 'SELECT * FROM categories';
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

  public function insert() {
    $i = 0;
    try {
      $sql = 'INSERT INTO categories(descripcion, estado) VALUES (?, ?)';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->descripcion, PDO::PARAM_STR);
      $this->stmt->bindParam(2, $this->estado, PDO::PARAM_INT);
      $i = $this->stmt->execute();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function updated() {
    $i = 0;
    try {
      $sql = 'UPDATE categories SET descripcion = ?, estado = ? WHERE idCat = ?;';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->descripcion, PDO::PARAM_STR);
      $this->stmt->bindParam(2, $this->estado, PDO::PARAM_INT);
      $this->stmt->bindParam(3, $this->idCat, PDO::PARAM_INT);
      $i = $this->stmt->execute();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function delete() {
    $i = 0;
    try {
      $sql = 'DELETE FROM categories WHERE idCat = ?';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->idCat, PDO::PARAM_INT);
      $i = $this->stmt->execute();
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