<?php
class UserModel {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function getUserByNick($nickName) {
    return $this->db->db_select("select nickName from member where nickName=?", array($nickName));
  }

  public function getUserByUserId($userId) {
    return $this->db->db_select("select user_id from member where user_id=?", array($userId));
  }
}