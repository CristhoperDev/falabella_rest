<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once '../Model/Customer.php';

$op = htmlentities($_REQUEST['op']);
$data = json_decode(file_get_contents("php://input"));

switch ($op) {
  case 1: {
    $list = [];
    $objCustomer = new Customer();
    $list = $objCustomer->getAllCustomers();
    echo json_encode($list);
    $objCustomer->closeConnection();
    break;
  }
  case 2: {
    $message['status'] = 0;
    $objCustomer = new Customer();
    if (isset($data)) {
      $dni = filter_var($data->dni, FILTER_SANITIZE_STRING);
      $name = filter_var($data->name, FILTER_SANITIZE_STRING);
      $surname = filter_var($data->surname, FILTER_SANITIZE_STRING);
      $address = filter_var($data->address, FILTER_SANITIZE_STRING);
      $phone = filter_var($data->phone, FILTER_SANITIZE_STRING);
      $email = filter_var($data->email, FILTER_SANITIZE_STRING);
      $district = filter_var($data->district, FILTER_SANITIZE_STRING);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $objCustomer->set('nroDni', $dni);
      $objCustomer->set('nombres', $name);
      $objCustomer->set('apellidos', $surname);
      $objCustomer->set('direccion', $address);
      $objCustomer->set('telefono', $phone);
      $objCustomer->set('email', $email);
      $objCustomer->set('distrito', $district);
      $objCustomer->set('estado', $status);
      $i = $objCustomer->insert();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objCustomer->closeConnection();
    echo json_encode($message);
    break;
  }
  case 3: {
    $message['status'] = 0;
    $objCustomer = new Customer();
    if (isset($data)) {
      $dni = filter_var($data->dni, FILTER_SANITIZE_STRING);
      $name = filter_var($data->name, FILTER_SANITIZE_STRING);
      $surname = filter_var($data->surname, FILTER_SANITIZE_STRING);
      $address = filter_var($data->address, FILTER_SANITIZE_STRING);
      $phone = filter_var($data->phone, FILTER_SANITIZE_STRING);
      $email = filter_var($data->email, FILTER_SANITIZE_STRING);
      $district = filter_var($data->district, FILTER_SANITIZE_STRING);
      $status = filter_var($data->status, FILTER_SANITIZE_NUMBER_INT);
      $customerId = filter_var($data->customerId, FILTER_SANITIZE_NUMBER_INT);
      $objCustomer->set('nroDni', $dni);
      $objCustomer->set('nombres', $name);
      $objCustomer->set('apellidos', $surname);
      $objCustomer->set('direccion', $address);
      $objCustomer->set('telefono', $phone);
      $objCustomer->set('email', $email);
      $objCustomer->set('distrito', $district);
      $objCustomer->set('estado', $status);
      $objCustomer->set('codCli', $customerId);
      $i = $objCustomer->updated();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objCustomer->closeConnection();
    echo json_encode($message);
    break;
  }
  case 4: {
    $message['status'] = 0;
    $objCustomer = new Customer();
    if (isset($data)) {
      $customerId = filter_var($data->customerId, FILTER_SANITIZE_NUMBER_INT);
      $objCustomer->set('codCli', $customerId);
      $i = $objCustomer->delete();
      if ($i == 1) {
        $message['status'] = 1;
      }else {
        $message['status'] = 0;
      }
    }
    $objCustomer->closeConnection();
    echo json_encode($message);
    break;
  }
}