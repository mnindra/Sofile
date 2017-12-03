<?php
class UserModel extends Model {

  public function select_all()
  {
    $this->db->select("*");
    $this->db->from("user");
    return $this->db->execute()->result();
  }

  public function login($username, $password)
  {
    $password = md5($password);
    $this->db->select("*");
    $this->db->from("user");
    $this->db->where("username = '$username' AND password = '$password'");
    return $this->db->execute()->numRows();
  }
}