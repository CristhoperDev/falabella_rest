<?php

require_once 'DBConnection.php';

class Customer {
  private $codCli;
  private $nroDni;
  private $nombres;
  private $apellidos;
  private $direccion;
  private $telefono;
  private $email;
  private $distrito;
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

  public function getAllCustomers() {
    $list = [];
    try {
      $sql = 'SELECT * FROM customers';
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
      $sql = 'INSERT INTO customers (nroDni, nombres, apellidos, direccion, telefono, email, distrito, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->nroDni, PDO::PARAM_STR);
      $this->stmt->bindParam(2, $this->nombres, PDO::PARAM_STR);
      $this->stmt->bindParam(3, $this->apellidos, PDO::PARAM_STR);
      $this->stmt->bindParam(4, $this->direccion, PDO::PARAM_STR);
      $this->stmt->bindParam(5, $this->telefono, PDO::PARAM_STR);
      $this->stmt->bindParam(6, $this->email, PDO::PARAM_STR);
      $this->stmt->bindParam(7, $this->distrito, PDO::PARAM_STR);
      $this->stmt->bindParam(8, $this->estado, PDO::PARAM_INT);
      $i = $this->stmt->execute();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function updated() {
    $i = 0;
    try {
      $sql = 'UPDATE customers SET nroDni = ?, nombres = ?, apellidos = ?, direccion = ?, telefono = ?, email = ?, distrito = ?, estado = ? WHERE codCli = ?';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->nroDni, PDO::PARAM_STR);
      $this->stmt->bindParam(2, $this->nombres, PDO::PARAM_STR);
      $this->stmt->bindParam(3, $this->apellidos, PDO::PARAM_STR);
      $this->stmt->bindParam(4, $this->direccion, PDO::PARAM_STR);
      $this->stmt->bindParam(5, $this->telefono, PDO::PARAM_STR);
      $this->stmt->bindParam(6, $this->email, PDO::PARAM_STR);
      $this->stmt->bindParam(7, $this->distrito, PDO::PARAM_STR);
      $this->stmt->bindParam(8, $this->estado, PDO::PARAM_INT);
      $this->stmt->bindParam(9, $this->codCli, PDO::PARAM_INT);
      $i = $this->stmt->execute();
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $i;
  }

  public function delete() {
    $i = 0;
    try {
      $sql = 'DELETE FROM customers WHERE codCli = ?';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->codCli, PDO::PARAM_INT);
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