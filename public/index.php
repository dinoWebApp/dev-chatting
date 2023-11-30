<?php
require '../configs/db.php';
require '../src/controllers/userController.php';
require '../src/models/userModel.php';


$requestUri = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($requestUri);
$path = $parsedUrl['path'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$db = new Database();
$userModel = new UserModel($db);
$userController = new UserController($userModel);


//Home
if($path == '/') {
  require_once('../src/views/home.html');
  exit();
}

//chatRooms
if($path == '/chatRooms') {
  require_once('../src/views/chatRooms.php');
  exit();
}

if($path == '/login' && $requestMethod == 'GET') {
  require_once('../src/views/login.html');
  exit();
}

if($path == '/login' && $requestMethod == 'POST') {
  require_once('../src/api/login.api.php');
  exit();
}

if($path == '/signUp' && $requestMethod == 'GET') {
  require_once('../src/views/signUp.html');
  exit();
}

if($path == '/nickCheck') {
  $nickName = isset($_GET['nickName']) ? $_GET['nickName'] : null;
  $userController->nickCheck($nickName);
  exit();
}

if($path == '/idCheck') {
  $userId = isset($_GET['userId']) ? $_GET['userId'] : null;
  $userController->idCheck($userId);
  exit();
}
