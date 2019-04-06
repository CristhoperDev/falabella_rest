<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once '../Model/Product.php';
require_once '../Model/SalesDetail.php';

$op = htmlentities($_REQUEST['op']);
$data = json_decode(file_get_contents("php://input"));

switch ($op) {
  case 1:{
    $objProduct = new Product();
    $list = $objProduct->getAllProducts();
    echo json_encode($list);
    break;
  }
  case 2: {
    $message['status'] = 0;
    $objSalesDetail = new SalesDetail();
    if (isset($data)) {
      $barCode = filter_var($data->barCode, FILTER_SANITIZE_STRING);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $objSalesDetail->set('codBarras', $barCode);
      $objSalesDetail->set('estado', $status);
      $i = $objSalesDetail->insert();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    echo json_encode($message);
    break;
  }
  case 3: {
    $list = [];
    $objSalesDetail = new SalesDetail();
    if (isset($data)) {
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $objSalesDetail->set('estado', $status);
      $list = $objSalesDetail->listByStatus();
    }
    echo json_encode($list);
  }
}