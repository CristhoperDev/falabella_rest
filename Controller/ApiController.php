<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once '../Model/Product.php';

$op = htmlentities($_REQUEST['op']);
switch ($op) {
  case 1:
    {
      $list = [];
      $objProduct = new Product();
      $list = $objProduct->getAllProducts();
      echo json_encode($list);
      $objProduct->closeConnection();
      break;
    }
}