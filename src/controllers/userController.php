<?php
class UserController {
  private $userModel;

  public function __construct($userModel) {
    $this->userModel = $userModel;
  }

  public function nickCheck($nickName) {
    $nickCheck = $this->userModel->getUserByNick($nickName);
    header('Content-Type: application/json');
    if($nickCheck == null) {
      $response = ['message' => 'not exist'];
      echo json_encode($response);
      exit();
    }

    $response = ['message' => 'exist'];
    echo json_encode($response);
  }

  public function idCheck($userId) {
    $idCheck = $this->userModel->getUserByUserId($userId);
    header('Content-Type: application/json');
    if($idCheck == null) {
      $response = ['message' => 'not exist'];
      echo json_encode($response);
      exit();
    }
    $response = ['message' => 'exist'];
    echo json_encode($response);
  }
  
}