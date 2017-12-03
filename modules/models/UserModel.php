<?php
class UserModel extends Eloquent {

  protected $tableName = "user";
  protected $primaryKey = "user_id";
  protected $fillable = [
    'position_id',
    'team_id',
    'name',
    'gender',
    'date',
    'address',
    'phone',
    'email',
    'username',
    'password',
    'last_login'
  ];

  public function login($username, $password)
  {
    $password = md5($password);
    $data = $this->where("username = '$username' AND password = '$password'");
    return count($data) > 0;
  }

}