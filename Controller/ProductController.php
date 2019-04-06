<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once '../Model/Product.php';

$op = htmlentities($_REQUEST['op']);
$data = json_decode(file_get_contents("php://input"));

switch ($op) {
  case 1: {
    $list = [];
    $objProduct = new Product();
    $list = $objProduct->getAllProducts();
    echo json_encode($list);
    $objProduct->closeConnection();
    break;
  }
  case 2: {
    $message['status'] = 0;
    $objProduct = new Product();
    if (isset($data)) {
      $description = filter_var($data->description, FILTER_SANITIZE_STRING);
      $categoryId = filter_var($data->categoryId, FILTER_SANITIZE_NUMBER_INT);
      $brandId = filter_var($data->brandId, FILTER_SANITIZE_NUMBER_INT);
      $price = filter_var($data->price, FILTER_SANITIZE_STRING);
      $sku = filter_var($data->sku, FILTER_SANITIZE_STRING);
      $stock = filter_var($data->stock, FILTER_SANITIZE_NUMBER_INT);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $objProduct->set('descripcion', $description);
      $objProduct->set('idCat', $categoryId);
      $objProduct->set('idMarca', $brandId);
      $objProduct->set('precio', $price);
      $objProduct->set('sku', $sku);
      $objProduct->set('stock', $stock);
      $objProduct->set('estado', $status);
      $i = $objProduct->insert();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objProduct->closeConnection();
    echo json_encode($message);
    break;
  }
  case 3: {
    $message['status'] = 0;
    $objProduct = new Product();
    if (isset($data)) {
      $description = filter_var($data->description, FILTER_SANITIZE_STRING);
      $categoryId = filter_var($data->categoryId, FILTER_SANITIZE_NUMBER_INT);
      $brandId = filter_var($data->brandId, FILTER_SANITIZE_NUMBER_INT);
      $price = filter_var($data->price, FILTER_SANITIZE_STRING);
      $sku = filter_var($data->sku, FILTER_SANITIZE_STRING);
      $stock = filter_var($data->stock, FILTER_SANITIZE_NUMBER_INT);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $productId = filter_var($data->productId, FILTER_SANITIZE_NUMBER_INT);
      $objProduct->set('descripcion', $description);
      $objProduct->set('idCat', $categoryId);
      $objProduct->set('idMarca', $brandId);
      $objProduct->set('precio', $price);
      $objProduct->set('sku', $sku);
      $objProduct->set('stock', $stock);
      $objProduct->set('estado', $status);
      $objProduct->set('codProd', $productId);
      $i = $objProduct->updated();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    echo json_encode($message);
    $objProduct = new Product();
    break;
  }
  case 4: {
    $message['status'] = 0;
    $objProduct = new Product();
    if (isset($data)) {
      $productId = filter_var($data->productId, FILTER_SANITIZE_NUMBER_INT);
      $objProduct->set('codProd', $productId);
      $i = $objProduct->delete();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    echo json_encode($message);
    $objProduct = new Product();
  }
}