<?php

require_once 'DBConnection.php';

class Product {
  private $codProd;
  private $descripcion;
  private $idCat;
  private $idMarca;
  private $precio;
  private $sku;
  private $stock;
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

  public function getAllProducts() {
    $list = [];
    try {
      $sql = 'SELECT * FROM products p INNER JOIN categories c ON c.idCat = p.idCat INNER JOIN marcas m ON m.idMarca = p.idMarca';
      $stmt = $this->cn->prepare($sql);
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

  /*public function insert() {
    $i = 0;
    try {
      $sql = 'INSERT INTO products (descripcion, idCat, idMarca, precio, sku, stock, estado) VALUES (?, ?, ?, ?, ?, ?, ?)';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->descripcion, PDO::PARAM_STR);
      $this->stmt->bindParam(2, $this->idCat, PDO::PARAM_INT);
      $this->stmt->bindParam(3, $this->idMarca, PDO::PARAM_INT);
      $this->stmt->bindParam(4, $this->precio, PDO::PARAM_STR);
      $this->stmt->bindParam(5, $this->sku, PDO::PARAM_STR);
      $this->stmt->bindParam(6, $this->stock, PDO::PARAM_INT);
      $this->stmt->bindParam(7, $this->estado, PDO::PARAM_INT);
      $i = $this->stmt->execute();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function updated() {
    $i = 0;
    try {
      $sql = 'UPDATE products SET descripcion = ?, idCat = ?, idMarca = ?, precio = ?, sku = ?, stock = ?, estado = ? WHERE codProd = ?';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->descripcion, PDO::PARAM_STR);
      $this->stmt->bindParam(2, $this->idCat, PDO::PARAM_INT);
      $this->stmt->bindParam(3, $this->idMarca, PDO::PARAM_INT);
      $this->stmt->bindParam(4, $this->precio, PDO::PARAM_STR);
      $this->stmt->bindParam(5, $this->sku, PDO::PARAM_STR);
      $this->stmt->bindParam(6, $this->stock, PDO::PARAM_INT);
      $this->stmt->bindParam(7, $this->estado, PDO::PARAM_INT);
      $this->stmt->bindParam(8, $this->codProd, PDO::PARAM_INT);
      $i = $this->stmt->execute();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function delete() {
    $i = 0;
    try {
      $sql = 'DELETE FROM products WHERE codProd = ?';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->codProd, PDO::PARAM_INT);
      $i = $this->stmt->execute();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function closeConnection() {
    $this->stmt = null;
    $this->cn = null;
  }*/
}