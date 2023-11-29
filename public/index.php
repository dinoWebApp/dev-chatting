<?php
$requestUri = $_SERVER['REQUEST_URI'];

//Home
if($requestUri == '/') {
  require_once('../src/home.html');
  exit();
}

//chatRooms
if($requestUri == '/chatRooms') {
  require_once('../src/chatRooms.html');
  exit();
}