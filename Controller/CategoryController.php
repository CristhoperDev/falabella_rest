<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once '../Model/Category.php';

$op = htmlentities($_REQUEST['op']);
$data = json_decode(file_get_contents("php://input"));

switch ($op) {
  case 1: {
    $list = [];
    $objCategory = new Category();
    $list = $objCategory->getAllCategories();
    $objCategory->closeConnection();
    echo json_encode($list);
    break;
  }
  case 2: {
    $message['status'] = 0;
    $objCategory = new Category();
    if (isset($data)) {
      $description = filter_var($data->description, FILTER_SANITIZE_STRING);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $objCategory->set('descripcion', $description);
      $objCategory->set('estado', $status);
      $i = $objCategory->insert();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objCategory->closeConnection();
    echo json_encode($message);
    break;
  }
  case 3: {
    $message['status'] = 0;
    $objCategory = new Category();
    if (isset($data)) {
      $description = filter_var($data->description, FILTER_SANITIZE_STRING);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $categoryId = filter_var($data->categoryId, FILTER_SANITIZE_NUMBER_INT);
      $objCategory->set('descripcion', $description);
      $objCategory->set('estado', $status);
      $objCategory->set('idCat', $categoryId);
      $i = $objCategory->updated();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objCategory->closeConnection();
    echo json_encode($message);
    break;
  }
  case 4: {
    $message['status'] = 0;
    $objCategory = new Category();
    if (isset($data)) {
      $categoryId = filter_var($data->categoryId, FILTER_SANITIZE_NUMBER_INT);
      $objCategory->set('idCat', $categoryId);
      $i = $objCategory->delete();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objCategory->closeConnection();
    echo json_encode($message);
    break;
  }
}