<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once '../Model/Brand.php';

$op = htmlentities($_REQUEST['op']);
$data = json_decode(file_get_contents("php://input"));

switch ($op) {
  case 1: {
    $list = [];
    $objBrand = new Brand();
    $list = $objBrand->getAllBrands();
    echo json_encode($list);
    $objBrand->closeConnection();
    break;
  }
  case 2: {
    $message['status'] = 0;
    $objBrand = new Brand();
    if (isset($data)) {
      $description = filter_var($data->description, FILTER_SANITIZE_STRING);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $objBrand->set('descripcion', $description);
      $objBrand->set('estado', $status);
      $i = $objBrand->insert();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objBrand->closeConnection();
    echo json_encode($message);
    break;
  }
  case 3: {
    $message['status'] = 0;
    $objBrand = new Brand();
    if (isset($data)) {
      $description = filter_var($data->description, FILTER_SANITIZE_STRING);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $brandId = filter_var($data->brandId, FILTER_SANITIZE_NUMBER_INT);
      $objBrand->set('descripcion', $description);
      $objBrand->set('estado', $status);
      $objBrand->set('idMarca', $brandId);
      $i = $objBrand->updated();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objBrand->closeConnection();
    echo json_encode($message);
    break;
  }
  case 4: {
    $message['status'] = 0;
    $objBrand = new Brand();
    if (isset($data)) {
      $brandId = filter_var($data->brandId, FILTER_SANITIZE_NUMBER_INT);
      $objBrand->set('idMarca', $brandId);
      $i = $objBrand->delete();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }$objBrand->closeConnection();
    echo json_encode($message);
    break;
  }
}